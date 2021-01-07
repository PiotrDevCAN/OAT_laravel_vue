<?php

namespace App\Observers;

use App\Models\Delegate;

class DelegateObserver
{
    /**
     * Handle the obvertime request "retrieved" event.
     *
     * @param  \App\Models\Delegate  $delegate
     * @return void
     */
    public function retrieved(Delegate $delegate)
    {
        //
    }
    
    /**
     * Handle the delegate "created" event.
     *
     * @param  \App\Models\Delegate  $delegate
     * @return void
     */
    public function created(Delegate $delegate)
    {
        //
    }

    /**
     * Handle the delegate "updated" event.
     *
     * @param  \App\Models\Delegate  $delegate
     * @return void
     */
    public function updated(Delegate $delegate)
    {
        //
    }

    /**
     * Handle the delegate "deleted" event.
     *
     * @param  \App\Models\Delegate  $delegate
     * @return void
     */
    public function deleted(Delegate $delegate)
    {
        //
    }
}
