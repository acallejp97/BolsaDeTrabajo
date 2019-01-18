<?php namespace App\Services;

use App\Model\Alumno;

class AlumnoService {
    public function update( Alumno $alumno) {
        if ( !$alumno->save() ) {
            return 'error';
        }
        return $alumno;
    }

    public function create( Alumno $alumno) {
        if ( !$alumno->save() ) {
            return 'error';
        }
        return $alumno;
    }
    
    public function delete( Alumno $alumno) {
        if ( !$alumno->delete() ) {
            return 'error';
        }
        return 'ok';
    }
}