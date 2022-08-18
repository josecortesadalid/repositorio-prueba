<?php

namespace App\Http\Controllers;

use App\Events\BoletinEnviado;
use App\Events\MessageWasReceived;
use App\Http\Requests\SaveArticleRequest;
use App\Mail\MensajeRecibido;
use App\Models\Articulo;
use App\Models\User;
use App\Models\Portada;
use App\Repositories\Articulos;
use App\Repositories\CachePortadas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class GestorController extends Controller
{
    protected $articulo;
    protected $portadas;
    protected $view;

    public function __construct(CachePortadas $portadas, \Illuminate\Contracts\View\Factory $view, \Illuminate\Routing\Redirector $redirect, Articulo $articulo)
    {
    $this->portadas = $portadas;
    $this->view = $view;
    $this->redirect = $redirect;
    $this->articulo = $articulo;
       $this->middleware('auth')->only('create', 'store', 'edit', 'update', 'destroy'); 
    }

    public function index()
    {
        $portadas = $this->portadas->getPaginated();
        $articulo1 = Articulo::find(1);

        // return view('cms.portada', compact('portadas', 'articulo1'));
        return $this->view->make('cms.portada', ['portadas' => $portadas]);

        // $portada = Portada::where('nombre_portada', 'portada1')->first();
        // $portada = DB::table('portadas')->where('nombre_portada', 'portada1')->first();

        // $posicion1 = $portada->posicion1;
        // $posicion2 = $portada->posicion2;
        // $posicion3 = $portada->posicion3;
        // $posicion4 = $portada->posicion4;

        // $key = "portadas.page." . request('page', 1);

        // $portadas = Portada::paginate(5);

        // $portadas = Cache::tags('portadas')->rememberForever($key, function()  // remember verifica si key existe. Si no existe, almacena lo que devuelve la función
        // {
        //     return Portada::paginate(5);
        // });

        // Cache::flush(); 
        // // Replicamos el funcionamiento que mostraba el esquema




        // $articulo1 = DB::table('articulos')->find($posicion1);
        // $articulo2 = DB::table('articulos')->find($posicion2);
        // $articulo3 = DB::table('articulos')->find($posicion3);
        // $articulo4 = DB::table('articulos')->find($posicion4);

        // $articulos = [];

        // array_push($articulos, $articulo1, $articulo2);
        // , $articulo3, $articulo4
        // $articulos = Articulo::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $art = 'art';
        event(new BoletinEnviado($art));
    //    return view('cms.create', [
    //         'articulo' => new Articulo 
    //     ]);

    return $this->view->make('cms.create', [
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
        // $fields = $request->validated();

        // $art = $this->portadas->store($fields);

        

        // event(new BoletinEnviado($art));


        // $fields->imagen = base64_encode(file_get_contents($request->file('image')->pat‌​h()));
        // return $fields->imagen;

        // $articulo = Articulo::create($fields);
        // $articulo->imagen = $request->file('imagen')->store('images');

        // return $this->redirect->route('cms-create'); Esto serviría para testear la reidrección

        // return back()->with('status', 'El articulo ha sido creado y se ha enviado a la cuenta de correo');
        return $this->redirect->route('cms.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $articulo = Articulo::find($id);
        $articulo = Articulo::findOrFail($id);
        // $articulo = $this->articulo->findById($id);

        return $articulo;
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
        Articulo::findOrFail($id)->delete();

        return Articulo::all();
    }


}
