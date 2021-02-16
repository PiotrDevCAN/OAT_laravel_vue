<?php

namespace App\Listeners\Request;

use App\Events\Request\RejectedEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendRejectedNotification
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
     * @param  RejectedEvent  $event
     * @return void
     */
    public function handle(RejectedEvent $event)
    {
        $to = '';
        Mail::to($to)
//             ->cc($moreUsers)
//             ->bcc($evenMoreUsers)
            ->send(new \App\Mail\Request\Rejected($event->request));
    }
}
