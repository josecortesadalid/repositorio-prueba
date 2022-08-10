<?php

namespace App\Providers;

use App\Repositories\Articulos;
use App\Repositories\ArticulosInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::resourceVerbs([
            'create' => 'crear',
            'edit' => 'editar'
        ]);

        Paginator::useBootstrap();

        $this->app->bind(ArticulosInterface::class, Articulos::class);
    }
}
