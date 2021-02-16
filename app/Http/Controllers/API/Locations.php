<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Http\Resources\LocationResourceCollection;

class Locations extends Controller
{
    public function filters()
    {
        $locations = Location::locations();
        $shores = Location::shores();

        $records = array(
            'locations' => $locations,
            'shores' => $shores
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
            'Location', 
            'Shore'
        );
        
        $start = $request->post('start', 0);
        $length = $request->post('length', Location::$limit);
        
        $page = $start / $length + 1;
        
        $additionalInput = array('page' => $page);
        $request->merge($additionalInput);
        
        $predicates = array();

        $records = Location::getWithPredicates($predicates, $page);
        
        $resourceCollection = new LocationResourceCollection($records);

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
        $location = Location::create($request->post());
        return response()->json([
            'message'=>'Location Created Successfully!!',
            'location'=>$location
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Location $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return response()->json($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Location $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $location->fill($request->post())->save();
        return response()->json([
            'message'=>'Location Updated Successfully!!',
            'location'=>$location
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Location $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return response()->json([
            'message'=>'Location Deleted Successfully!!'
        ]);
    }
}
