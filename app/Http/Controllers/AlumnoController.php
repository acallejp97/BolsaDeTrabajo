<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Model\Alumno;
use App\Model\Oferta;
use App\Services\OfertaService;

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
        $ofertas =Oferta::all();
        if (!$ofertas) {
            return view("alumnos/ofertas");
        }     
        return view("alumnos/ofertas")-> with('ofertas', $ofertas);
    }
    public function VerAlumnos()
    {
        //return view ("VerAlumnos");
        $ofertas =Oferta::all(); //metodo eloquent
        if(!$ofertas){
            return view ("alumnos/ofertas");
        }
        
         return view ("Veralumnos",array(),compact('ofertas'));
         
     

//llamo a la funcion ver animales y regreso a la vista VerAnimales
        return $this->VerAlumnos();
    }
}
 
