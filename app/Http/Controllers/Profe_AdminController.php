<?php
namespace App\Http\Controllers;

use App\Model\Alumno;
use App\Model\Correo;
use App\Model\Curriculum;
use App\Model\Departamento;
use App\Model\Empresa;
use App\Model\Grado;
use App\Model\Oferta;
use App\Model\Profe_Admin;
use App\User;
use Excel;
use File;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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

    public function AnadirUsuarios()
    {
        return view("profes_admin/anadirusuarios");
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
                        $insertUser[] = [
                            'email' => $value->email,
                            'nombre' => $value->nombre,
                            'rango' => 2,
                            'apellidos' => $value->apellidos,
                            'password' => Hash::make('prueba'),
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
                        $siguienteId++;
                    }

                    if (!empty($insertUser)) {
                        $insertData = User::insert($insertUser);
                        $insertAlumnos = Alumno::insert($insertAlumno);
                        $insertCurriculum = Curriculum::insert($insertCurriculum);
                        if ($insertData) {
                            Session::flash('success', 'Your Data has successfully imported');
                        } else {
                            Session::flash('error', 'Error inserting the data..');
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

        $user = User::where('rango', 2)->get();
        $alumno = Alumno::all();
        $alumnosuser = array('user' => $user, 'alumno' => $alumno);
        if (!$alumnosuser) {
            return view("profes_admin/usuarios");
        }
        return view("profes_admin/usuarios")->with('alumnosuser', $alumnosuser);

    }

    //******* */FUNCIONES DE ADMIN********************
    public function Profesores()
    {

        $profesor = Profe_Admin::all();
        $user = User::all();

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
            Grado::where('id', $id)->delete();;

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
        if (!$request->ajax()) {
            return redirect('/');
        }

        $enviado = json_decode($_REQUEST['nuevoProfe']);

        $nombre = $enviado->nombre;
        $apellido = $enviado->apellido;
        $email = $enviado->email;
        $password = $enviado->password;
        $id_depar = $enviado->id_depar;
        $rango = $enviado->rango;
        $user = new User;
        $profe = new Profe_Admin;
        $user->insert(['nombre' => $nombre, 'apellido' => $apellido, 'email' => $email, 'password' => $password, 'rango' => $rango, 'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')]);
        $id_user = $enviado->id_user::select('id')->last();
        $profe->insert(['id_depar' => $id_depar, 'id_user' => $id_user, 'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')]);

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
            $actualizarAlumno = Alumno::where('id_user',$iduser)->first();
            if ($nombre != "") {
                $actualizarUsuarios->update(['nombre' => $nombre]);
            }

            if ($apellidos != "") {
                $actualizarUsuarios->update(['apellido' => $apellidos]);
            }

            if ($email != "") {
                $actualizarUsuarios->update(['email' => $email]);
            }

            if ($anio!= "") {
                $actualizarAlumno->update(['anio_fin' => $anio]);
            }

        } else {
            $actualizarUsuarios = User::findOrFail(Auth::user()->id)->delete();
        }

    }
    public function updateProfe(Request $request){
        if (!$request->ajax()) {
            return redirect('/');
        }
        

        if (isset($_REQUEST['actualizacionProfe'])) {

            $enviado = json_decode($_REQUEST['actualizacionProfe']);

            $idprofe = $enviado->idprofe;
            $nombre = $enviado->nombre;
            $apellidos = $enviado->apellidos;
            $departamentos = $enviado->departamentos;
            $email = $enviado->email;
            

            
            $actualizarUser = User::findOrFail($idprofe);
            $actualizarProfe = Profe_Admin::where('id_user',$idprofe)->first();
            if ($nombre != "") {
                $actualizarUser->update(['nombre' => $nombre]);
            }

            if ($apellidos != "") {
                $actualizarUser->update(['apellidos' => $apellidos]);
            }

            if ($departamentos != "") {
                $actualizarProfe->update(['id_depar' => $departamentos]);
            }
            if ($email != "") {
                $actualizarUser->update(['email' => $email]);
            }

           

        } else {
            $actualizarProfe = Profe_Admin::findOrFail($idprofe);
        }

    }
    public function updateOferta(Request $request){
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
            $idempresa= $enviado->idempresa;
            $direccion = $enviado->direccion;
            $email = $enviado->email;
            $url = $enviado->url;
            $telefono = $enviado->telefono;

            $actualizarEmpresa = Empresa::findOrFail($idempresa);
            if ($nombre != "") {
                $actualizarEmpresa->update(['nombre' => $nombre]);
            }

            if ($direccion != "") {
                $actualizarEmpresa->update(['direccion' => $direccion]);
            }

            if ($email != "") {
                $actualizarEmpresa->update(['email' => $email]);
            }

            if ($url != "") {
                $actualizarEmpresa->update(['url' => $url]);
            }
            if ($telefono != "") {
                $actualizarEmpresa->update(['telefono' => $telefono]);
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
}
