<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = new Location([
            'location' => $request->get('location'),
            'shore' => $request->get('shore')
        ]);
        $location->save();
        
        return response()->json($location);
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
        $location->location = $request->get('location');
        $location->shore = $request->get('shore');
        $location->save();
        
        return response()->json($location);
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
        return response()->json(['message' => 'Location deleted']);
    }
}
