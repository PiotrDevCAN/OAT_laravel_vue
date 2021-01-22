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
    public function list(Request $request)
    {
        $draw = $request->post('draw', 1);

        $columns = array(
            "Ref",
            "Account",
            "Service Line",
            "Reason",
            "Title",
            "Details",
            "Week Ending",
            "Name",
            "Serial",
            "Country",
            "Hours",
            "Status",
            "1st Level Approval",
            "2nd Level Approval",
            "3rd Level Approval",
            "Requestor",
            "Approval",
            "Squad Leader",
            "Tribe Leader",
            "Pre",
            "Post",
            "Claim Acc",
            "Created"
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $account = new Account([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description'  => $request->get('description'),
            'active'  => $request->get('active')
        ]);
        $account->save();
        
        return response()->json($account);
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
        $account->name = $request->get('name');
        $account->price = $request->get('price');
        $account->description = $request->get('description');
        $account->active = $request->get('active');
        $account->save();
        
        return response()->json($account);
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
        return response()->json(['message' => 'Account deleted']);
    }
}
