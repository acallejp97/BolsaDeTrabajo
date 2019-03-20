<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\inscripcion;
use App\Model\Alumno;
use App\Model\Alumno_Oferta;
use App\Model\Curriculum;
use App\Model\Empresa;
use App\Model\Oferta;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Mail;
use Validator;

class AlumnoController extends Controller
{

    public function __construct()
    {
    }

    public function ActualizarCV()
    {
        $id_alumno = Alumno::select('id')->where('id_user', Auth::user()->id)->first();
            $curriculums = Curriculum::where('id_alumno', $id_alumno['id'])->first();

        return view("alumnos/curriculum")->with('curriculum', $curriculums);
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
            return redirect('/actualizarCV');
        } else {
            $imagen = str_random(10) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move('fotosPerfil', $imagen);
            $alumno = Alumno::where('id_user', Auth::user()->id)->first();
            $curriculum = Curriculum::where('id_alumno', $alumno['id']);
            $curriculum->update(['imagen' => $imagen, 'updated_at' => date('Y-m-d')]);

            return redirect('/actualizarCV');
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
                    $actualizarUsuario->update(['nombre' => $nombre, 'updated_at' => date('Y-m-d H:m:s')]);
                }

                if ($apellido != "") {
                    $actualizarUsuario->update(['apellidos' => $apellido, 'updated_at' => date('Y-m-d H:m:s')]);
                }

                if ($email != "") {
                    $actualizarUsuario->update(['email' => $email, 'updated_at' => date('Y-m-d H:m:s')]);
                }

                if ($direccion != "") {
                    $actualizarUsuario->update(['direccion' => $direccion, 'updated_at' => date('Y-m-d H:m:s')]);
                }

                if ($formacion != "") {
                    $actualizarUsuario->update(['competencias' => $formacion, 'updated_at' => date('Y-m-d H:m:s')]);
                }

                if ($idiomas != "") {
                    $actualizarUsuario->update(['idiomas' => $idiomas, 'updated_at' => date('Y-m-d H:m:s')]);
                }
                if ($experiencia != "") {
                    $actualizarUsuario->update(['experiencia' => $experiencia, 'updated_at' => date('Y-m-d H:m:s')]);
                }
                if ($otros != "") {
                    $actualizarUsuario->update(['otros_datos' => $otros, 'updated_at' => date('Y-m-d H:m:s')]);
                }
                if ($telefono != "") {
                    $actualizarUsuario->update(['telefono' => $telefono, 'updated_at' => date('Y-m-d H:m:s')]);
                }
                break;
            }

        }

    }

    public function console_log($data)
    {
        echo '<script>';
        echo 'console.log(' . json_encode($data) . ')';
        echo '</script>';
    }

    public function inscribirse(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        if (isset($_REQUEST['inscripcion'])) {

            $enviado = json_decode($_REQUEST['inscripcion']);

            $id_oferta = $enviado->idoferta;

            $id_usuario = Auth::user()->id;
            $alumno = Alumno::where('id_user', $id_usuario)->first();
            $oferta = Oferta::where('id', $id_oferta)->first();
            $empresa = Empresa::where('id', $oferta['id_empresa'])->first();

            $curriculum = Curriculum::where('id_alumno', $alumno['id'])->first();

            $data = array(
                'nombre' => $curriculum['nombre'],
                'idiomas' => $curriculum['idiomas'],
                'apellidos' => $curriculum['apellidos'],
                'telefono' => $curriculum['telefono'],
                'direccion' => $curriculum['direccion'],
                'email' => $curriculum['email'],
                'competencias' => $curriculum['competencias'],
                'experiencia' => $curriculum['experiencia'],
                'otros_datos' => $curriculum['otros_datos'],
            );

            Mail::to($empresa['email'])
                ->send(new inscripcion($data));

            $AlumnoOferta = new Alumno_Oferta;
            $AlumnoOferta->insert(['id_alumno' => $alumno['id'], 'id_oferta' => $id_oferta]);
        }
    }
}
