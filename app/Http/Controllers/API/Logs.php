<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Log;
use App\Http\Resources\LogResourceCollection;

class Logs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $draw = $request->post('draw', 1);
        
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
            'recordsTotal' => $records->total(),
            'recordsFiltered' => $records->total()
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
        $log = new Log([
            'log_entry' => $request->get('log_entry'),
            'last_updater' => $request->get('last_updater'),
            'last_updated'  => $request->get('last_updated')
        ]);
        $log->save();
        return response()->json($log);
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
        $log->log_entry = $request->get('log_entry');
        $log->last_updater = $request->get('last_updater');
        $log->last_updated = $request->get('last_updated');
        $log->save();
        
        return response()->json($log);
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
        return response()->json(['message' => 'Log deleted']);
    }
}
