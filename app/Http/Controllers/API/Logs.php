<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Log;
use App\Http\Resources\LogResourceCollection;

class Logs extends Controller
{
    public function filters()
    {
        $logEntries = Log::logEntries();
        $lastUpdates = Log::lastUpdates();
        $lastUpdaters = Log::lastUpdaters();

        $records = array(
            'logEntries' => $logEntries,
            'lastUpdates' => $lastUpdates,
            'lastUpdaters' => $lastUpdaters
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
            'Log Entry', 
            'Last Updater', 
            'Last Updated'
        );

        $start = $request->post('start', 0);
        $length = $request->post('length', Log::$limit);
        
        $page = $start / $length + 1;
        
        $additionalInput = array('page' => $page);
        $request->merge($additionalInput);
        
        $predicates = array();
        
        $records = Log::getWithPredicates($predicates, $page);
        
        $resourceCollection = new LogResourceCollection($records);
        
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $log = Log::create($request->post());
        return response()->json([
            'message'=>'Log Created Successfully!!',
            'log'=>$log
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Log $log
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Log $log)
    {
        return response()->json($log);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Log $log
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Log $log)
    {
        $log->fill($request->post())->save();
        return response()->json([
            'message'=>'Log Updated Successfully!!',
            'log'=>$log
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Log $log
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Log $log)
    {
        $log->delete();
        return response()->json([
            'message'=>'Log Deleted Successfully!!'
        ]);
    }
}
