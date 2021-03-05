<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Http\Resources\AccountResourceCollection;

class Accounts extends Controller
{
    public function filters()
    {
        $accounts = Account::accounts();
        $approvers = Account::approvers();
        $verifieds = Account::verified();
        $locations = Account::locations();

        $records = array(
            'accounts' => $accounts,
            'approvers' => $approvers,
            'verifieds' => $verifieds,
            'locations' => $locations
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
            'Account', 
            'Approver', 
            'Last Updater', 
            'Last Updated', 
            'Verified', 
            'Location'
        );
        
        $start = $request->post('start', 0);
        $length = $request->post('length', Account::$limit);
        
        $page = $start / $length + 1;
        
        $additionalInput = array('page' => $page);
        $request->merge($additionalInput);
        
        $predicates = array();
        
        $records = Account::getWithPredicates($predicates, $page);
        
        $resourceCollection = new AccountResourceCollection($records);
        
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
        $account = Account::create($request->post());
        return response()->json([
            'message'=>'Account Created Successfully!!',
            'account'=>$account
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Account $account
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Account $account)
    {
        return response()->json($account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Account $account
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Account $account)
    {
        $account->fill($request->post())->save();
        return response()->json([
            'message'=>'Account Updated Successfully!!',
            'account'=>$account
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Account $account
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return response()->json([
            'message'=>'Account Deleted Successfully!!'
        ]);
    }
}
