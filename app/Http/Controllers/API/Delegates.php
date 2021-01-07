<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Delegate;

class Delegates extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $delegate = new Delegate([
            'user_intranet' => $request->get('user_intranet'),
            'delegate_intranet' => $request->get('delegate_intranet'),
            'delegate_notesid'  => $request->get('delegate_notesid')
        ]);
        $delegate->save();
        
        return response()->json($delegate);
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
        $delegate->user_intranet = $request->get('user_intranet');
        $delegate->delegate_intranet = $request->get('delegate_intranet');
        $delegate->delegate_notesid = $request->get('delegate_notesid');
        $delegate->save();
        
        return response()->json($delegate);
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
        return response()->json(['message' => 'Delegate deleted']);
    }
}
