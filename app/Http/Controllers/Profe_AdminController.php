<?php

namespace App\Http\Controllers;

$IDActual = session()->get('id');
use App\Model\Departamento;
use App\Model\Empresa;
use App\Model\Grado;
use App\Model\Oferta;
use App\User;
<<<<<<< HEAD
use App\Model\Correo;


=======
>>>>>>> cfe5fc1e252c08a9ea2421ba72543ab262173235
class Profe_AdminController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth', ['only' => ['aniadirUsuario', 'aniadirCurriculum', 'aniadirGrado']]);
    }
    public static function Ofertas()
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

        //Aqui coge todos los usurios, hacer que coja solo uno 

        $user =User::selectProfile(); 
        if(!$user){
            return view("profesores/perfil");
        }
        return view("profesores/perfil")->with('user', $user);
    }
    
    public function Contacto()
    {
        //return view ("VerAlumnos");

        return view("profesores/contacto");

    }
<<<<<<< HEAD
    public function Usuarios()
=======
    public function Usuario()
>>>>>>> cfe5fc1e252c08a9ea2421ba72543ab262173235
    {
        $user = User::all();
        if (!$user) {
            return view("profesores/usuarios");
        }
<<<<<<< HEAD
        return view("profesores/usuarios")->with('users', $user);
=======
        return view("profesores/usuarios")->with('user', $user);
>>>>>>> cfe5fc1e252c08a9ea2421ba72543ab262173235

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
        $correos = Correo::all();
        $user = User::all();
        $user_correos = array('correos' => $correos, 'user' => $user);
        if (!$correos) {
            return view("profesores/buzon");
        }

        return view("profesores/buzon")->with('user_correos', $user_correos);


    }
}
