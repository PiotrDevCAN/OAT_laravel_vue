<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Adldap\Adldap;

class Login extends Controller
{
    public function showLoginForm(Request $request)
    {
        $targetPageTitle = $request->session()->pull('url.intended');
        
        $data = array(
            'targetPageTitle' => $targetPageTitle
        );
        
        return view('login', $data);
    }
    
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Request
     */
    public function authenticate(Request $request)
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|min:3' // password has to be greater than 3 characters
        );
        
        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);
        
        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::route('auth.login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            
            // create our user data for the authentication
            $credentials = array(
                'mail' => $request->input('email'),
                'password' => $request->input('password')
            );
            
            // remember me
            $remember = $request->input('remember', false);
            
            // attempt to do the login
            if (Auth::attempt($credentials, $remember)) {
                
//                 if ($request->input('email') == 'Piotr.Tajanowicz@ibm.com') {
                    
//                     dd('stopped');
                    
//                 }
                
                // Authentication passed...
                return Redirect::intended(route('home'));
                
            } else {
                
//                 if ($request->input('email') == 'test@ibm.com') {
                    
//                     dd('stopped');
                    
//                 }
                
                // validation not successful, send back to form
                return Redirect::route('auth.login')
                    ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
                
            }            
        }
    }
    
    public function cancel(Request $request)
    {
        return view('loginCancel');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        
        return view('logout');
    }
}