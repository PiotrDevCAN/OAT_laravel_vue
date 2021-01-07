<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competency;

class Competencies extends Controller
{
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
