<?php

namespace App\Listeners\Request;

use App\Events\OvertimeRequestApproved;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOvertimeRequestApprovedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OvertimeRequestApproved  $event
     * @return void
     */
    public function handle(OvertimeRequestApproved $event)
    {
        $to = '';
        Mail::to($to)
//             ->cc($moreUsers)
//             ->bcc($evenMoreUsers)
            ->send(new \App\Mail\Request\OvertimeRequestApproved($event->request));
    }
}
