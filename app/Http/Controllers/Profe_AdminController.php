<?php
namespace App\Http\Controllers;
use App\Model\Alumno;
use App\Model\Correo;
use App\Model\Departamento;
use App\Model\Empresa;
use App\Model\Grado;
use App\Model\Oferta;
use App\Model\Profe_Admin;
use App\Model\Alumno_Grado;
use App\Model\Alumno_Oferta;
use App\User;
use Auth;
class Profe_AdminController extends Controller
{
    public function __construct()
    {
    }
    public function Empresas()
    {
        $empresas = Empresa::all();
        if (!$empresas) {
            return view("profes_admin/empresas");
        }
        return view("profes_admin/empresas")->with('empresas', $empresas);
    }

    public function AnadirEmpresas()
    {
      
    }

    public function AnadirUsuarios()
    {
        return view("profes_admin/anadirusuarios");
    }
    
    public function Cursos()
    {
        $departamentos = Departamento::all();
        $grados = Grado::all();
        $grados_depar = array('departamentos' => $departamentos, 'grados' => $grados);
        if (!$departamentos) {
            return view("profes_admin/cursos");
        }
        return view("profes_admin/cursos")->with('grados_depar', $grados_depar);
    }
   
    /*--------------------------------------------MOSTRAR TODOS LOS USUARIOS------------------------------------------------------
    ----------------------------------------------------------------------------------------------------------------------------*/
    
    public function Usuarios()
    {
       
        $comun = Profe_Admin::find(3)->departamento;

        return view("profes_admin/usuarios")->with('comun', $comun);
    }
    
    //******* */FUNCIONES DE ADMIN********************
    public function AnadirProfesor()
    {
        $profesor = Profe_Admin::all();
        $user = User::all();
        $departamento = Departamento::all();
        $profesores = array('profe_admin' => $profesor, 'user' => $user, 'departamento' => $departamento);
        if (!$profesor) {
            return view("profes_admin/anadirprofesores");
        }
        return view("profes_admin/anadirprofesores")->with('profesores', $profesores);
    }
    
    public function Buzon()
    {
        $correos = Correo::all();
        $user = User::all();
        $user_correos = array('correos' => $correos, 'user' => $user);
        if (!$correos) {
            return view("profes_admin/buzon");
        }
        return view("profes_admin/buzon")->with('user_correos', $user_correos);
    }

    public function insertDepartament(Request $request)
    {
        $post = json_decode(file_get_contents('php://input'), true);

Departamentos::insert(

    ['nombre' => $request->nombre]
    
);
    }
public function store(Request $request)
    {
        $correo = Correo::all;
        $correo -> $nombre = $request->input('nombre');
        $correo -> $email = $request->input('email');
        $correo -> $mensaje = $request->input('mensaje');
        $correo -> save();
        Notification::success('El correo ha sido enviado exitosamente');
        return redirect ('alumno/contacto', "AlumnoController@Contacto");
    }

    }

