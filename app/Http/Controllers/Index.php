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
        // Page enter logic...
        
//         dump('BluePages facade test');
//         dump(BluePages::getDetailsFromIntranetId('Piotr.Tajanowicz@ibm.com'));
//         dump(BluePages::getDetailsFromNotesId('Piotr Tajanowicz/Poland/IBM'));
        
//         dump('BlueGroups facade test');
//         BlueGroups::group_auth($user_dn, $group, $depth = 2);
//         BlueGroups::checkBluegroup('OAT_admin');
//         BlueGroups::user_auth('Piotr.Tajanowicz@ibm.com', 'kr324jbhj32ref64fd');
//         BlueGroups::employee_bluegroups($employee);
//         BlueGroups::bluepages_search($filter, $attr = null, $key_attr = 'dn');
        
        return view('main');
    }
    
    public function index(Request $request)
    {
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
