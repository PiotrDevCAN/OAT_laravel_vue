<?php

namespace App\Observers;

use App\Models\OvertimeRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Request\OvertimeRequestRetrieved;
use App\Mail\Request\OvertimeRequestCreated;
use App\Mail\Request\OvertimeRequestUpdated;
use App\Mail\Request\OvertimeRequestDeleted;

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
        // ->send(new OvertimeRequestRetrieved($overtimeRequest));
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
        ->send(new OvertimeRequestCreated($overtimeRequest));
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
        ->send(new OvertimeRequestUpdated($overtimeRequest));
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
        ->send(new OvertimeRequestDeleted($overtimeRequest));
    }
}
