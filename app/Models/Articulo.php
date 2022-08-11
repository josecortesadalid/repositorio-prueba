<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Presenters\ArticuloPresenter;

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

    public function ayuda()
    {
        return $this->morphOne(Ayuda::class, 'helpable'); // recibe como parámetro la llave/prefijo que utilizamos al crear la migración 
    }

    public function alerts()
    {
        return $this->morphToMany(Alert::class, 'alertable');
    }

    public function present()
    {
        return new ArticuloPresenter($this);
    }

}

