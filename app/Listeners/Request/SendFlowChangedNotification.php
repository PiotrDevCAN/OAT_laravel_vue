<?php

namespace App\Listeners\Request;

use App\Events\Request\FlowChangedEvent;
use App\Mail\Request\FlowChangedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendFlowChangedNotification
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
     * @param  FlowChangedEvent  $event
     * @return void
     */
    public function handle(FlowChangedEvent $event)
    {
        $to = '';
        Mail::to($to)
//             ->cc($moreUsers)
//             ->bcc($evenMoreUsers)
            ->send(new FlowChangedMail($event->request));
    }
}
