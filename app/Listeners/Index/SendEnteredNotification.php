<?php

namespace App\Listeners\Index;

use App\Events\Index\EnteredEvent;
use App\Mail\Index\EnteredMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendIndexEnteredNotification
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
     * @param  EnteredEvent  $event
     * @return void
     */
    public function handle(EnteredEvent $event)
    {
        $to = '';
        Mail::to($to)
//             ->cc($moreUsers)
//             ->bcc($evenMoreUsers)
        ->send(new EnteredMail());
    }
}
