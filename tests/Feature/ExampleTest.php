<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_can_see_all_the_projects()
    {

    $project = Project::factory()->make();
    dd($project->titular_url);
    $user = User::factory()->times(3)->make([
        'nombre' => 'Nombre de prueba',
    ]);

    $response = $this->get(route('projects.index')); 
    $response->assertStatus(200); 
    $response->assertViewIs('portafolio'); 
    $response->assertViewHas('portfolio'); 
    $response->assertSee($project->nombre); 

}
    
}
