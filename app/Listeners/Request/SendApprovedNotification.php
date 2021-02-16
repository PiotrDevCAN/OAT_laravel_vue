<?php

namespace App\Listeners\Request;

use App\Events\Request\ApprovedEvent;
use App\Mail\Request\ApprovedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendApprovedNotification
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
     * @param  ApprovedEvent  $event
     * @return void
     */
    public function handle(ApprovedEvent $event)
    {
        $to = '';
        Mail::to($to)
//             ->cc($moreUsers)
//             ->bcc($evenMoreUsers)
            ->send(new ApprovedMail($event->request));
    }
}
