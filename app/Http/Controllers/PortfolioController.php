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
        $portfolio = Project::latest()->paginate(1);

        return view('portafolio',compact('portfolio'));
    }

    public function show(Project $id)
    {
        return $id;

        // return view('portafolio.show', [
        //     'portfolio' => Project::findOrFail($id)
        // ]);
    }
}
