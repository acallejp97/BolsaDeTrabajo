<?php

Auth::routes();
// Route::get('/home', function () {return redirect('login');});
Route::get('/logout', 'HomeController@logout'); //->redirect('/');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        if (Auth::check()) {
            return redirect('/home');
        } else {
            return redirect('/login');
        }
    });

    switch (isset(Auth::user()->rango)) {
        case 0:
            Route::get('/home', 'AdminController@Ofertas');
            Route::get('/empresas', "AdminController@Empresas");
            Route::get('/anadirEmpresas', "AdminController@AnadirEmpresas");
            Route::get('/anadirUsuarios', "AdminController@AnadirUsuarios");
            Route::get('/usuarios', "AdminController@Usuarios");
            Route::get('/perfil', "AdminController@Perfil");
            Route::get('/cursos', "AdminController@Cursos");
            Route::get('/contacto', "AdminController@Contacto");
            Route::get('/buzon', "AdminController@Buzon");
            Route::get('/anadirProfesores', "AdminController@AnadirProfesor");
            Route::get('/import', 'ImportController@import');
            Route::post('/hola', "AdminController@destroy");
            break;

        case 1:
        
            Route::get('/home', 'Profe_AdminController@Ofertas');
            Route::get('/empresas', "Profe_AdminController@Empresas");
            Route::get('/anadirEmpresas', "Profe_AdminController@AnadirEmpresas");
            Route::get('/anadirUsuarios', "Profe_AdminController@AnadirUsuarios");
            Route::get('/usuarios', "Profe_AdminController@Usuarios");
            Route::get('/perfil', "Profe_AdminController@Perfil");
            Route::get('/cursos', "Profe_AdminController@Cursos");
            Route::get('/import', 'ImportController@import');
            Route::get('/contacto', "Profe_AdminController@Contacto");
            break;

        case 2:
            Route::get('/home', "AlumnoController@VerOfertas");
            Route::get('/contacto', "AlumnoController@Contacto");
            Route::get('/perfil', "AlumnoController@VerPerfil");
            Route::get('/actualizarCV', "AlumnoController@ActualizarCV");
            break;
    }
});
