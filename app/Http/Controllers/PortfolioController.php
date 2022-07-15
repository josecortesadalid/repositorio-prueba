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

        // return Project::onlyTrashed()->with('category')->latest()->paginate();

        return view('portafolio', [
            'newProject' => new Project, 
            'portfolio' => Project::with('category')->get(),
            'deletedProjects' => Project::onlyTrashed()->get()
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
        $this->authorize('create', new Project);

        return view('create', [
            'project' => new Project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function store(SaveProjectRequest $request)
    {


        $project = new Project( $request->validated() );

        $this->authorize('create', $project);

        $project->imagen = $request->file('imagen')->store('images');
        $project->save();

        ProjectSaved::dispatch($project);
        
        return redirect()->route('projects.index')->with('status', 'proyecto creado');
    }

    public function edit(Project $project)
    {

        $this->authorize('update', $project);

        return view('edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request)
    {
        $this->authorize('update', $project);

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
        $this->authorize('delete', $project);
        // Storage::delete($project->imagen ); eliminamos el borrar imagen debido a la posibilidad de que el cliente quiera restaurar el proyecto. La ponemos en el forceDelete
        $project->delete();
        return redirect()->route('projects.index');

    }
    
    public function restore($projectUrl)
    {
        $project = Project::withTrashed()->wheretitular_url($projectUrl)->firstOrFail();
        $this->authorize('restore', $project);
        // Storage::delete($project->imagen ); eliminamos el borrar imagen debido a la posibilidad de que el cliente quiera restaurar el proyecto. La ponemos en el forceDelete
        $project->restore();
        return redirect()->route('projects.index');

    }
    public function forceDelete(Project $projectUrl)
    {
        $project = Project::withTrashed()->wheretitular_url($projectUrl)->firstOrFail();
        $this->authorize('forceDelete', $project);
        Storage::delete($project->imagen );

        $project->forceDelete();
        return redirect()->route('projects.index');

    }

}
