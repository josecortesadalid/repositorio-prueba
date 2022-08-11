<?php

namespace App\Listeners;

use App\Events\BoletinEnviado;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendaAutoresponder implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */


    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BoletinEnviado  $event
     * @return void
     */
    public function handle(BoletinEnviado $event) 
    // Método que se ejecuta automáticamente. Aquí definimos la lógica del autorespondedor 
    // Por parámetro recibe el evento al que está escuchando
    {
        $art = $event->art;
        Mail::send('emails.boletin', ['art'=> $art], function($a) use ($art){
        $a->to('jose.cortes@adalid.net', 'Jose')->subject('Tu mensaje fue recibido');
        });
    }
}
