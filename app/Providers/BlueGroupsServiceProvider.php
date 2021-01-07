<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\BlueGroups\BlueGroupsService;
use Adldap\Laravel\Facades\Adldap;

class BlueGroupsServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
//     protected $defer = false;
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BlueGroupsService::class, function ($app) {
            
            $adldap = Adldap::getFacadeRoot();
            
            return new BlueGroupsService($adldap);
        });
    }
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }
    
    /**
     * @return array
     */
    public function provides()
    {
        return array(BlueGroupsService::class);
    }
    
}
