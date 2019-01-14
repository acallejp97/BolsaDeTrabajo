<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Profe_AdminController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function login(Request $iniciado)
    {

        // $user = app('App\Http\Controllers\LoginController')->getUser($rango->input('rango'));
        // Log::info("rango",array($rango->all(), $user));
        // Sentry

        // Añadir a controlador user consulta a la base de datos para hacer la sentencia
        // Averiguar como coger el correo y la passwd
        

        if ($iniciado) {

            if (session()->get('rango') == 0) {
                Log::warning('!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!' . session()->get('rango'));
                return Profe_AdminController::Ofertas();
            } elseif (session()->get('rango') == 1) {
                return view('/profesores/anadirofertas');
            } elseif (session()->get('rango') == 2) {
                return view('/alumnos/ofertas');
            }
        } else {
            return view('/auth/login');
        }
    }
}