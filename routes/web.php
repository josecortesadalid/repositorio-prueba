<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\FormularioController;

use App\Http\Controllers\Carrito;
use App\Http\Controllers\PortfolioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    echo "<a href='" . route('articulos') . "'>Articulos 1</a><br>";
    echo "<a href='" . route('articulos') . "'>Articulos 2</a><br>";
    echo "<a href='" . route('articulos') . "'>Articulos 3</a><br>";
});


Route::get('noticias', function () {

    return 'Hola desde la página del blog';
})->name('articulos');

// Route::get('contacto', function () {

//     $tipo = 'telefónico';
//     return view('contacto', compact('tipo'));
// });

Route::view('/contacto', 'contacto');


Route::get('seccion/{nombreSeccion?}', function ($nombreSeccion = 'No estás en ninguna sección') {

    return 'Estás en la sección: ' . $nombreSeccion;
});


// Route::get('/blog', '\App\Http\Controllers\BlogController')->name('blog');

Route::get('/blog', BlogController::class)->name('blog');

// Route::get('/tienda', [TiendaController::class, 'index'])->name('tienda');

Route::resource('/tienda', TiendaController::class)->except(['index', 'show']);

Route::apiResource('/carrito', Carrito::class);

// Route::get('/formulario', FormularioController::class);
Route::get('form', function () {

    return view('formulario');
});
Route::any('formulario', function () {

    return request('search');
});

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('projects.index');

Route::get('/portfolio/crear', [PortfolioController::class, 'create'])->name('projects.create')->middleware('auth');
Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('projects.store')->middleware('auth');

Route::get('/portfolio/{project}/editar', [PortfolioController::class, 'edit'])->name('projects.edit')->middleware('auth');
Route::patch('/portfolio/{project}', [PortfolioController::class, 'update'])->name('projects.update')->middleware('auth');

Route::delete('/portfolio/{project}', [PortfolioController::class, 'destroy'])->name('projects.destroy')->middleware('auth');

Route::get('/portfolio/{proyecto}', [PortfolioController::class, 'show'])->name('projects.show');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
