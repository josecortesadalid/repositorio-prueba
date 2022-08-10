<?php

namespace App\Repositories;

use App\Models\Portada;
use Illuminate\Support\Facades\Cache;

class Articulos implements ArticulosInterface{

    public function getPaginated()
    {
        Cache::flush();
        if(Cache::has('portadas')){
            return Cache::get('portadas');
        }else{
            $portadas = Portada::paginate(5);
            Cache::put('key', $portadas, 600);
            return $portadas;
        }
    }

    public function store($fields)
    {
        if(auth()->check())
        {
            return $art = auth()->user()->articulos()->create($fields);

        }
    }
}