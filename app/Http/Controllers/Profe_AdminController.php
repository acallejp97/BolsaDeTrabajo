<?php
namespace App\Http\Controllers;

use App\Mail\contraseniaMail;
use App\Mail\respuestaMail;
use App\Model\Alumno;
use App\Model\Alumno_Grado;
use App\Model\Correo;
use App\Model\Curriculum;
use App\Model\Departamento;
use App\Model\Empresa;
use App\Model\Grado;
use App\Model\Oferta;
use App\Model\Profe_Admin;
use App\User;
use Auth;
use Excel;
use File;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use Session;

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

    public function altaUsuarios()
    {
        $grados = Grado::All();
        return view("profes_admin/anadirusuarios")->with('grados', $grados);
    }

    public function insertUser(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }
        if (isset($_REQUEST['nuevoUsuario'])) {
            $enviado = json_decode($_REQUEST['nuevoUsuario']);
            $nombre = $enviado->nombre;
            $apellidos = $enviado->apellidos;
            $rango = 2;
            $password = $this->randomPassword();
            $email = $enviado->email;
            $aniofin = $enviado->anio;
            $id_grado = $enviado->idgrado;

            $insertarUsuario = new User;
            $insertarUsuario->insert(['nombre' => $nombre, 'apellidos' => $apellidos, 'rango' => $rango, 'email' => $email,
                'password' => Hash::make($password), 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')]);

            $id_user = User::max('id');
            $insertarAlumno = new Alumno;
            $insertarAlumno->insert(['anio_fin' => $aniofin, 'id_user' => $id_user, 'created_at' => date('Y-m-d H:m:s'), 'updated_at' => date('Y-m-d H:m:s')]);

            $id_alumno = Alumno::max('id');
            $insertarCV = new Curriculum;
            $insertarCV->insert(['id_alumno' => $id_alumno,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s'),
            ]);

            $usuarioGrado = new Alumno_Grado;
            $usuarioGrado->insert([
                'id_grado' => $id_grado,
                'id_alumno' => $id_alumno,
                'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')]);

            Mail::to($email)
                ->send(new contraseniaMail($password));
        }
    }

    public function csv(Request $request)
    {
        //validate the xls file
        $this->validate($request, array(
            'file' => 'required',
        ));

        if ($request->hasFile('file')) {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {
                $path = $request->file->getRealPath();
                $data = Excel::load($path, function ($reader) {
                })->get();

                if (!empty($data) && $data->count()) {
                    $ultimaIdUser = User::max('id');
                    $ultimaIdAlumno = Alumno::max('id');

                    $siguienteId = 1;
                    foreach ($data as $key => $value) {
                        $password = $this->randomPassword();
                        $id_grado = Grado::where('abreviacion', strtoupper($value->abreviacion_grado))->first();
                        $insertUser[] = [
                            'email' => $value->email,
                            'nombre' => $value->nombre,
                            'rango' => 2,
                            'apellidos' => $value->apellidos,
                            'password' => Hash::make($password),
                            'created_at' => date('Y-m-d H:m:s'),
                            'updated_at' => date('Y-m-d H:m:s'),
                        ];
                        $insertAlumno[] = [
                            'id_user' => $ultimaIdUser + $siguienteId,
                            'anio_fin' => $value->anio_fin,
                            'created_at' => date('Y-m-d H:m:s'),
                            'updated_at' => date('Y-m-d H:m:s'),
                        ];
                        $insertCurriculum[] = [
                            'id_alumno' => $ultimaIdAlumno + $siguienteId,
                            'created_at' => date('Y-m-d H:m:s'),
                            'updated_at' => date('Y-m-d H:m:s'),
                        ];
                        $insertGrado[] = [
                            'id_grado' => $id_grado['id'],
                            'id_alumno' => $ultimaIdAlumno + $siguienteId,
                            'created_at' => date('Y-m-d H:m:s'),
                            'updated_at' => date('Y-m-d H:m:s'),
                        ];
                        $siguienteId++;

                        Mail::to($value->email)
                            ->send(new contraseniaMail($password));
                    }

                    if (!empty($insertUser)) {
                        $insertData = User::insert($insertUser);
                        $insertAlumnos = Alumno::insert($insertAlumno);
                        $insertCurriculum = Curriculum::insert($insertCurriculum);
                        $insertGrado = Alumno_Grado::insert($insertGrado);
                        if ($insertData) {
                            Session::flash('success', 'Sus datos han sido añadidos correctamente');
                        } else {
                            Session::flash('error', 'Error añadiendo los datos...');
                            return back();
                        }
                    }
                }
                return back();
            } else {
                Session::flash('error', 'File is a ' . $extension . ' file.!! Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }

    public function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
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
        if (Auth::user()->rango == 1) {
            $id_departamento = Profe_Admin::where('id_user', Auth::user()->id)->first();
            $id_grados = Grado::where('id_depar', $id_departamento->id_depar)->get(); //3 grados
            $id_alumnos = Alumno_Grado::where('id_grado', $id_grados)->get(); //5 alumnos
            $alumnos = Alumno::where('id', $id_alumnos)->get(); //5 alumnos
            $user = User::where('rango', 2)->get();
        } else {

            $alumnos = Alumno::all();
            $user = User::where('rango', 2)->get();
        }
        $alumnosuser = array('user' => $user, 'alumno' => $alumnos);
        if (!$alumnosuser) {
            return view("profes_admin/usuarios");
        }
        return view("profes_admin/usuarios")->with('alumnosuser', $alumnosuser);

    }

    //******* */FUNCIONES DE ADMIN********************
    public function Profesores()
    {

        $profesor = Profe_Admin::all();
        $user = User::where('rango', 1)->get();
        $departamento = Departamento::all();
        $profesores = array('profe_admin' => $profesor, 'user' => $user, 'departamento' => $departamento);
        if (!$profesores) {
            return view("profes_admin/profesores");
        }
        return view("profes_admin/profesores")->with('profesores', $profesores);
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

    public function deleteMensaje(Request $request)
    {

        $enviado = json_decode($_REQUEST['borrarCorreo']);

        if (!$request->ajax()) {
            return redirect('/');
        }
        $id = $enviado->id;

        Correo::where('id', $id)->delete();

    }

    public function abrirMensaje(Request $request)
    {

        $enviado = json_decode($_REQUEST['abrirMensaje']);

        if (!$request->ajax()) {
            return redirect('/');
        }
        $usuario = $enviado->usuario;
        $asunto = $enviado->asunto;
        $nombre = $enviado->nombre;
        $fecha = $enviado->fecha;
        $descripcion = $enviado->descripcion;

    }

    public function insertDepartamento(Request $request)
    {

        if (!$request->ajax()) {
            return redirect('/');
        }
        if (isset($_REQUEST['nuevoDepartamento'])) {
            $enviado = json_decode($_REQUEST['nuevoDepartamento']);
            $nombre = $enviado->nombre;

            $insertarDepartamento = new Departamento;
            $insertarDepartamento->insert(['nombre' => $nombre, 'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')]);
        } else {
            $insertarDepartamento->delete();

        }
    }

    public function insertGrado(Request $request)
    {

        $enviado = json_decode($_REQUEST['nuevoGrado']);

        if (!$request->ajax()) {
            return redirect('/');
        }
        $nombre = $enviado->nombre;
        $idDepar = $enviado->idDepar;
        $abreviacion = $enviado->abreviacion;

        $insertarGrado = new Grado;
        if ($nombre != "") {
            $insertarGrado->insert(['nombre' => $nombre, 'id_depar' => $idDepar, 'abreviacion' => $abreviacion, 'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')]);
        }
    }

    public function deleteUsuario(Request $request)
    {

        $enviado = json_decode($_REQUEST['borrarUsuario']);

        if (!$request->ajax()) {
            return redirect('/');
        }
        $id = $enviado->id;

        user::where('id', $id)->delete();

    }

    public function deleteGrado(Request $request)
    {

        $enviado = json_decode($_REQUEST['borrarGrado']);

        if (!$request->ajax()) {
            return redirect('/');
        }
        $id = $enviado->id;

        if ($id != "") {
            Grado::where('id', $id)->delete();

        }
    }

    public function deleteDepartamento(Request $request)
    {

        $enviado = json_decode($_REQUEST['borrarDepartamento']);

        if (!$request->ajax()) {
            return redirect('/');
        }
        $id = $enviado->id;

        if ($id != "") {

            Departamento::where('id', $id)->delete();

        }
    }
    public function deleteOferta(Request $request)
    {

        $enviado = json_decode($_REQUEST['borrarOferta']);

        if (!$request->ajax()) {
            return redirect('/');
        }
        $id = $enviado->id;

        Oferta::where('id', $id)->delete();

    }

    public function deleteEmpresa(Request $request)
    {

        $enviado = json_decode($_REQUEST['borrarEmpresa']);

        if (!$request->ajax()) {
            return redirect('/');
        }
        $id = $enviado->id;

        Empresa::where('id', $id)->delete();

    }

    public function deleteProfesor(Request $request)
    {

        $enviado = json_decode($_REQUEST['borrarProfesor']);

        if (!$request->ajax()) {
            return redirect('/');
        }
        $id = $enviado->id;

        Profe_Admin::where('id', $id)->delete();
    }

    public function store(Request $request)
    {
        $correo = Correo::all;
        $correo->$nombre = $request->input('nombre');
        $correo->$email = $request->input('email');
        $correo->$mensaje = $request->input('mensaje');
        $correo->save();
        Notification::success('El correo ha sido enviado exitosamente');
        return redirect('alumno/contacto', "AlumnoController@Contacto");
    }

    public function insertarOferta(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        $enviado = json_decode($_REQUEST['nuevaOferta']);

        $titulo = $enviado->titulo;
        $descripcion = $enviado->descripcion;
        $id_empresa = $enviado->id_empresa;
        $id_grado = $enviado->id_grado;
        $id_profesor = $enviado->id_profesor;
        $puestos = $enviado->puestos;
        $oferta = new Oferta;
        $oferta->insert(['titulo' => $titulo, 'descripcion' => $descripcion, 'id_empresa' => $id_empresa, 'id_grado' => $id_grado, 'id_profesor' => $id_profesor, 'puestos-vacantes' => $puestos, 'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')]);

    }
    public function insertarProfe(Request $request)
    {
        if (isset($_REQUEST['nuevoProfe'])) {

            if (!$request->ajax()) {
                return redirect('/');
            }

            $enviado = json_decode($_REQUEST['nuevoProfe']);

            $nombre = $enviado->nombre;
            $apellido = $enviado->apellidos;
            $email = $enviado->email;
            $password = $this->randomPassword();
            $id_depar = $enviado->id_depar;
            $rango = 1;
            $user = new User;
            $profe = new Profe_Admin;
            $user->insert(['nombre' => $nombre, 'apellidos' => $apellido, 'email' => $email, 'password' => Hash::make($password), 'rango' => $rango, 'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')]);

            $id_user = User::max('id');
            $profe->insert(['id_depar' => $id_depar, 'id_user' => $id_user, 'created_at' => date('Y-m-d H:m:s'),
                'updated_at' => date('Y-m-d H:m:s')]);

            Mail::to($email)
                ->send(new contraseniaMail($password));
        }
    }

    public function insertarEmpresa(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        $enviado = json_decode($_REQUEST['nuevaEmpresa']);

        $nombre = $enviado->nombre;
        $direccion = $enviado->direccion;
        $email = $enviado->email;
        $url = $enviado->url;
        $telefono = $enviado->telefono;

        $empresa = new Empresa;
        $empresa->insert(['nombre' => $nombre, 'direccion' => $direccion, 'email' => $email, 'url' => $url, 'telefono' => $telefono, 'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')]);

    }
    public function updateUsuarios(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        if (isset($_REQUEST['actualizacionUsuarios'])) {

            $enviado = json_decode($_REQUEST['actualizacionUsuarios']);
            $iduser = $enviado->iduser;
            $nombre = $enviado->nombre;
            $apellidos = $enviado->apellidos;
            $email = $enviado->email;
            $anio = $enviado->anio;

            $actualizarUsuarios = User::findOrFail($iduser);
            $actualizarAlumno = Alumno::where('id_user', $iduser)->first();
            if ($nombre != "") {
                $actualizarUsuarios->update(['nombre' => $nombre]);
            }

            if ($apellidos != "") {
                $actualizarUsuarios->update(['apellido' => $apellidos]);
            }

            if ($email != "") {
                $actualizarUsuarios->update(['email' => $email]);
            }

            if ($anio != "") {
                $actualizarAlumno->update(['anio_fin' => $anio]);
            }

        } else {
        }

    }
    public function updateProfe(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        if (isset($_REQUEST['actualizacionProfe'])) {

            $enviado = json_decode($_REQUEST['actualizacionProfe']);

            $iduser = $enviado->iduser;
            $nombre = $enviado->nombre;
            $apellidos = $enviado->apellidos;
            $email = $enviado->email;
            $departamento = $enviado->departamento;

            $actualizarUser = User::findOrFail($iduser);
            $actualizarProfes = Profe_Admin::where('id_user', $iduser)->get();

            if ($nombre != "") {
                $actualizarUser->update(['nombre' => $nombre]);
            }

            if ($apellidos != "") {
                $actualizarUser->update(['apellidos' => $apellidos]);
            }
            foreach ($actualizarProfes as $actualizarProfe) {

                if ($departamento != "") {
                    $actualizarProfe->update(['id_depar' => $departamento]);
                }
            }

            if ($email != "") {
                $actualizarUser->update(['email' => $email]);
            }

        } else {
            $actualizarProfe = Profe_Admin::findOrFail($iduser);
        }

    }
    public function updateOferta(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        if (isset($_REQUEST['actualizarOferta'])) {

            $enviado = json_decode($_REQUEST['actualizarOferta']);

            $idoferta = $enviado->idoferta;
            $titulo = $enviado->titulo;
            $descripcion = $enviado->descripcion;
            $puestos = $enviado->puestos;

            $actualizarOferta = Oferta::findOrFail($idoferta);

            if ($titulo != "") {
                $actualizarOferta->update(['titulo' => $titulo]);
            }

            if ($descripcion != "") {
                $actualizarOferta->update(['descripcion' => $descripcion]);
            }

            if ($puestos != "") {
                $actualizarOferta->update(['puestos-vacantes' => $puestos]);
            }

        } else {
            $actualizarOferta = User::findOrFail($idoferta);
        }
    }

    public function updateEmpresa(Request $request)
    {

        if (isset($_REQUEST['actualizacionEmpresa'])) {

            $enviado = json_decode($_REQUEST['actualizacionEmpresa']);

            $nombre = $enviado->nombre;
            $idempresa = $enviado->idempresa;
            $direccion = $enviado->direccion;
            $email = $enviado->email;
            $url = $enviado->url;
            $telefono = $enviado->telefono;

            $actualizarEmpresa = Empresa::findOrFail($idempresa);
            if ($nombre != "") {
                $actualizarEmpresa->update(['nombre' => $nombre, 'updated_at' => date('Y-m-d H:m:s')]);
            }

            if ($direccion != "") {
                $actualizarEmpresa->update(['direccion' => $direccion, 'updated_at' => date('Y-m-d H:m:s')]);
            }

            if ($email != "") {
                $actualizarEmpresa->update(['email' => $email, 'updated_at' => date('Y-m-d H:m:s')]);
            }

            if ($url != "") {
                $actualizarEmpresa->update(['url' => $url, 'updated_at' => date('Y-m-d H:m:s')]);
            }
            if ($telefono != "") {
                $actualizarEmpresa->update(['telefono' => $telefono, 'updated_at' => date('Y-m-d H:m:s')]);
            }

        } else {
            $actualizarEmpresa = Empresa::findOrFail($idempresa)->delete();
        }

    }

    public function editEmpresa($id)
    {
        $empre = Empresa::where('id', $id)->first();
        return view('empresas.form_edit', ['empresa' => $empre]);
    }

/*---------------------------------------------------------ENVIAR MENSAJE-----------------------------------------------------------
-----------------------------------------------------------------------------------------------------------------------------------------*/

    public function respuestaEmail(Request $request)
    {
        if (!$request->ajax()) {
            return redirect('/');
        }

        if (isset($_REQUEST['respuestaMail'])) {
            $enviado = json_decode($_REQUEST['respuestaMail']);
            $idmail = $enviado->idMensaje;
            $data = $enviado->respuesta;

            $mail = Correo::where('id', $idmail)->first();
            $usuario = User::where('id', $mail['id_remit'])->first();

            Mail::to($usuario['email'])
                ->send(new respuestaMail($data));
        }

    }
}
