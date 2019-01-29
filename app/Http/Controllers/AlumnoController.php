<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Model\Alumno;
use App\Model\Curriculum;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Validator;

class AlumnoController extends Controller
{

    public function __construct()
    {
    }

    public function ActualizarCV()
    {
        $id_alumno = Alumno::select('id')->where('id_user', Auth::user()->id)->get();

        foreach ($id_alumno as $id) {

            $curriculum = Curriculum::where('id_alumno', $id->id)->get();
        }
        return view("alumnos/curriculum")->with('curriculums', $curriculum);
    }

    public function fotocv(Request $request)
    {
        $rules = ['image' => 'required|image|max:1024*1024*1'];
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

    public function updateCV(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        if (isset($_REQUEST['updateCV'])) {

            $enviado = json_decode($_REQUEST['updateCV']);

            $nombre = $enviado->nombre;
            $apellido = $enviado->apellidos;
            $email = $enviado->email;
            $direccion = $enviado->direccion;
            $formacion = $enviado->formacion;
            $idiomas = $enviado->idiomas;
            $experiencia = $enviado->experiencia;
            $otros = $enviado->otros;
            $telefono = $enviado->telefono;

            $id_alumnos = Alumno::select('id')->where('id_user', Auth::user()->id)->first();
            foreach ($id_alumnos as $id_alumno) {

                $actualizarUsuario = Curriculum::where('id_alumno', $id_alumno)->first();
                if ($nombre != "") {
                    $actualizarUsuario->update(['nombre' => $nombre]);
                }

                if ($apellido != "") {
                    $actualizarUsuario->update(['apellidos' => $apellido]);
                }

                if ($email != "") {
                    $actualizarUsuario->update(['email' => $email]);
                }

                if ($direccion != "") {
                    $actualizarUsuario->update(['direccion' => $direccion]);
                }

                if ($formacion != "") {
                    $actualizarUsuario->update(['competencias' => $formacion]);
                }

                if ($idiomas != "") {
                    $actualizarUsuario->update(['idiomas' => $idiomas]);
                }
                if ($experiencia != "") {
                    $actualizarUsuario->update(['experiencia' => $experiencia]);
                }
                if ($otros != "") {
                    $actualizarUsuario->update(['otros_datos' => $otros]);
                }
                if ($telefono != "") {
                    $actualizarUsuario->update(['telefono' => $telefono]);
                }
                break;
            }

        }

    }

}
