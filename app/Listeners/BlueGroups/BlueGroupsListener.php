<?php

namespace App\Listeners\BlueGroups;

use Adldap\Auth\Events\Binding;

class BlueGroupsListener
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
     * @param  Binding  $event
     * @return void
     */
    public static function handle(Binding $event)
    {
        //
    }
}
