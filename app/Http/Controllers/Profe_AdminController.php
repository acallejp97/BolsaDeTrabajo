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


/*-----------------------------------------------------------------------------------------------------------------------------------------------
-------------------------------------------------AÑADIR UNA NUEVA EMPRESA----------------------------------------------------------------------*/
    public function AnadirEmpresas()
    {
        $empresa = Empresa::all();
        if (!$empresa) {
            return view("profes_admin/anadirEmpresas");
        }
            return view("profes_admin/anadirEmpresas")->with('empresas', $empresa);
    }

/*-----------------------------------------------------------------------------------------------------------------------------------------------
--------------------------------------------------AÑADIR UN NUEVO USUARIO----------------------------------------------------------------------*/

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
       switch(Auth::user()->rango){

           case 0:
           break;
           case 1:
           $profe = Profe_Admin::where('id_user',Auth::user()->id)->first();
           $grados= Grado::where('id_depar', $profe->id_depar);//Mas de un nombre | Pasar
           foreach ($grados as $grado){
               $alumnos_grado=Alumno_Grado::where('id_grado', $grado->id);
               foreach ($alumnos_grado as $alumno_grado) {
                   $alumno=Alumno::where('id', $alumno_grado->id_alumno)->first(); //Pasar
                   $usuario=User::where('id',$alumno->id_user);//Pasar
                }
            }
            break;
}
return view("profes_admin/usuarios")->with('$alumno', $alumno);
}
    
    
    //******* */FUNCIONES DE ADMIN********************
    public function AnadirProfesores()
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
        
        if(!$request->ajax())return redirect('/');
        $insertarDepartemento = new Departamento();
        $insertarDepartemento->nombre = $request->nombre;
        

        $task->save();
        //Esta función guardará las tareas que enviaremos mediante vuejs
    
    }
}