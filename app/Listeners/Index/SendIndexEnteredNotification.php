<?php

namespace App\Listeners\Index;

use App\Events\IndexEntered;
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
     * @param  IndexEntered  $event
     * @return void
     */
    public function handle(IndexEntered $event)
    {
        Mail::to('piotr.tajanowicz@ibm.com')
//             ->cc($moreUsers)
//             ->bcc($evenMoreUsers)
        ->send(new \App\Mail\Index\IndexEntered());
    }
}
