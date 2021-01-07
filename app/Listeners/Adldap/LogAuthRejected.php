<?php

namespace App\Listeners\Adldap;

use Adldap\Laravel\Events\AuthenticationRejected;

class LogAuthRejected
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
     * @param  AuthenticationRejected  $event
     * @return void
     */
    public static function handle(AuthenticationRejected $event)
    {
        //
//         echo('Adldap Auth Rejected <br>');
    }
}
