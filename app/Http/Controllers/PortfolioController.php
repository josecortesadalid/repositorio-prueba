<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class PortfolioController extends Controller
{

    public function index()
    {
        $portfolio = DB::table('projects')->get();

        return view('portafolio',compact('portfolio'));
    }

}
