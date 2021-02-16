<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Request\OvertimeRequest;
use App\Events\Request\Approved;
use App\Events\Request\Rejected;
use App\Http\Requests\CreateOvertimeRequest;
use App\Http\Requests\ApproveOvertimeRequest;
use App\Http\Requests\RejectOvertimeRequest;
use App\Http\Resources\OvertimeRequestResourceCollection;
use App\Events\FlowChanged;
use App\Http\Requests\ChangeFlowOvertimeRequest;
use App\Http\Resources\OvertimeRequestResource;

class OvertimeRequests extends Controller
{
    public function filters($type = null)
    {
        $accounts = OvertimeRequest::accounts();
        $natures = OvertimeRequest::natures();
        $workers = OvertimeRequest::workers();
        $approvalTypes = OvertimeRequest::approvalTypes();
        $competencies = OvertimeRequest::competencies();
        $statuses = OvertimeRequest::statuses();
        $requestors = OvertimeRequest::requestors();
        $locations = OvertimeRequest::locations();

        $weekendStartDates = OvertimeRequest::weekendStartDates();
        $weekendEndDates = OvertimeRequest::weekendEndDates();
        $imports = OvertimeRequest::imports();
        
        $firstApprovers = OvertimeRequest::approversFirstLevel();
        $secondApprovers = OvertimeRequest::approversSecondLevel();
        $thirdApprovers = OvertimeRequest::approversThirdLevel();

        $approvalModes = OvertimeRequest::approvalModes();
        $approverSquadLeaders = OvertimeRequest::squadLeaders();
        $approverTribeLeaders = OvertimeRequest::tribeLeaders(); 

        $accounts->transform(function ($item){
            $item->value = $item->countOne + $item->countTwo;
            $item->label = $item->countOne + $item->countTwo;
            $item->name = $item->countOne + $item->countTwo;
                return $item;
        });

        $records = array(
            'accounts' => $accounts,
            'reasons' => $natures,
            'names' => $workers,
            'types' => $approvalTypes,

            'competencies' => $competencies,
            'statuses' => $statuses,
            'requestors' => $requestors,
            'locations' => $locations,

            'weekendStart' => $weekendStartDates,
            'weekendEnd' => $weekendEndDates,
            'imports' => $imports,

            'firstApprovers' => $firstApprovers,
            'secondApprovers' => $secondApprovers,
            'thirdApprovers' => $thirdApprovers,

            'approvalModes' => $approvalModes,
            'squadLeaders' => $approverSquadLeaders,
            'tribeLeaders' => $approverTribeLeaders
        );

        return response()->json($records);
    }

    /**
     * Returns data for form fields
     *
     * @return \Illuminate\Http\Response
     */
    public function formData($type = null)
    {
        $accounts = OvertimeRequest::accounts();
        $locations = OvertimeRequest::locations();
        $worksInCenter = OvertimeRequest::worksInCenter();
        $competencies = OvertimeRequest::competencies();
        $recoverables = OvertimeRequest::recoverables();
        $natures = OvertimeRequest::natures();
        $weekending = OvertimeRequest::weekendDates();
        $imports = OvertimeRequest::imports();

        $records = array(
            'account' => $accounts,
            'country' => $locations,
            'worksInCenter' => $worksInCenter,
            'competency' => $competencies,
            'recoverable' => $recoverables,
            'nature' => $natures,
            'weekending' => $weekending,
            'import' => $imports
        );

        return response()->json($records);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $draw = $request->post('draw', 1);

        $columns = array(
            "Ref",
            "Account",
            "Service Line",
            "Reason",
            "Title",
            "Details",
            "Week Ending",
            "Name",
            "Serial",
            "Country",
            "Hours",
            "Status",
            "1st Level Approval",
            "2nd Level Approval",
            "3rd Level Approval",
            "Requestor",
            "Approval",
            "Squad Leader",
            "Tribe Leader",
            "Pre",
            "Post",
            "Claim Acc",
            "Created"
        );
        
        $start = $request->post('start', 0);
        $length = $request->post('length', OvertimeRequest::$limit);
        
        $status = $request->post('requestType', '');
        
        $page = $start / $length + 1;
        
        $additionalInput = array('page' => $page);
        $request->merge($additionalInput);
        
        $predicates = array();
        
        $recordsTotal = 0;
        $recordsFiltered = 0;

        switch ($status) {
            case 'awaiting':
                $records = OvertimeRequest::awaiting($predicates, $page);
                
                $recordsTotal = $records->total();
                $recordsFiltered = $records->total();
                break;
            case 'approved':
                $records = OvertimeRequest::approved($predicates, $page);

                $recordsTotal = $records->total();
                $recordsFiltered = $records->total();
                break;
            case 'other':
                $records = OvertimeRequest::other($predicates, $page);

                $recordsTotal = $records->total();
                $recordsFiltered = $records->total();
                break;
            default:
                $records = array();
                break;
        }
        
        $resourceCollection = new OvertimeRequestResourceCollection($records);
        
        $resourceCollection->additional([
            'draw' => $draw,
            'columns' => $columns,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered
        ]);
        
        return $resourceCollection;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOvertimeRequest $request)
    {
        $overtimeRequest = OvertimeRequest::create($request->post());
        return response()->json([
            'message'=>'Overtime Request Created Successfully!!',
            'overtimeRequest'=>$overtimeRequest
        ]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function show(OvertimeRequest $overtimeRequest)
    {
        return response()->json($overtimeRequest);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OvertimeRequest $overtimeRequest)
    {
        $overtimeRequest->fill($request->post())->save();
        return response()->json([
            'message'=>'Overtime Request Updated Successfully!!',
            'overtimeRequest'=>$overtimeRequest
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(OvertimeRequest $overtimeRequest)
    {
        $overtimeRequest->delete();
        return response()->json([
            'message'=>'Overtime Request Deleted Successfully!!'
        ]);
    }
    
    public function approve(ApproveOvertimeRequest $request, $ref, $lvl, $status, $via)
    {
        // Request approval logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
//         $flight->name = 'New Flight Name';

//         $flight->save();
        
        event(new Approved($overtimeRequest));
        
        return response()->json([
            'message' => 'Overtime Request Has Been Approved Successfully!!'
        ]);
    }

    public function reject(RejectOvertimeRequest $request, $ref, $lvl, $status, $via)
    {
        // Request rejection logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
//         $flight->name = 'New Flight Name';
        
//         $flight->save();
        
        event(new Rejected($overtimeRequest));
        
        return response()->json([
            'message' => 'Overtime Request Has Been Rejected Successfully!!
        ']);
    }
    
    public function changeFlow(ChangeFlowOvertimeRequest $request, $ref, $lvl, $status, $via)
    {
        // Request rejection logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
        //         $flight->name = 'New Flight Name';
        
        //         $flight->save();
        
        event(new FlowChanged($overtimeRequest));
        
        return response()->json([
            'message' => 'Approval Flow In Overtime Request Has Been Changed Successfully!!
        ']);
    }
}
