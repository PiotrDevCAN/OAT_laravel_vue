<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OvertimeRequest;

use App\Events\Request\SubmittedEvent;
use App\Events\Request\ApprovedEvent;
use App\Events\Request\RejectedEvent;
use App\Events\Request\FlowChangedEvent;

use App\Http\Requests\Request\CreateRequest;
use App\Http\Requests\Request\UpdateRequest;
use App\Http\Requests\Request\ApproveRequest;
use App\Http\Requests\Request\RejectRequest;
use App\Http\Requests\Request\ChangeFlowRequest;

use App\Http\Resources\OvertimeRequestResource;
use App\Http\Resources\OvertimeRequestResourceCollection;

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
        
        switch ($status) {
            case 'awaiting':
                $records = OvertimeRequest::awaiting($predicates, $page);
                break;
            case 'approved':
                $records = OvertimeRequest::approved($predicates, $page);
                break;
            case 'other':
                $records = OvertimeRequest::other($predicates, $page);
                break;
            default:
                $records = array();
                break;
        }
        
        $resourceCollection = new OvertimeRequestResourceCollection($records);
        
        $resourceCollection->additional([
            'draw' => $draw,
            'columns' => $columns
        ]);
        
        return $resourceCollection;
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request\CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
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
     * @param  \App\Http\Requests\Request\UpdateRequest $request
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, OvertimeRequest $overtimeRequest)
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
    
    /**
     * Approve record.
     *
     * @param  \App\Http\Requests\Request\ApproveRequest $request
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function approve(ApproveRequest $request, $ref, $lvl, $status, $via)
    {
        // Request approval logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
//         $flight->name = 'New Flight Name';

//         $flight->save();
        
        event(new ApprovedEvent($overtimeRequest));
        
        return response()->json([
            'message' => 'Overtime Request Has Been Approved Successfully!!'
        ]);
    }

    /**
     * Reject record.
     *
     * @param  \App\Http\Requests\Request\RejectRequest $request
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function reject(RejectRequest $request, $ref, $lvl, $status, $via)
    {
        // Request rejection logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
//         $flight->name = 'New Flight Name';
        
//         $flight->save();
        
        event(new RejectedEvent($overtimeRequest));
        
        return response()->json([
            'message' => 'Overtime Request Has Been Rejected Successfully!!
        ']);
    }
    
    /**
     * Change flow in record.
     *
     * @param  \App\Http\Requests\Request\ChangeFlowRequest $request
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function changeFlow(ChangeFlowRequest $request, $ref, $lvl, $status, $via)
    {
        // Request rejection logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
        //         $flight->name = 'New Flight Name';
        
        //         $flight->save();
        
        event(new FlowChangedEvent($overtimeRequest));
        
        return response()->json([
            'message' => 'Approval Flow In Overtime Request Has Been Changed Successfully!!
        ']);
    }
}
