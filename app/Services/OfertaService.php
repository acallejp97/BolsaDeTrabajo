<?php namespace App\Services;

use App\Model\Oferta;

class OfertaService {
    public function update( Oferta $oferta) {
        if ( !$oferta->save() ) {
            return 'error';
        }
        return $oferta;
    }

    public function create( Oferta $oferta) {
        if ( !$oferta->save() ) {
            return 'error';
        }
        return $oferta;
    }
    
    public function delete( Oferta $oferta) {
        if ( !$oferta->delete() ) {
            return 'error';
        }
        return 'ok';
    }
}