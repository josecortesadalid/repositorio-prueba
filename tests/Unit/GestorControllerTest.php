<?php

namespace Tests\Feature;

use App\Http\Controllers\GestorController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class GestorControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    // public function tearDown()
    // {
    //     Mockery::close();
    // }

    public function testIndex()
    {
        $articulosRepo = Mockery::mock('App\Repositories\CachePortadas');
        $controller = new GestorController($articulosRepo);

        $articulosRepo->shouldReceive('getPaginated')->once(); // estamos esperando que llame a este método una vez

        $controller->index(); // vamos al index del controlador


    }
}
