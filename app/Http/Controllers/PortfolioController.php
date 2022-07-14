<?php

namespace App\Http\Controllers;

use App\Events\ProjectSaved;
use App\Http\Requests\SaveProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\Image;


// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

class PortfolioController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->except('index', 'show', 'create', 'store', 'edit', 'update', 'destroy'); 
    }

    public function index()
    {
        // $portfolio = DB::table('projects')->get();
        // $portfolio = Project::get();

        return view('portafolio', [
            'portfolio' => Project::with('category')->get()
        ]);
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
        $this->authorize('create-projects');

        return view('create', [
            'project' => new Project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function store(SaveProjectRequest $request)
    {
        $project = new Project( $request->validated() );
        $project->imagen = $request->file('imagen')->store('images');
        $project->save();

        ProjectSaved::dispatch($project);
        
        return redirect()->route('projects.index')->with('status', 'proyecto creado');
    }

    public function edit(Project $project)
    {
        return view('edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request)
    {
        if($request->hasFile('imagen')){

            Storage::delete($project->imagen );
            $project = $project->fill( $request->validated() ); 
            $project->imagen = $request->file('imagen')->store('images');
            $project->save();

            ProjectSaved::dispatch($project);

        }else{
            $project->update( array_filter($request->validated())); 
        }
        $proyecto = $project;
        return redirect()->route('projects.show', compact('proyecto'));
    }


    public function destroy(Project $project)
    {
        Storage::delete($project->imagen );
        $project->delete();
        return redirect()->route('projects.index');

    }

}
