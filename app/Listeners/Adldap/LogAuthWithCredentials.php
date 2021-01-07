<?php

namespace App\Listeners\Adldap;

use Adldap\Laravel\Events\AuthenticatedWithCredentials;

class LogAuthWithCredentials
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
     * @param  AuthenticatedWithCredentials  $event
     * @return void
     */
    public static function handle(AuthenticatedWithCredentials $event)
    {
        //
//         echo('Adldap Auth With Credentials <br>');
    }
}
