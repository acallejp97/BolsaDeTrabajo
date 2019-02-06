<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class inscripcion extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('g1bolsadetrabajo@gmail.com', 'Bolsa de Trabajo FP Txurdinaga')
            ->subject('Respuesta oferta Bolsa de Trabajo')
            ->view('alumnos/inscripcion');
    }
}
