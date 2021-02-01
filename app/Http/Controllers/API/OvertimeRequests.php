<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OvertimeRequest;
use App\Events\OvertimeRequestApproved;
use App\Events\OvertimeRequestRejected;
use App\Http\Requests\CreateOvertimeRequest;
use App\Http\Requests\ApproveOvertimeRequest;
use App\Http\Requests\RejectOvertimeRequest;
use App\Http\Resources\OvertimeRequestResourceCollection;
use App\Events\OvertimeRequestFlowChanged;
use App\Http\Requests\ChangeFlowOvertimeRequest;
use App\Http\Resources\OvertimeRequestResource;

class OvertimeRequests extends Controller
{
    public function filters($type)
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
    public function formData(Request $request)
    {
        $records = array(
            'account' => array(),
            'country' => array(),
            'worksInCenter' => array(),
            'competency' => array(),
            'recoverable' => array(),
            'nature' => array(),
            'weekending' => array(),
            'import' => array()
        );

        return response()->json($records);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
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
        $overtimeRequest = new OvertimeRequest();
        
//         $overtimeRequest = new OvertimeRequest([
//             'name' => $request->get('name'),
//             'price' => $request->get('price'),
//             'description'  => $request->get('description'),
//             'active'  => $request->get('active')
//         ]);
//         $overtimeRequest->save();
        
        return response()->json($overtimeRequest);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OvertimeRequest $overtimeRequest)
    {
        $resource = new OvertimeRequestResource($overtimeRequest);
        
        return $resource;
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
//         $overtimeRequest->name = $request->get('name');
//         $overtimeRequest->price = $request->get('price');
//         $overtimeRequest->description = $request->get('description');
//         $overtimeRequest->active = $request->get('active');
//         $overtimeRequest->save();
        
        return response()->json($overtimeRequest);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, OvertimeRequest $overtimeRequest)
    {
        $overtimeRequest->delete();
        return response()->json(['message' => 'Overtime Request deleted']);
    }
    
    public function approve(ApproveOvertimeRequest $request, $ref, $lvl, $status, $via)
    {
        // Request approval logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
//         $flight->name = 'New Flight Name';

//         $flight->save();
        
        event(new OvertimeRequestApproved($overtimeRequest));
        
        return response()->json(['message' => 'Overtime Request has been approved']);
    }

    public function reject(RejectOvertimeRequest $request, $ref, $lvl, $status, $via)
    {
        // Request rejection logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
//         $flight->name = 'New Flight Name';
        
//         $flight->save();
        
        event(new OvertimeRequestRejected($overtimeRequest));
        
        return response()->json(['message' => 'Overtime Request has been rejected']);
    }
    
    public function changeFlow(ChangeFlowOvertimeRequest $request, $ref, $lvl, $status, $via)
    {
        // Request rejection logic...
        
        $overtimeRequest = OvertimeRequest::find($ref);
        
        //         $flight->name = 'New Flight Name';
        
        //         $flight->save();
        
        event(new OvertimeRequestFlowChanged($overtimeRequest));
        
        return response()->json(['message' => 'Approval Flow in Overtime Request has been changed']);
    }
}
