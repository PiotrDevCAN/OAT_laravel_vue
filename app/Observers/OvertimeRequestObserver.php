<?php

namespace App\Observers;

use App\Models\OvertimeRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Request\RetrievedMail;
use App\Mail\Request\CreatedMail;
use App\Mail\Request\UpdatedMail;
use App\Mail\Request\DeletedMail;

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
        // ->send(new RetrievedMail($overtimeRequest));
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
        ->send(new CreatedMail($overtimeRequest));
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
        ->send(new UpdatedMail($overtimeRequest));
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
        ->send(new DeletedMail($overtimeRequest));
    }
}
