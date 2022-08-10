<?php 

namespace App\Repositories;

use Illuminate\Support\Facades\Cache;

class CachePortadas{

    protected $portadas;

    public function __construct(Articulos $portadas)
    {
        $this->portadas = $portadas;
    }

    public function getPaginated()
    {
        Cache::flush();
        if(Cache::has('portadas')){
            return Cache::get('portadas');
        }else{

            // $portadas = Portada::paginate(5);
            $portadas = $this->portadas->getPaginated();
            Cache::put('key', $portadas, 600);
            return $portadas;
            // return $portadas;
        }      
    }

    public function store($request)
    {
        $art = $this->portadas->store($request);
        Cache::flush(); 
        return $art;
    }

    public function findById($id)
    {
            
    }

    public function update($request, $id)
    {
            
    }

    public function destroy($id)
    {
            
    }

}


?>