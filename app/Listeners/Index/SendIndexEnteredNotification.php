<?php

namespace App\Listeners\Index;

use App\Events\Index\IndexEnteredEvent;
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
     * @param  IndexEnteredEvent  $event
     * @return void
     */
    public function handle(IndexEnteredEvent $event)
    {
        $to = '';
        Mail::to($to)
//             ->cc($moreUsers)
//             ->bcc($evenMoreUsers)
        ->send(new \App\Mail\Index\Entered());
    }
}
