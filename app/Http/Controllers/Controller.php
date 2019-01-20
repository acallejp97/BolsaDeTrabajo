<?php

namespace App\Http\Controllers;

use App\Model\Departamento;
use App\Model\Oferta;
use App\Model\Profe_Admin;
use App\Model\Empresa;
use App\Model\Grado;
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
            $empresas = Empresa::all();
            $ofertas = Oferta::all();
            $grados = Grado::all();
            $empresa_oferta = array('empresas' => $empresas, 'ofertas' => $ofertas, 'grados' => $grados);
      
            if (!$empresas) {
                return view("profes_admin/anadirofertas");
            }
            return view("profes_admin/anadirofertas")->with('empresa_oferta', $empresa_oferta);

                break;

                
            case 2:
            $empresas = Empresa::all();
       
            $ofertas = Oferta::all();
            $empresa_oferta = array('empresas' => $empresas, 'ofertas' => $ofertas);
            $empresas = array_unique($empresas_oferta);
            if (!$empresas) {
                return view("profes_admin/anadirempresas");
            }
            return view("profes_admin/anadirempresas")->with('empresa_oferta', $empresa_oferta);
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

    public function updateUser(Request $request)
    {
        if(!$request->ajax())return redirect('/');
        $task = Task::findOrFail($request->id);
    
        $task->name = $request->name;
        $task->description = $request->description;
        $task->content = $request->content;
    
        $task->save();
    }
}
