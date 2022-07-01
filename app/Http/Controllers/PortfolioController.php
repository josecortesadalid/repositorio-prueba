<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->except('index', 'show', 'create', 'store', 'edit', 'update', 'destroy'); 
    }

    public function index()
    {
        // $portfolio = DB::table('projects')->get();
        $portfolio = Project::get();

        return view('portafolio',compact('portfolio'));
    }

    public function show(Project $proyecto)
    {
        // $proyecto = Project::findOrFail($titular_url);
        return view('show',compact('proyecto'));

        // return view('portafolio.show', [
        //     'portfolio' => Project::findOrFail($id)
        // ]);
    }

    public function create()
    {
        return view('create', [
            'project' => new Project 
        ]);
    }

    public function store(SaveProjectRequest $request)
    {
        // request()->save();
        // $nombre = request('nombre');
        // $descripcion = request('descripcion');
        // $titular_url = request('titular_url');
        // $tecnologias = request('tecnologias');

        // Project::create([
        //     'nombre' => $nombre,
        //     'descripcion' => $descripcion, 
        //     'titular_url' => $titular_url,
        //     'tecnologias' => $tecnologias
        // ]);

        

        // $fields = request()->validate([
        //     'nombre' => 'required',
        //     'descripcion' => 'required',
        //     'titular_url' => 'required',
        //     'tecnologias' => 'required',

        // ]);

        // Project::create( request()->only('nombre', 'descripcion', 'titular_url', 'tecnologias') );
        // Con only no tendríamos ningún problema de asignación masiva


        // Project::create($fields);

        $project = new Project( $request->validated() );
        $project->imagen = $request->file('imagen')->store('images');
        $project->save();


        // Project::create( $request->validated() );
        // $project->image = $request

        //---------------
        // $fields = $request->validated();
        // Project::create($fields);
        return redirect()->route('projects.index')->with('status', 'proyecto creado');
        // return back()->with('status', 'El proyecto ha sido creado');
//----------------
 
        // Project::create(request()->all());

        // return redirect()->route('projects.index');

        // return request('nombre');
    }

    public function edit(Project $project)
    {
        return view('edit', compact('project'));
    }

    public function update(Project $project, SaveProjectRequest $request)
    {
        if($request->hasFile('imagen')){

            Storage::delete($project->imagen );

            $project = $project->fill( $request->validated() ); 
            //no queremos un nuevo proyecto, queremos utilizar el que estamos editando
            // fill rellena todos los campos sin guardarlos en la db
            $project->imagen = $request->file('imagen')->store('images');
            $project->save();
            // return redirect()->route('projects.index')->with('status', 'proyecto creado');
        }else{
            $project->update( array_filter($request->validated())); 
        }
        // SaveProjectRequest $request

        $proyecto = $project;
        return redirect()->route('projects.show', compact('proyecto'));

        // return request('nombre');
    }


    public function destroy(Project $project)
    {
        Storage::delete($project->imagen );
        // Project::Destroy($id) // Manera de hacerlo con el id
        $project->delete();
        return redirect()->route('projects.index');

    }

}
