<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class PortfolioController extends Controller
{

    public function index()
    {
        // $portfolio = DB::table('projects')->get();
        $portfolio = Project::get();

        return view('portafolio',compact('portfolio'));
    }

    public function show(Project $id)
    {
        return $id;

        // return view('portafolio.show', [
        //     'portfolio' => Project::findOrFail($id)
        // ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(CreateProjectRequest $request)
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

            return $request->validated();
        // Project::create(request()->all());

        // return redirect()->route('projects.index');

        // return request('nombre');
    }

}
