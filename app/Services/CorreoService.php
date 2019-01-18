<?php namespace App\Services;

use App\Model\Correo;

class CorreoService {
    public function update( Correo $correo) {
        if ( !$correo->save() ) {
            return 'error';
        }
        return $correo;
    }

    public function create( Correo $correo) {
        if ( !$correo->save() ) {
            return 'error';
        }
        return $correo;
    }
    
    public function delete( Correo $correo) {
        if ( !$correo->delete() ) {
            return 'error';
        }
        return 'ok';
    }
}