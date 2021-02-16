<?php

namespace App\Listeners\Request;

use App\Events\Request\SubmittedEvent;
use App\Mail\Request\SubmittedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSubmittedNotification
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
     * @param  SubmittedEvent  $event
     * @return void
     */
    public function handle(SubmittedEvent $event)
    {
        $to = '';
        Mail::to($to)
//             ->cc($moreUsers)
//             ->bcc($evenMoreUsers)
            ->send(new SubmittedMail($event->request));
    }
}
