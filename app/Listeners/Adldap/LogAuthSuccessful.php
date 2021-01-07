<?php

namespace App\Listeners\Adldap;

use Adldap\Laravel\Events\AuthenticationSuccessful;

class LogAuthSuccessful
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
     * @param  AuthenticationSuccessful  $event
     * @return void
     */
    public static function handle(AuthenticationSuccessful $event)
    {
        //
//         echo('Adldap Auth Successful <br>');
    }
}
