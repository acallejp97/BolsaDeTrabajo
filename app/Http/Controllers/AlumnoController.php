<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Oferta;
use App\Model\Alumno;
use App\Model\Curriculum;
use App\User;
use Auth;
use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
//Importando las classes de modelo y servicios

class AlumnoController extends Controller
{

    public function __construct()
    {
    }

    public function ActualizarCV()
    {


      
    
        
        $user = User::all();
        $curriculums = Curriculum::all();
 $id_alumno = Alumno::select('id')->where('id_user', Auth::user()->id)->first();
      
        foreach ($id_alumno as $id) {
            $id_cv= Curriculum::all();
       $curriculum = Curriculum::select('*')->where('id_alumno', $id)->first();
         }
        return view("alumnos/curriculum")->with('curriculum', $curriculum);
    }

    public function updatecv(Request $request)
    {
        $rules = ['image' => 'required|image|max:1024*1024*1', ];
        $messages = [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 1 MB',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return view("alumnos/curriculum")->withErrors($validator);
        } else {
            $name = str_random(10) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('perfiles', $name);
            $user = new User;
            $user->where('email', '=', Auth::user()->email)
                ->update(['imagen' => $name]);

            return view("alumnos/curriculum")->with('status', 'Su imagen de perfil ha sido cambiada con éxito');
        }
    }

}
