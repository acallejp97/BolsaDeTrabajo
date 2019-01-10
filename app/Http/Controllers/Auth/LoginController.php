<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $rango)
    {
        
            $user = app('App\Http\Controllers\LoginController')->getUser($rango->input('rango'));
            Log::info("rango",array($rango->all(), $user));
            

        if (session('status')) {

            session('status');

            if (session::get('rango') == '0') {
                return view('profesores/anadirofertas');
            } elseif (session::get('rango') == '1') {
                return view('profesores/anadirofertas');
            } else {
                return view('VerOfertas');
            }
        }
    }

}