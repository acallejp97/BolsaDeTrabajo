<?php namespace App\Services;

use App\Model\Grado;

class GradoService {
    public function update( Grado $grado) {
        if ( !$grado->save() ) {
            return 'error';
        }
        return $grado;
    }

    public function create( Grado $grado) {
        if ( !$grado->save() ) {
            return 'error';
        }
        return $grado;
    }
    
    public function delete( Grado $grado) {
        if ( !$grado->delete() ) {
            return 'error';
        }
        return 'ok';
    }
}