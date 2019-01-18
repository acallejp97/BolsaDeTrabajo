<?php namespace App\Services;

use App\Model\Empresa;

class EmpresaService {
    public function update( Empresa $empresa) {
        if ( !$empresa->save() ) {
            return 'error';
        }
        return $empresa;
    }

    public function create( Empresa $empresa) {
        if ( !$empresa->save() ) {
            return 'error';
        }
        return $empresa;
    }
    
    public function delete( Empresa $empresa) {
        if ( !$empresa->delete() ) {
            return 'error';
        }
        return 'ok';
    }
}