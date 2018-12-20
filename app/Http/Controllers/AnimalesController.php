<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

//Importando las classes de modelo y servicios
use App\Perro;
use App\Services\PerroService;
use App\Duenio;
use App\Services\DuenioService;

class AnimalesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['only'=>['aniadirAnimales', 'aniadirDuenio']]);
    }
public function VerAnimal($id){
//return view ("VerAnimales");

//Meto en la variable perro toda la info con la variable que meta en rutas
$perro =Perro::where('id','=',$id)->first(); 
if(!$perro){
    return view ("welcome");
}


return view ("VerAnimal",compact('perro'));
}
public function VerAnimales(){
    //return view ("VerAnimales");
    
    //Saco toda la tabla de perros
    // $perros =DB::table('perros')->get();   //el otro sistema
    $perros =Perro::all(); //metodo eloquent
    if(!$perros){
        return view ("welcome");
    }
    
    return view ("VerAnimales",array(),compact('perros'));
    }
public function aniadirAnimales(){
    //return view ("VerAnimales");

    $perro =new Perro(); 
    $perro->nombre='Benito';
$perro->color='marron';
$perro->anios=1;
$perro->raza='buldog';
$perro->duenio_id=2;
$perroService=new PerroService();
$perroService->Create($perro);

//llamo a la funcion ver animales y regreso a la vista VerAnimales
return $this->VerAnimales();
    }

    public function irAniadirDuenio(){

    return view('aniadirDuenio');
        }
        public function aniadirDuenio(){
            //return view ("VerAnimales");
            Log::info('aniadirDuenio');
        $duenio =new Duenio(); 
        $duenio->nombre='hola';
        $duenio->usuario='fs';
        $duenio->contrasenia=123456;
        Log::info('aniadirDuenio');
        $DuenioService=new DuenioService();
        $DuenioService->Create($duenio);
        
        //llamo a la funcion ver animales y regreso a la vista VerAnimales
     
            }
}
