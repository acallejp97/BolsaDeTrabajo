<?php

namespace App\Http\Controllers;

use App\Model\Alumno;

//Importando las classes de modelo y servicios

class AlumnoController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth', ['only' => ['aniadirUsuario', 'aniadirCurriculum', 'aniadirGrado']]);
    }
    public function VerAlumno($id)
    {
//return view ("VerAnimales");

//Meto en la variable alumno toda la info con la variable que meta en rutas
        $alumno = Alumno::where('id', '=', $id)->first();
        if (!$alumno) {
            return view("alumnos/ofertas");
        }

        return view("alumnos/ofertas", compact('alumno'));
    }
    public function VerAlumnos()
    {
        //return view ("VerAlumnos");

        //Saco toda la tabla de alumnos
        // $alumnos =DB::table('alumnos')->get();   //el otro sistema
        $alumnos = Alumno::all(); //metodo eloquent
        if (!$alumnos) {
            return view("alumnos/ofertas");
        }

//llamo a la funcion ver animales y regreso a la vista VerAnimales
        return $this->VerAlumnos();
    }
}
 
