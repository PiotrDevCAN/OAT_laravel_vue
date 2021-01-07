<?php

namespace App\Listeners\Adldap;

use Adldap\Laravel\Events\Authenticating;

class LogAuthenticating
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
     * @param  Authenticating  $event
     * @return void
     */
    public static function handle(Authenticating $event)
    {
        //
//         echo('Adldap Auth Authenticating <br>');
    }
}
