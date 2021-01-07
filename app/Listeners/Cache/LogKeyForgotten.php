<?php

namespace App\Listeners\Cache;

use Illuminate\Cache\Events\KeyForgotten;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogKeyForgotten
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
     * @param  KeyForgotten  $event
     * @return void
     */
    public function handle(KeyForgotten $event)
    {
        //
//         echo('Info Cache Key Forgotten <br>');
    }
}
