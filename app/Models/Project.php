<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'titular_url', 'tecnologias'];

    public function getRouteKeyName()
{
    return 'titular_url';
}

}
