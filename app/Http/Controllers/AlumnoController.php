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
    public function VerOfertas()
    {
//return view ("VerAnimales");

//Meto en la variable alumno toda la info con la variable que meta en rutas
        $ofertas =Oferta::all();
        if (!$ofertas) {
            return view("alumnos/ofertas");
        }     
        return view("alumnos/ofertas")-> with('ofertas', $ofertas);
    }
    public function Contacto()
    {
        //return view ("VerAlumnos");
       
            return view ("alumnos/contacto");
        
        
    }
         
    public function VerPerfil()
    {
        //return view ("VerAlumnos");
       
            return view ("alumnos/perfil");
        
        
    }
    public function ActualizarCV()
    {
        //return view ("VerAlumnos");
       
            return view ("alumnos/curriculum");
        
        
    }
     

//llamo a la funcion ver animales y regreso a la vista VerAnimales
        
    
}
 
