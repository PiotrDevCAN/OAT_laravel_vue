<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delegate;
use App\Http\Resources\DelegateResourceCollection;

class Delegates extends Controller
{
    public function filters()
    {
        $userIntranets = Delegate::userIntranets();
        $delegateIntranets = Delegate::delegateIntranets();
        $delegateNotesids = Delegate::delegateNotesids();

        $records = array(
            'userIntranets' => $userIntranets,
            'delegateIntranets' => $delegateIntranets,
            'delegateNotesIds' => $delegateNotesids
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
            'User Intranet', 
            'Delegate Intranet', 
            'Delegate Notes Id'
        );
        
        $start = $request->post('start', 0);
        $length = $request->post('length', Delegate::$limit);
        
        $page = $start / $length + 1;
        
        $additionalInput = array('page' => $page);
        $request->merge($additionalInput);
        
        $predicates = array();
        
        $records = Delegate::getWithPredicates($predicates, $page);
        
        $resourceCollection = new DelegateResourceCollection($records);
        
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
        $delegate = Delegate::create($request->post());
        return response()->json([
            'message'=>'Delegate Created Successfully!!',
            'delegate'=>$delegate
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Delegate $delegate
     * @return \Illuminate\Http\Response
     */
    public function show(Delegate $delegate)
    {
        return response()->json($delegate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Delegate $delegate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delegate $delegate)
    {
        $delegate->fill($request->post())->save();
        return response()->json([
            'message'=>'Delegate Updated Successfully!!',
            'delegate'=>$delegate
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Delegate $delegate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delegate $delegate)
    {
        $delegate->delete();
        return response()->json([
            'message'=>'Delegate Deleted Successfully!!'
        ]);
    }
}
