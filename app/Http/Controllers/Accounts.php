<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Account;

class Accounts extends Controller
{
    private function preparePredicates($request)
    {
        $predicates = array();
        
        if ($request->filled('account')) {
            $predicates[] = array('account', '=', $request->input('account'));
        };
        if ($request->filled('approver')) {
            $predicates[] = array('approver', '=', $request->input('approver'));
        };
        if ($request->filled('verified')) {
            $predicates[] = array('verified', '=', $request->input('verified'));
        };
        if ($request->filled('location')) {
            $predicates[] = array('location', '=', $request->input('location'));
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
        
        $records = Account::getWithPredicates($predicates);
        
        $data = array(
            'records' => $records
        );
        
        return view('components.account.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Account();
        
        $data = array(
            'record' => $model
        );
        
        return view('components.account.create', $data);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Account $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account, $account_name, $location)
    {
        $model = $account->whereAccount($account_name)
            ->whereLocation($location)
            ->firstOrFail();
        
        $data = array(
            'record' => $model
        );
        
        return view('components.account.edit', $data);
    }
}
