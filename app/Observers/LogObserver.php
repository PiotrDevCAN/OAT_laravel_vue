<?php

namespace App\Observers;

use App\Models\Log;

class LogObserver
{
    /**
     * Handle the obvertime request "retrieved" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function retrieved(Log $log)
    {
        //
    }
    
    /**
     * Handle the log "created" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function created(Log $log)
    {
        //
    }

    /**
     * Handle the log "updated" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function updated(Log $log)
    {
        //
    }

    /**
     * Handle the log "deleted" event.
     *
     * @param  \App\Models\Log  $log
     * @return void
     */
    public function deleted(Log $log)
    {
        //
    }
}
