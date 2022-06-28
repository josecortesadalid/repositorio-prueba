<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = ['titular', 'entradilla', 'cuerpo', 'titular_url'];

    public function getRouteKeyName()
    {
        return 'titular_url';
    }
}
