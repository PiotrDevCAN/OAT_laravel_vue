<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\Index\EnteredEvent;
use Illuminate\Support\Facades\Auth;

class Index extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // event(new EnteredEvent());

        return view('main');
    }
    
    public function admin(Request $request)
    {
        return view('admin');
    }
    
    public function access()
    {
        // Get the currently authenticated user...
        $user = Auth::user();
        
        $data = array(
            'user' => $user
        );
        
        return view('access', $data);
    }
}
