<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\IndexEntered;
use Illuminate\Support\Facades\Auth;
use App\Helpers\BlueGroups\Facades\BlueGroups;

class Index extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('main');
    }
    
    public function vue(Request $request)
    {
        return view('layouts.app');
    }
}
