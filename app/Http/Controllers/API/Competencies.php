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
    public function index(Request $request)
    {
        $draw = $request->post('draw', 1);

        $columns = array(
            'Competency', 
            'Approver', 
            'Last Updater', 
            'Last Updated'
        );
        
        $start = $request->post('start', 0);
        $length = $request->post('length', Competency::$limit);
        
        $page = $start / $length + 1;
        
        $additionalInput = array('page' => $page);
        $request->merge($additionalInput);
        
        $predicates = array();
        
        $records = Competency::getWithPredicates($predicates, $page);
        
        $resourceCollection = new CompetencyResourceCollection($records);
        
        $resourceCollection->additional([
            'draw' => $draw,
            'columns' => $columns
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
        $competency = Competency::create($request->post());
        return response()->json([
            'message'=>'Competency Created Successfully!!',
            'competency'=>$competency
        ]);
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
        $competency->fill($request->post())->save();
        return response()->json([
            'message'=>'Competency Updated Successfully!!',
            'competency'=>$competency
        ]);
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
        return response()->json([
            'message'=>'Competency Deleted Successfully!!'
        ]);
    }
}
