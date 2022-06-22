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
        $portfolio = Project::orderBy('created_at', 'DESC')->get();

        return view('portafolio',compact('portfolio'));
    }

}
