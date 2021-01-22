<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competency;
use App\Http\Resources\CompetencyResourceCollection;

class Competencies extends Controller
{
    public function filters()
    {
        $competencies = Competency::competencies();
        $approvers = Competency::approvers(); 

        $records = array(
            'competencies' => $competencies,
            'approvers' => $approvers
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
        $length = $request->post('length', Competency::$limit);
        
        $page = $start / $length + 1;
        
        $additionalInput = array('page' => $page);
        $request->merge($additionalInput);
        
        $predicates = array();
        
        $recordsTotal = 0;
        $recordsFiltered = 0;

        $records = Competency::getWithPredicates($predicates, $page);
        
        $resourceCollection = new CompetencyResourceCollection($records);
        
        $resourceCollection->additional([
            'draw' => $draw,
            'columns' => $columns,
            'recordsTotal' => $records->total(),
            'recordsFiltered' => $records->total()
        ]);
        
        return $resourceCollection;        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $competency = new Competency([
            'competency' => $request->get('competency'),
            'approver' => $request->get('approver'),
            'last_updater'  => $request->get('last_updater'),
            'last_updated'  => $request->get('last_updated')
        ]);
        $competency->save();
        
        return response()->json($competency);
    }

    /**
     * Display the specified resource.
     *
     * @param  Competency $competency
     * @return \Illuminate\Http\Response
     */
    public function show(Competency $competency)
    {
        return response()->json($competency);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Competency $competency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competency $competency)
    {
        $competency->competency = $request->get('competency');
        $competency->approver = $request->get('approver');
        $competency->last_updater = $request->get('last_updater');
        $competency->last_updated = $request->get('last_updated');
        $competency->save();
        
        return response()->json($account);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Competency $competency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competency $competency)
    {
        $competency->delete();
        return response()->json(['message' => 'Competency deleted']);
    }
}
