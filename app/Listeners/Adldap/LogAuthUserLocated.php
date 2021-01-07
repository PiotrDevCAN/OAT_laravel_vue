<?php

namespace App\Listeners\Adldap;

use Adldap\Laravel\Events\DiscoveredWithCredentials;

class LogAuthUserLocated
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
     * @param  DiscoveredWithCredentials  $event
     * @return void
     */
    public static function handle(DiscoveredWithCredentials $event)
    {
        //
//         echo('Adldap User Located <br>');
    }
}
