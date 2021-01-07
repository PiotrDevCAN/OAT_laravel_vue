<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Auth\BluepagesUserGuard;
use App\Auth\BluepagesUserProvider;
use App\Auth\BluegroupsAdminUserGuard;
use App\Auth\BluegroupsAdminUserProvider;
use App\Auth\BluegroupsGuestUserGuard;
use App\Auth\BluegroupsGuestUserProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
//         Auth::provider('bluepages-provider', function ($app, array $config) {
//             // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            
//             return $app->make(BluepagesUserProvider::class, [
//                 'hasher' => $app['hash'],
//             ]);
//         });        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Since the Auth Manager doesn't have to be called in every Request, we will just
        // set a callback before the application resolves it and passes it where it was
        // called.
        
        Auth::extend('bluepages-user', function ($app, $name, array $config) {
            return $app->make(BluepagesUserGuard::class, [
                'name' => $name,
                'provider' => $app['auth']->createUserProvider(
                    $config['provider'] ?? null
                    ),
                'session' => $app['session.store']
            ]);
        });
        
        Auth::provider('bluepages-provider', function ($app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            
            return $app->make(BluepagesUserProvider::class, [
                'hasher' => $app['hash'],
            ]);
        });
        
        Auth::extend('bluegroups-guest', function ($app, $name, array $config) {
            return $app->make(BluegroupsGuestUserGuard::class);
        });
        
        Auth::provider('bluegroups-guest-provider', function ($app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            
            return $app->make(BluegroupsGuestUserProvider::class, [
                'hasher' => $app['hash'],
            ]);
        });
        
        Auth::extend('bluegroups-admin', function ($app, $name, array $config) {
            return $app->make(BluegroupsAdminUserGuard::class);
        });
        
        Auth::provider('bluegroups-admin-provider', function ($app, array $config) {
            // Return an instance of Illuminate\Contracts\Auth\UserProvider...
            
            return $app->make(BluegroupsAdminUserProvider::class, [
                'hasher' => $app['hash'],
            ]);
        });
    }
}
