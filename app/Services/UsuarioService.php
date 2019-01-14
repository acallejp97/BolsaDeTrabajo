<?php namespace App\Services;

use App\User;

class UsuarioService {
    public function update( Usuario $usuario) {
        if ( !$usuario->save() ) {
            return 'error';
        }
        return $usuario;
    }

    public function create( Usuario $usuario) {
        if ( !$usuario->save() ) {
            return 'error';
        }
        return $usuario;
    }
    
    public function delete( Usuario $usuario) {
        if ( !$usuario->delete() ) {
            return 'error';
        }
        return 'ok';
    }
}