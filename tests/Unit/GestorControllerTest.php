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
        $view = Mockery::mock('Illuminate\View\Factory');
        $controller = new GestorController($articulosRepo, $view);

        $articulosRepo->shouldReceive('getPaginated')
        ->once()
        ->andReturn('paginated_portadas'); // estamos esperando que llame a este método una vez

        $view->shouldReceive('make')
        ->with('cms.portada', ['portadas' => 'paginated_portadas'])
        ->once();

        $controller->index(); // vamos al index del controlador


    }
}
