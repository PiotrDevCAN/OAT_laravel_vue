<?php

namespace App\Listeners\Adldap;

use Adldap\Laravel\Events\Authenticated;

class LogLdapAuthSuccessful
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
     * @param  Authenticated  $event
     * @return void
     */
    public static function handle(Authenticated $event)
    {
        //
//         echo('Adldap Auth Ldap Successful <br>');
    }
}
