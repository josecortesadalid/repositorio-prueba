<?php

namespace Tests\Feature;

use App\Http\Controllers\GestorController;
use App\Http\Requests\SaveArticleRequest;
use App\Models\Articulo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Redirector;
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

    public function comun()
    {
        $this->articulo = new Articulo; 
        $this->articulosRepo = Mockery::mock('App\Repositories\CachePortadas');
        $this->view = Mockery::mock('Illuminate\View\Factory');
        $this->redirect = Mockery::mock('Illuminate\Routing\Redirector');
        $this->controller = new GestorController($this->articulosRepo, $this->view, $this->redirect, $this->articulo);
    }

    public function testIndex()
    {

        $this->comun();

        $this->articulosRepo->shouldReceive('getPaginated')
        ->once()
        ->andReturn('paginated_portadas'); // estamos esperando que llame a este método una vez

        $this->view->shouldReceive('make')
        ->with('cms.portada', ['portadas' => 'paginated_portadas'])
        ->once();

        $this->controller->index(); // vamos al index del controlador
    }

    public function testCreate()
    {
        $this->comun();

        $this->view->shouldReceive('make')
        ->with('cms.create', ['articulo' => new Articulo])
        ->once();

        $this->controller->create(); // vamos al create del controlador
    }

    public function testStore()
    {
        $this->comun(); 

        $request =  new SaveArticleRequest;

        $this->redirect
        ->shouldReceive('route')
        ->once()
        ->with('cms.create');  // Esto sería para probar la redirección

   

        $this->controller->store($request);
    }

    public function testShow()
    {
        $this->comun(); 
        $id = 1;
        // $this->articulo->shouldReceive('findById')->once()->with($id);

        // $this->controller->show($id);
    }
}
