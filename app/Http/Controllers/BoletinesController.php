<?php

namespace App\Http\Controllers;

use App\Mail\MensajeRecibido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BoletinesController extends Controller
{
    public function index()
    {
        return 'hola';
    }
    public function enviar_email()
    {
        Mail::to('jose.cortes@adalid.net')->queue(new MensajeRecibido);
        // return 'hola';
        return new MensajeRecibido;
    }
}
