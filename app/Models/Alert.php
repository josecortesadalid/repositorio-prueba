<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function articulos()
    {
        return $this->morphedByMany(Articulo::class, 'alertable');
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'alertable');
    }
}
