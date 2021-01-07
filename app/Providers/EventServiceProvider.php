<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        
        'App\Events\IndexEntered' => [
            'App\Listeners\Index\SendIndexEnteredNotification',
        ],
        
        'App\Events\OvertimeRequestSubmitted' => [
            'App\Listeners\Request\SendOvertimeRequestSubmittedNotification',
        ],
        'App\Events\OvertimeRequestApproved' => [
            'App\Listeners\Request\SendOvertimeRequestApprovedNotification',
        ],
        'App\Events\OvertimeRequestRejected' => [
            'App\Listeners\Request\SendOvertimeRequestRejectedNotification',
        ],
        'App\Events\OvertimeRequestFlowChanged' => [
            'App\Listeners\Request\SendOvertimeRequestFlowChangedNotification',
        ],
        
        'Illuminate\Cache\Events\CacheHit' => [
            'App\Listeners\Cache\LogCacheHit',
        ],
        'Illuminate\Cache\Events\CacheMissed' => [
            'App\Listeners\Cache\LogCacheMissed',
        ],
        'Illuminate\Cache\Events\KeyForgotten' => [
            'App\Listeners\Cache\LogKeyForgotten',
        ],
        'Illuminate\Cache\Events\KeyWritten' => [
            'App\Listeners\Cache\LogKeyWritten',
        ],
        
        /*
         * Default listeners
         */
        'Illuminate\Auth\Events\Authenticated' => [
            'App\Listeners\Auth\LogAuthenticated',
        ],
        'Illuminate\Auth\Events\Attempting' => [
            'App\Listeners\Auth\LogAuthenticationAttempt',
        ],
        'Illuminate\Auth\Events\Failed' => [
            'App\Listeners\Auth\LogFailedLogin',
        ],
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\Auth\LogSuccessfulLogin',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\Auth\LogSuccessfulLogout',
        ],
        
        /*
         * Adldap listeners
         */
        'Adldap\Laravel\Events\AuthenticationSuccessful' => [
            'App\Listeners\Adldap\LogAuthSuccessful'
        ],
        
        'Adldap\Laravel\Events\AuthenticationRejected' => [
            'App\Listeners\Adldap\LogAuthRejected',
        ],
        
        'Adldap\Laravel\Events\AuthenticatedWithCredentials' => [
            'App\Listeners\Adldap\LogAuthWithCredentials',
        ],
        
        'Adldap\Laravel\Events\DiscoveredWithCredentials' => [
            'App\Listeners\Adldap\LogAuthUserLocated',
        ],
        
        'Adldap\Laravel\Events\Authenticating' => [
            'App\Listeners\Adldap\LogAuthenticating',
        ],
        
        'Adldap\Laravel\Events\Authenticated' => [
            'App\Listeners\Adldap\LogLdapAuthSuccessful',
        ],
        
        'Adldap\Laravel\Events\AuthenticationFailed' => [
            'App\Listeners\Adldap\LogAuthFailure',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
