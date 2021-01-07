<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delegate;
use Illuminate\Support\Facades\Auth;

class Delegates extends Controller
{
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('user_intranet')) {
            $predicates[] = array('user_intranet', '=', $request->input('user_intranet'));
        };
        if ($request->filled('delegate_intranet')) {
            $predicates[] = array('delegate_intranet', '=', $request->input('delegate_intranet'));
        };
        if ($request->filled('delegate_notesid')) {
            $predicates[] = array('delegate_notesid', '=', $request->input('delegate_notesid'));
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
        
        $records = Delegate::getWithPredicates($predicates);
        
        $data = array(
            'records' => $records
        );
        
        return view('components.delegate.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Delegate();
        
        $data = array(
            'record' => $model
        );
        
        return view('components.delegate.create', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Delegate $delegate
     * @return \Illuminate\Http\Response
     */
    public function edit(Delegate $delegate, $user_intranet, $delegate_intranet)
    {
        $model = $delegate->whereUserIntranet($user_intranet)
            ->whereDelegateIntranet($delegate_intranet)
            ->firstOrFail();
        
        $data = array(
            'record' => $model
        );
        
        return view('components.delegate.edit', $data);
    }
    
    /**
     * Display a listing of the my resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myList(Request $request)
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        
        $predicates[] = array('user_intranet', '=', $user->mail[0]);
        
        $records = Delegate::getWithPredicates($predicates);
        
        $data = array(
            'records' => $records,
            'user' => $user
        );
        
        return view('components.delegate.my.list', $data);
    }
    
    /**
     * Show the form for creating a new my resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myCreate()
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        
        $model = new Delegate();
        
        $data = array(
            'record' => $model,
            'user' => $user
        );
        
        return view('components.delegate.my.create', $data);
    }
}
