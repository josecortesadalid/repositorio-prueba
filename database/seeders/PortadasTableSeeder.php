<?php

namespace Database\Seeders;

use App\Models\Portada;
use Illuminate\Database\Seeder;

class PortadasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Portada::truncate(); // Esto es para vaciar la tabla

        for($i=1; $i < 11; $i++){


            Portada::create([
                'nombre_portada' =>"portada{$i}", 
                'posicion1' => "1",
                'posicion2' => "2",
                'posicion3' => "1",
                'posicion4' => "2",
            
            ]);

        }

    }
}
