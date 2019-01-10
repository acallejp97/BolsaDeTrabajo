<?php

namespace App\Http\Controllers;

use App\Model\Departamento;
use App\Model\Empresa;
use App\Model\Grado;
use App\Model\Oferta;
use App\Model\Usuario;

class Profe_AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['only' => ['aniadirUsuario', 'aniadirCurriculum', 'aniadirGrado']]);
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
        //return view ("VerAlumnos");

        return view("profesores/anadirempresas");

    }
    public function AnadirUsuarios()
    {
        //return view ("VerAlumnos");

        return view("profesores/anadirusuarios");

    }
    public function Cursos()
    {
        //return view ("VerAlumnos");
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
        //return view ("VerAlumnos");

        return view("profesores/perfil");

    }
    public function Contacto()
    {
        //return view ("VerAlumnos");

        return view("profesores/contacto");

    }
    public function Usuarios()
    {
        $usuarios = Usuario::all();
        if (!$usuarios) {
            return view("profesores/usuarios");
        }
        return view("profesores/usuarios")->with('usuarios', $usuarios);

    }

    //******* */FUNCIONES DE ADMIN********************
    public function AnadirProfesor()
    {
        //return view ("VerAlumnos");

        return view("profesores/anadirprofesor");

    }
    public function Buzon()
    {
        //return view ("VerAlumnos");

        return view("profesores/buzon");

    }
}
