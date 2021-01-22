<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;

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
