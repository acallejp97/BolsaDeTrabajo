<?php

namespace App\Http\Controllers;

use App\Model\Correo;
use App\Model\Departamento;
use App\Model\Empresa;
use App\Model\Grado;
use App\Model\Oferta;
use App\Model\Profe_Admin;
use App\User;
use Auth;

class Profe_AdminController extends Controller
{

    public function __construct()
    {

    }

    public function Ofertas()
    {
        $ofertas = Oferta::all();
        if (!$ofertas) {
            return view("profesores/anadirofertas");
        }
        return view("profesores/anadirofertas")->with('ofertas', $ofertas);
    }

    public function Empresas()
    {
        $empresas = Empresa::all();
        if (!$empresas) {
            return view("profesores/empresas");
        }
        return view("profesores/empresas")->with('empresas', $empresas);
    }

    public function AnadirEmpresas()
    {
        return view("profesores/anadirempresas");
    }

    public function AnadirUsuarios()
    {
        return view("profesores/anadirusuarios");
    }

    public function Cursos()
    {
        $departamentos = Departamento::all();
        $grados = Grado::all();
        $grados_depar = array('departamentos' => $departamentos, 'grados' => $grados);
        if (!$departamentos) {
            return view("profesores/cursos");
        }
        return view("profesores/cursos")->with('grados_depar', $grados_depar);
    }

    public function Perfil()
    {
        $numeroInscripciones=DB::where('status','=','1')->count();

        return view("profesores/perfil");
    }

    public function Contacto()
    {
        return view("profesores/contacto");
    }

    public function Usuarios()
    {
        $user = User::all();
        if (!$user) {
            return view("profesores/usuarios");
        }
        return view("profesores/usuarios")->with('users', $user);

    }

  

    
}
