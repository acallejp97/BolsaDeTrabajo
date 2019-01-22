<?php namespace App\Services;

use App\Model\Curriculum;

class CurriculumService {
    public function update( Curriculum $curriculum) {
        if ( !$curriculum->save() ) {
            return 'error';
        }
        return $correo;
    }

    public function create( Curriculum $curriculum) {
        if ( !$curriculum->save() ) {
            return 'error';
        }
        return $curriculum;
    }
    
    public function delete( Curriculum $curriculum) {
        if ( !$curriculum->delete() ) {
            return 'error';
        }
        return 'ok';
    }
}