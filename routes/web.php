<?php
Auth::routes();
Route::get('/logout', 'HomeController@logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        if (Auth::check()) {
            return redirect('/home');
        } else {
            return redirect('/login');
        }
    });
   
//IDIOMA CAMBIOS
    Route::get('lang/{lang}', function($lang) {
        \Session::put('lang', $lang);
        return \Redirect::back();
      })->middleware('web')->name('change_lang');
    
//Comunes
    Route::get('/home', "Controller@Ofertas")->name('home');
    Route::get('/contacto', "Controller@Contacto")->name('contacto');
    Route::get('/perfil', "Controller@Perfil")->name('perfil');
    Route::post('/actualizarUsuario', 'Controller@updateUser')->name('actualizarUsuario');
    Route::post('/fotoperfil', 'Controller@updateProfile')->name('fotoPerfil');
    Route::post('/insertar', 'Controller@insertar')->name('insertar');
    Route::post('/enviarCorreo', 'Controller@enviar')->name('enviarCorreo');

    //Admin
    Route::get('/buzon', "Profe_AdminController@Buzon")->name('buzon');
    Route::get('/profesores', "Profe_AdminController@Profesores")->name('profesores');
    Route::post('/insertarProfesores', "Profe_AdminController@insertarProfe")->name('insertarProfe');
    Route::post('/respuestaEmail', "Profe_AdminController@respuestaEmail")->name('respuestaEmail');
    
    //Profe y admin
    Route::post('/actualizarUsuarios', 'Profe_AdminController@updateUsuarios')->name('actualizarUsuarios');
    Route::get('/empresas', "Profe_AdminController@Empresas")->name('empresas');
    Route::get('/altaUsuarios', "Profe_AdminController@altaUsuarios")->name('altaUsuarios');
    Route::get('/usuarios', "Profe_AdminController@Usuarios")->name('usuarios');
    Route::get('/cursos', "Profe_AdminController@Cursos")->name('cursos');

    Route::post('/abrirMensaje', 'Profe_AdminController@abrirMensaje')->name('abrirMensaje');
    Route::post('/actualizarProfe', 'Profe_AdminController@updateProfe')->name('actualizarProfe');
    Route::post('/actualizarOferta', 'Profe_AdminController@updateOferta')->name('actualizarOferta');
    Route::post('/actualizarEmpresa', 'Profe_AdminController@updateEmpresa')->name('actualizarEmpresa');
    Route::post('/anadirDepartamento', 'Profe_AdminController@insertDepartamento')->name('anadirDepartamento');
    Route::post('/anadirUsuario', 'Profe_AdminController@insertUser')->name('anadirUsuario');
    Route::post('/anadirGrado', 'Profe_AdminController@insertGrado')->name('anadirGrado');
    Route::post('/anadirOferta', 'Profe_AdminController@insertarOferta')->name('insertarOferta');
    Route::post('/anadirEmpresas', 'Profe_AdminController@insertarEmpresa')->name('insertEmpresa');
    Route::post('/borrarGrado', 'Profe_AdminController@deleteGrado')->name('borrarGrado');
    Route::post('/borrarEmpresa', 'Profe_AdminController@deleteEmpresa')->name('borrarEmpresa');
    Route::post('/borrarOferta', 'Profe_AdminController@deleteOferta')->name('borrarOferta');
    Route::post('/borrarProfesor', 'Profe_AdminController@deleteProfesor')->name('borrarProfesor ');
    Route::post('/borrarUsuario', 'Profe_AdminController@deleteUsuario')->name('borrarUsuario');
    Route::post('/borrarDepartamento', 'Profe_AdminController@deleteDepartamento')->name('borrarDepartamento');
    Route::post('/borrarCorreo', 'Profe_AdminController@deleteMensaje')->name('borrarCorreo');
    Route::post('/subiendoCSV', 'Profe_AdminController@csv')->name('subiendoCSV');

    

    //Alumno
    Route::get('/actualizarCV', "AlumnoController@ActualizarCV")->name('actualizarCV');
    Route::post('/actualizandoCV', "AlumnoController@updateCV")->name('actualizandoCV');
    Route::post('/fotocv', 'AlumnoController@fotocv')->name('fotocv');
    Route::post('/inscribirse', 'AlumnoController@inscribirse')->name('inscribirse');


});
