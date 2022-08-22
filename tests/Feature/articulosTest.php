<?php

namespace Tests\Feature;

use App\Models\Portada;
use App\Repositories\Articulos;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class articulosTest extends TestCase
{

    use DatabaseMigrations; // hace las migraciones antes de cada test y al final de estas hace un rollback de las mismas

    /**
     * A basic feature test example.
     *
     * @return void
     * 
     */

     public function comun()
     {
        $this->repo = new Articulos();
     }

    /** @test */
    public function returns_paginated_front_pages()
    {
        $this->comun();
        // Given - Teniendo más de 5 portadas
        // factory(Portada::class, 7)->create();
        // $portada = Portada::factory()->times(7);
        $portada = Portada::factory()->times(7)->make([
            'nombre' => 'Nombre de prueba para test',
        ]);

        // When - Cuando ejecutamos el método getPaginated
        $result = $this->repo->getPaginated();

        // Then - Entonces, debemos obtener 5 portadas solamente
        $this->assertCount(5, $result);
    }
}
