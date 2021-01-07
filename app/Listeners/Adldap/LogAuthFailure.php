<?php

namespace App\Listeners\Adldap;

use Adldap\Laravel\Events\AuthenticationFailed;

class LogAuthFailure
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
     * @param  AuthenticationFailed  $event
     * @return void
     */
    public static function handle(AuthenticationFailed $event)
    {
        //
//         echo('Adldap Auth Failed <br>');
    }
}
