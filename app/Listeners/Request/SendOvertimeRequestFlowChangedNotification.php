<?php

namespace App\Listeners\Request;

use App\Events\OvertimeRequestFlowChanged;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOvertimeRequestFlowChangedNotification
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
     * @param  OvertimeRequestFlowChanged  $event
     * @return void
     */
    public function handle(OvertimeRequestFlowChanged $event)
    {
        Mail::to('piotr.tajanowicz@ibm.com')
//             ->cc($moreUsers)
//             ->bcc($evenMoreUsers)
            ->send(new \App\Mail\Request\OvertimeRequestFlowChanged($event->request));
    }
}
