<?php

namespace App\Observers;

use App\Models\OvertimeRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Request\Retrieved;
use App\Mail\Request\Created;
use App\Mail\Request\Updated;
use App\Mail\Request\Deleted;

class OvertimeRequestObserver
{
    /**
     * Handle the obvertime request "retrieved" event.
     *
     * @param  \App\Models\OvertimeRequest  $overtimeRequest
     * @return void
     */
    public function retrieved(OvertimeRequest $overtimeRequest)
    {
        // $to = '';
        // Mail::to($to)
        //             ->cc($moreUsers)
        //             ->bcc($evenMoreUsers)
        // ->send(new Retrieved($overtimeRequest));
    }
    
    /**
     * Handle the obvertime request "created" event.
     *
     * @param  \App\Models\OvertimeRequest  $overtimeRequest
     * @return void
     */
    public function created(OvertimeRequest $overtimeRequest)
    {
        $to = '';
        Mail::to($to)
        //             ->cc($moreUsers)
        //             ->bcc($evenMoreUsers)
        ->send(new Created($overtimeRequest));
    }

    /**
     * Handle the obvertime request "updated" event.
     *
     * @param  \App\Models\OvertimeRequest  $overtimeRequest
     * @return void
     */
    public function updated(OvertimeRequest $overtimeRequest)
    {
        $to = '';
        Mail::to($to)
        //             ->cc($moreUsers)
        //             ->bcc($evenMoreUsers)
        ->send(new Updated($overtimeRequest));
    }

    /**
     * Handle the obvertime request "deleted" event.
     *
     * @param  \App\Models\OvertimeRequest  $overtimeRequest
     * @return void
     */
    public function deleted(OvertimeRequest $overtimeRequest)
    {
        $to = '';
        Mail::to($to)
        //             ->cc($moreUsers)
        //             ->bcc($evenMoreUsers)
        ->send(new Deleted($overtimeRequest));
    }
}
