<?php

namespace App\Http\Controllers;

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

    public function store()
    {
        // request()->save();
        $nombre = request('nombre');
        $descripcion = request('descripcion');
        $titular_url = request('titular_url');
        $tecnologias = request('tecnologias');

        Project::create([
            'nombre' => $nombre,
            'descripcion' => $descripcion, 
            'titular_url' => $titular_url,
            'tecnologias' => $tecnologias
        ]);

        return redirect()->route('projects.index');

        // return request('nombre');
    }

}
