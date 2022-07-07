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

    public function category()  // $project->category
{
    return $this->belongsTo(Category::class);
    // Debido a que el modelo se llama category y estamos referenciando el id, Laravel usa por defecto el 'category_id'
    // Podríamos escribir esto $this->belongsTo(Category::class, 'category_id');
    // Pero no es necesario
}

}
