<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Alumno;
use App\Model\Curriculum;
use App\User;
use Auth;

use Validator;

class PdfController extends Controller
{
    public function pdf() {


        $curriculums = Curriculum::all();
    $data = $this->getData();
    
    
    $view =  \View::make('alumnos.curriculum', compact('data', 'date', 'user'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->download('pdf')->with('curriculums', $curriculums);;
}

public function getData() 
{
    $data =  [
        'nombre'      => 'Auth::user()->nombre' ,
        'apellido'   => 'Auth::user()->apellidos',
       

    ];
    return $data;
}
}
