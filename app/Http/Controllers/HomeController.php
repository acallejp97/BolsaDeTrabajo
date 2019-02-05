<?php

namespace App\Http\Controllers;

use Auth;
use Artisan;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('inicio');
    }

    protected function logout()
    {
        Auth::logout();
        // Artisan::call('cache:clear');
        return redirect('login');

    }

}
