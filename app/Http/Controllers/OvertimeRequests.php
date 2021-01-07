<?php

namespace App\Http\Controllers;

ini_set('max_execution_time', 180); //3 minutes

use Illuminate\Http\Request;
use App\Models\OvertimeRequest;
use App\Models\Account;
use App\Models\Competency;
use Illuminate\Support\Facades\DB;

class OvertimeRequests extends Controller
{
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('account')) {
            $predicates[] = array('account', '=', $request->input('account'));
        };
        if ($request->filled('reason')) {
            $predicates[] = array('reason', '=', $request->input('reason'));
        };
        if ($request->filled('name')) {
            $predicates[] = array('name', '=', $request->input('name'));
        };
        if ($request->filled('approvaltype')) {
            $predicates[] = array('approvaltype', '=', $request->input('approvaltype'));
        };
        
        if ($request->filled('competency')) {
            $predicates[] = array('competency', '=', $request->input('competency'));
        };
        if ($request->filled('status')) {
            $predicates[] = array('status', '=', $request->input('status'));
        };
        if ($request->filled('requestor')) {
            $predicates[] = array('requestor', '=', $request->input('requestor'));
        };
        if ($request->filled('location')) {
            $predicates[] = array('location', '=', $request->input('location'));
        };
        
        if ($request->filled('weekend_start')) {
            $predicates[] = array('weekenddate', '>=', $request->input('weekend_start'));
        };
        if ($request->filled('weekend_end')) {
            $predicates[] = array('weekenddate', '<=', $request->input('weekend_end'));
        };
        if ($request->filled('import')) {
            $predicates[] = array('import', '=', $request->input('import'));
        };
        
        if ($request->filled('approver_first_level')) {
            $predicates[] = array('approver_first_level', '=', $request->input('approver_first_level'));
        };
        if ($request->filled('approver_second_level')) {
            $predicates[] = array('approver_second_level', '=', $request->input('approver_second_level'));
        };
        if ($request->filled('approver_third_level')) {
            $predicates[] = array('approver_third_level', '=', $request->input('approver_third_level'));
        };
        
        if ($request->filled('approval_mode')) {
            $predicates[] = array('approval_mode', '=', $request->input('approval_mode'));
        };
        if ($request->filled('approver_squad_leader')) {
            $predicates[] = array('approver_squad_leader', '=', $request->input('approver_squad_leader'));
        };
        if ($request->filled('approver_tribe_leader')) {
            $predicates[] = array('approver_tribe_leader', '=', $request->input('approver_tribe_leader'));
        };
        
        $predicates[] = array('weekenddate', '>=', '2020-10-23');
        
        return $predicates;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $predicates = $this->preparePredicates($request);
        
        $awaiting = OvertimeRequest::awaiting($predicates);
        $approved = OvertimeRequest::approved($predicates);
        $other = OvertimeRequest::other($predicates);
        
        $data = array(
            'lists' => collect([
                'awaiting' => (object) [
                    'id' => 'awaitingTable',
                    'name' => 'awaiting',
                    'label' => 'Awaiting Approval',
                    'records' => $awaiting,
                    'total' => $awaiting->total(),
                    'hours' => $awaiting->sum('hours'),
                ],
                'approved' => (object) [
                    'id' => 'approvedTable',
                    'name' => 'approved',
                    'label' => 'Approved',
                    'records' => $approved,
                    'total' => $approved->total(),
                    'hours' => $approved->sum('hours'),
                ],
                'other' => (object) [
                    'id' => 'otherTable',
                    'name' => 'other',
                    'label' => 'Other',
                    'records' => $other,
                    'total' => $other->total(),
                    'hours' => $other->sum('hours'),
                ],
            ]),
        );
        
        return view('components.request.index', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function approved(Request $request)
    {
        $predicates = $this->preparePredicates($request);
        
        $records = OvertimeRequest::approved($predicates);
        
        $data = array(
            'lists' => collect([
                'approved' => (object) [
                    'id' => 'approvedTable',
                    'name' => 'approvedTable',
                    'label' => 'Approved',
                    'records' => $records,
                    'total' => $records->total(),
                    'hours' => $records->sum('hours'),
                ],
            ]),
        );
        
        return view('components.request.approved', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new OvertimeRequest;
        
        $data = array(
            'record' => $model
        );

        return view('components.request.create', $data);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, OvertimeRequest $overtimeRequest)
    {
        $data = array(
            'record' => $overtimeRequest
        );
        
        return view('components.request.show', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  OvertimeRequest $overtimeRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(OvertimeRequest $overtimeRequest)
    {
//         $model = OvertimeRequest::findOrFail($ref);
        
        $data = array(
            'record' => $overtimeRequest
        );
        
        return view('components.request.edit', $data);
    }
}
