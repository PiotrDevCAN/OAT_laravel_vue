<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Navigation extends Component
{
    public $menuList;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->menuList = array(
            'Home' => array(
                'route' => 'home'
            ),
            'Request' => array(              
                'route' => array(
                    'Create' => array(
                        'route' => 'request.create'
                    ),
                    'List' => array(
                        'route' => 'request.list'
                    ),
                    'Approved' => array(
                        'route' => 'request.approved'
                    )
                )
            ),
            'Admin' => array(
                'route' => array(
                    'Accounts' => array(
                        'route' => array(
                            'Create' => array(
                                'route' => 'admin.account.create'
                            ),
                            'List' => array(
                                'route' => 'admin.account.list'
                            )
                        )
                    ),
                    'Sevice Lines' => array(
                        'route' => array(
                            'Create' => array(
                                'route' => 'admin.competency.create'
                            ),
                            'List' => array(
                                'route' => 'admin.competency.list'
                            )
                        )
                    ),
                    'Delegates' => array(
                        'route' => array(
                            'Create' => array(
                                'route' => 'admin.delegate.create'
                            ),
                            'List' => array(
                                'route' => 'admin.delegate.list'
                            )
                        )
                    ),
                    'Locations' => array(
                        'route' => array(
                            'Create' => array(
                                'route' => 'admin.location.create'
                            ),
                            'List' => array(
                                'route' => 'admin.location.list'
                            )
                        )
                    ),
                    'Logs' => array(
                        'route' => 'admin.log.list'
                    )
                )
            ),
            'My Delegates' => array(
                'route' => array(
                    'Create' => array(
                        'route' => 'admin.delegate.my.create'
                    ),
                    'List' => array(
                        'route' => 'admin.delegate.my.list'
                    )
                )
            ),
            'My Access' => array(
                'route' => 'access.my'
            ),
        );
        
        /*
         * Check which item is selected
         */
        foreach ($this->menuList as $key => $value) {
            if (is_array($value['route'])) {
                foreach ($value['route'] as $subKey => $subValue) {
                    if (is_array($subValue['route'])) {
                        foreach ($subValue['route'] as $subSubKey => $subSubValue) {
                            if (is_array($subSubValue['route'])) {
                                foreach ($subSubValue['route'] as $subSubSubKey => $subSubSubValue) {
                                    if ($subSubSubValue['route'] == Route::currentRouteName()) {
                                        $this->menuList[$key]['route'][$subKey]['route'][$subSubKey]['route'][$subSubSubKey]['selected'] = true;
                                        
                                        // open group
                                        $this->menuList[$key]['expanded'] = true;
                                        
                                        // open sub group
                                        $this->menuList[$key]['route'][$subKey]['expanded'] = true;
                                        
                                        // open sub sub group
                                        $this->menuList[$key]['route'][$subKey]['route'][$subSubKey]['expanded'] = true;
                                    }
                                }
                            } else {
                                if ($subSubValue['route'] == Route::currentRouteName()) {
                                    $this->menuList[$key]['route'][$subKey]['route'][$subSubKey]['selected'] = true;
                                    
                                    // open group
                                    $this->menuList[$key]['expanded'] = true;
                                    
                                    // open sub group
                                    $this->menuList[$key]['route'][$subKey]['expanded'] = true;                                    
                                }
                            }
                        }                        
                    } else {
                        if ($subValue['route'] == Route::currentRouteName()) {
                            $this->menuList[$key]['route'][$subKey]['selected'] = true;
                            
                            // open group
                            $this->menuList[$key]['expanded'] = true;
                        }
                    }
                }
            } else {
                if ($value['route'] == Route::currentRouteName()) {
                    $this->menuList[$key]['selected'] = true;
                }
            }
        }
        
        if (Auth::check()) {
            // The user is logged in...
            $this->menuList['Log off'] = array(
                'route' => 'auth.logout'
            );
        } else {
            // The user is not logged in...
            $this->menuList['Log on'] = array(
                'route' => 'auth.login'
            );
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.navigation');
    }
}
