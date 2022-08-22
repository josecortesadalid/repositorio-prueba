<?php

namespace Tests\Feature\functional;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\DuskTestCase;
use Tests\TestCase;

class CreateArticleTest extends DuskTestCase
{
    //agregamos la anotación para no tener que anteponer la palabra test
/** @test */
    public function login_to_create_articles()
    {
        // $this->visit('cms/crear');
        $this->browse(function ($browser){
            $browser->visit('/cms');
            $browser->type('titular del test', 'titular');
            // $browser->type('entradilla', 'entradilla del test');
            // $browser->type('cuerpo', 'cuerpo del test');
            // $browser->type('imagen', 'la imagen');
            // $browser->type('titular_url', 'la url');
        });

    }
}
