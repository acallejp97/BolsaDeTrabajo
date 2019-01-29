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
    Route::get('/insertarProfesores', "Profe_AdminController@insertarProfe")->name('insertarProfe');
    Route::get('/responder', "Profe_AdminController@respondercorreo")->name('responder');
    
    //Profe y admin
    Route::get('/empresas', "Profe_AdminController@Empresas")->name('empresas');
    Route::get('/anadirUsuarios', "Profe_AdminController@AnadirUsuarios")->name('anadirUsuarios');
    Route::get('/usuarios', "Profe_AdminController@Usuarios")->name('usuarios');
    Route::get('/cursos', "Profe_AdminController@Cursos")->name('cursos');
    Route::post('/anadirDepartamento', 'Profe_AdminController@insertDepartamento')->name('anadirDepartamento');
    Route::post('/anadirGrado', 'Profe_AdminController@insertGrado')->name('anadirGrado');
    Route::post('/subiendoCSV', 'Profe_AdminController@csv')->name('subiendoCSV');
    Route::post('/anadirOferta', 'Profe_AdminController@insertarOferta')->name('insertarOferta');
    Route::post('/anadirEmpresas', 'Profe_AdminController@insertarEmpresa')->name('insertEmpresa');
    Route::post('/borrarGrado', 'Profe_AdminController@deleteGrado')->name('borrarGrado');
    Route::post('/deleteMensaje', 'Profe_AdminController@deleteMensaje')->name('deleteMensaje');
    Route::post('/abrirMensaje', 'Profe_AdminController@abrirMensaje')->name('abrirMensaje');
    Route::post('/contacto', 'Profe_AdminController@contacto')->name('contacto');
    Route::post('/borrarEmpresa', 'Profe_AdminController@deleteEmpresa')->name('borrarEmpresa');
    Route::post('/borrarOferta', 'Profe_AdminController@deleteOferta')->name('borrarOferta');
    Route::post('/borrarProfesor', 'Profe_AdminController@deleteProfesor')->name('borrarProfesor ');
    

    //Alumno
    Route::get('/actualizarCV', "AlumnoController@ActualizarCV")->name('actualizarCV');
    Route::post('/fotocv', 'AlumnoController@updatecv')->name('fotocv');


//prueba para modificar
    // Route::get ( 'empresas/{{$empre->id}}', 'Profe_AdminController@editEmpresa' );
  
});

