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
        switch (isset(Auth::user()->rango)) {
            case 0:
                Route::get('/buzon', "Profe_AdminController@Buzon");
                Route::get('/anadirProfesores', "Profe_AdminController@AnadirProfesor");
                Route::post('/actualizarUsuario', 'Profe_AdminController@updateUser');
                Route::get('/import', 'ImportController@import');
 
            case 1:
                Route::get('/home', 'Profe_AdminController@Ofertas');
                Route::get('/empresas', "Profe_AdminController@Empresas");
                Route::get('/anadirEmpresas', "Profe_AdminController@AnadirEmpresas");
                Route::get('/anadirUsuarios', "Profe_AdminController@AnadirUsuarios");
                Route::get('/usuarios', "Profe_AdminController@Usuarios");
                Route::get('/perfil', "Profe_AdminController@Perfil");
                Route::get('/cursos', "Profe_AdminController@Cursos");
                Route::get('/contacto', "Profe_AdminController@Contacto");
                Route::get('/import', 'ImportController@import');
               Route::get("/profe_admin/{id}/departamento", function ($id){
                   $profesores=Profe_Admin::find($id);
                   foreach($profesores->departamentos as $departamento){
return $departamento->nombre;
                   }
               });  
                break;

            case 2:
                Route::get('/home', "AlumnoController@VerOfertas");
                Route::get('/contacto', "AlumnoController@Contacto");
                Route::get('/perfil', "AlumnoController@VerPerfil");
                Route::get('/actualizarCV', "AlumnoController@ActualizarCV");
                break;
    }
});
