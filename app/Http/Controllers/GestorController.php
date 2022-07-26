<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveArticleRequest;
use App\Mail\MensajeRecibido;
use App\Models\Articulo;
use App\Models\Portada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class GestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $portada = Portada::where('nombre_portada', 'portada1')->first();
        $portada = DB::table('portadas')->where('nombre_portada', 'portada1')->first();

        $posicion1 = $portada->posicion1;
        $posicion2 = $portada->posicion2;
        $posicion3 = $portada->posicion3;
        $posicion4 = $portada->posicion4;

        $articulo1 = Articulo::find($posicion1);
        $articulo2 = Articulo::find($posicion2);
        $articulo3 = Articulo::find($posicion3);
        $articulo4 = Articulo::find($posicion4);

        $articulos = [];

        array_push($articulos, $articulo1, $articulo2, $articulo3, $articulo4);
        // $articulos = Articulo::get();

        return view('cms.portada', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('cms.create', [
            'articulo' => new Articulo 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveArticleRequest $request)
    {

        
        $fields = $request->validated();

        // $fields->imagen = base64_encode(file_get_contents($request->file('image')->pat‌​h()));
        // return $fields->imagen;

        $articulo = Articulo::create($fields);
        $articulo->imagen = $request->file('imagen')->store('images');
        $articulo->save();
        return back()->with('status', 'El articulo ha sido creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
