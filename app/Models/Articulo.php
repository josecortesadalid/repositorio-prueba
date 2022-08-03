<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Articulo extends Model
{
    use HasFactory;

    protected $fillable = ['titular', 'entradilla', 'cuerpo', 'imagen', 'titular_url'];

    public function getRouteKeyName()
    {
        return 'titular_url';
    }

    public function user()
    {
        return $this->belongsTo(User::class); // el artículo pertenece a un usuario
    }
}

