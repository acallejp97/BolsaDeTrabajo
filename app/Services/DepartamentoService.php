<?php namespace App\Services;

use App\Model\Departamento;

class DepartamentoService {
    public function update( Departamento $departamento) {
        if ( !$departamento->save() ) {
            return 'error';
        }
        return $correo;
    }

    public function create( Departamento $departamento) {
        if ( !$departamento->save() ) {
            return 'error';
        }
        return $departamento;
    }
    
    public function delete( Departamento $departamento) {
        if ( !$departamento->delete() ) {
            return 'error';
        }
        return 'ok';
    }
}