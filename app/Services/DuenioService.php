<?php namespace App\Services;

use App\Duenio;

class DuenioService {
    public function update( Duenio $duenio) {
        if ( !$duenio->save() ) {
            return 'error';
        }
        return $duenio;
    }

    public function create( Duenio $duenio) {
        if ( !$duenio->save() ) {
            return 'error';
        }
        return $duenio;
    }
    
    public function delete( Duenio $duenio) {
        if ( !$duenio->delete() ) {
            return 'error';
        }
        return 'ok';
    }
}