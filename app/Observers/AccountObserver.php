<?php

namespace App\Observers;

use App\Models\Account;

class AccountObserver
{
    /**
     * Handle the obvertime request "retrieved" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function retrieved(Account $account)
    {
        //
    }
    
    /**
     * Handle the account "created" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function created(Account $account)
    {
        //
    }

    /**
     * Handle the account "updated" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function updated(Account $account)
    {
        //
    }

    /**
     * Handle the account "deleted" event.
     *
     * @param  \App\Models\Account  $account
     * @return void
     */
    public function deleted(Account $account)
    {
        //
    }
}
