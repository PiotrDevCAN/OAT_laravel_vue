<?php

namespace App\Listeners\Cache;

use Illuminate\Cache\Events\CacheMissed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogCacheMissed
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
     * @param  CacheMissed  $event
     * @return void
     */
    public function handle(CacheMissed $event)
    {
        //
//         echo('Info Cache Missed <br>');
    }
}
