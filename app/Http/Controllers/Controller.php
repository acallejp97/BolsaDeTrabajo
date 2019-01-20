<?php

namespace App\Http\Controllers;

use App\Model\Departamento;
use App\Model\Oferta;
use App\Model\Profe_Admin;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Ofertas()
    {
        $ofertas = Oferta::all();
        switch (Auth::user()->rango) {
            case 0:
            case 1:
                if (!$ofertas) {
                    return view("profes_admin/anadirofertas");
                }
                return view("profes_admin/anadirofertas")->with('ofertas', $ofertas);

                break;

            case 2:
                if (!$ofertas) {
                    return view("alumnos/ofertas");
                }
                return view("alumnos/ofertas")->with('ofertas', $ofertas);
                break;

        }
    }

    public function Contacto()
    {
        switch (Auth::user()->rango) {
            case 0:
            case 1:
                return view("profes_admin/contacto");
                break;
            case 2:
                return view("alumnos/contacto");
                $sessionID = session('id');
                $email = User::selectProfile($sessionID);
                $nombre = User::select('nombre')
                    ->where('email', 'like', $email)
                    ->get();

                return back()->withInput();
                break;
        }
    }

    public function Perfil()
    {
        switch (Auth::user()->rango) {
            case 0:case 1:
                if (Auth::user()->rango == 1) {
                    $id_depar = Profe_Admin::select('id_depar')->where('id_user', Auth::user()->id)->get();
                    foreach ($id_depar as $id) {
                        $nombreDepar = Departamento::select('nombre')->where('id', $id->id_depar)->get();
                    }
                    return view("profes_admin/perfil")->with('nombreDepar', $nombreDepar);
                } else {
                    return view("profes_admin/perfil");
                }
                break;
            case 2:
                return view("alumnos/perfil");
                break;
        }
    }

    public function mostrarUsuario(Request $request)
    {
        $task = array([
            'nombre'=>Auth::user()->nombre,
            'apellidos'=>Auth::user()->nombre,
            'email'=>Auth::user()->nombre,
            'rango'=>Auth::user()->nombre,
            'password'=>Auth::user()->nombre,
            'imagen'=>Auth::user()->nombre
            
            ]);
        return $task;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }

    public function updateUser(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        $actualizarUsuario = User::findOrFail($request->id);

        $actualizarUsuario->nombre = $request->nombre;
        $actualizarUsuario->apellidos = $request->apellidos;
        $actualizarUsuario->email = $request->email;
        $actualizarUsuario->password = $request->password;
        $actualizarUsuario->imagen = $request->imagen;

        $actualizarUsuario->save();
    }
}
