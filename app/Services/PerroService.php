<?php namespace App\Services;

use App\Perro;

class PerroService {
    public function update( Perro $perro) {
        if ( !$perro->save() ) {
            return 'error';
        }
        return $perro;
    }

    public function create( Perro $perro) {
        if ( !$perro->save() ) {
            return 'error';
        }
        return $perro;
    }
    
    public function delete( Perro $perro) {
        if ( !$perro->delete() ) {
            return 'error';
        }
        return 'ok';
    }
}