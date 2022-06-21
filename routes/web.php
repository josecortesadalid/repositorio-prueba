<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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


