<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


use Laravel\Dusk\Chrome;


class CArticleTest extends DuskTestCase
{

    use DatabaseMigrations, DatabaseTransactions;
    // databasetransactions cierra en transaccioens la interacción con la db. Mejora un poco la velocidad al ejecutar el test

    public function testExample()
    {

        $this->withoutEvents(); 
        // Podemos habilitar o deshabilitar los eventos
        // Si no necesitamos los eventos, al poner esto de deshabilitarán y los test se ejecutarán con mucha más velocidad

        // Given. Un usuario registrado

        $user = User::factory()->create();

        $this->actingAs($user);  // verificar que el usuario se ha autenticado


        // When
        $this->browse(function (Tests\Browser\Browser $browser) {
            $browser
            ->visit('/cms/crear')
            ->type('titular', 'titular de test')
            ->type('entradilla', 'entradilla de test')
            ->type('cuerpo', 'cuerpo de test')
            ->type('imagen', 'imagen de test')
            ->type('titular_url', 'titular_url_de_test')
            ->type('Guardar')
            ;

            // Then. El mensaje debe estar en la db

            $this->seeInDatabase('articulos', [
                'titular' => 'titular de test', 
                'entradilla' => 'entradilla de test', 
                'cuerpo' => 'cuerpo de test', 
                'imagen' => 'imagen de test', 
                'titular_url' => 'titular_url_de_test', 
            ])





        });
    }
}
