<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

//Importando las classes de modelo y servicios
use App\Usuario;
use App\Services\UsuarioService;
use App\Grado;
use App\Services\GradoService;
use App\Curriculum;
use App\Services\CurriculumService;
use App\Model\Alumno;

class AlumnoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['only'=>['aniadirUsuario' , 'aniadirCurriculum' , 'aniadirGrado']]);
    }
public function VerAlumno($id){
//return view ("VerAnimales");

//Meto en la variable alumno toda la info con la variable que meta en rutas
$alumno =Alumno::where('id','=',$id)->first(); 
if(!$alumno){
    return view ("welcome");
}


return view ("alumnos/home",compact('alumno'));
}
public function VerAlumnos(){
    //return view ("VerAlumnos");
    
    //Saco toda la tabla de alumnos
    // $alumnos =DB::table('alumnos')->get();   //el otro sistema
    $alumnos =Alumno::all(); //metodo eloquent
    if(!$alumnos){
        return view ("welcome");
    }
    
    //return view ("VerAlumnos");
    $alumno =new Alumno(); 
    $alumno->nombre='Benito';
$alumno->color='marron';
$alumno->anios=1;
$alumno->raza='buldog';
$alumno->duenio_id=2;
$alumnoService=new AlumnoService();
$alumnoService->Create($alumno);

//llamo a la funcion ver animales y regreso a la vista VerAnimales
return $this->VerAlumnos();
    }
}
/*
    public function irAniadirAlumno(){

    return view('aniadirAlumno');
        }
        public function aniadirAlumno(){
            //return view ("VerAlumnos");
            Log::info('aniadirAlumno');
        $alumno =new Duenio(); 
        $alumno->nombre='hola';
        $alumno->usuario='fs';
        $alumno->contrasenia=123456;
        Log::info('aniadirAlumno');
        $alumnoService=new AlumnoService();
        $alumnoService->Create($alumno);
        
        //llamo a la funcion ver animales y regreso a la vista VerAnimales
     
            }
}
*/