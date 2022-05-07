<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VisitasMailable extends Mailable
{
    use Queueable, SerializesModels;

    // public $subject = "Notificación Visita Realizada";
    public $visita;
    public $visita_items;
    public $fecha_visita;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($visita,$visita_items,$fecha_visita)
    {
        $this->visita = $visita;
        $this->visita_items = $visita_items;
        $this->fecha_visita = $fecha_visita;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->view('admin.emails.visitaRealizada')
                    ->subject("Notificación Visita Realizada en ".$this->visita->pdv['nombre'] );
                    //->with($visita,$visita_items,$items); // Al estar publicos se leen en esa vista
    }
}
