<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class Locations extends Controller
{   
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('location')) {
            $predicates[] = array('location', '=', $request->input('location'));
        };
        if ($request->filled('shore')) {
            $predicates[] = array('shore', '=', $request->input('shore'));
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
        
        $records = Location::getWithPredicates($predicates);
        
        $data = array(
            'records' => $records
        );
        
        return view('components.location.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Location();
        
        $data = array(
            'record' => $model
        );
        
        return view('components.location.create', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Location $locationModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $locationModel, $location, $shore)
    {
        $model = $locationModel->whereLocation($location)
            ->whereShore($shore)
            ->firstOrFail();
        
        $data = array(
            'record' => $model
        );
        
        return view('components.location.edit', $data);
    }
    
}