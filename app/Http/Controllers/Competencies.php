<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competency;

class Competencies extends Controller
{
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('competency')) {
            $predicates[] = array('competency', '=', $request->input('competency'));
        };
        if ($request->filled('approver')) {
            $predicates[] = array('approver', '=', $request->input('approver'));
        };
        
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
        
        $records = Competency::getWithPredicates($predicates);
        
        $data = array(
            'records' => $records
        );
        
        return view('components.competency.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Competency();
        
        $data = array(
            'record' => $model
        );
        
        return view('components.competency.create', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Competency $competency
     * @return \Illuminate\Http\Response
     */
    public function edit(Competency $competency, $competency_name, $approver)
    {
        $model = $competency->whereCompetency($competency_name)
            ->whereApprover($approver)
            ->firstOrFail();
        
        $data = array(
            'record' => $model
        );
        
        return view('components.competency.edit', $data);
    }
}
