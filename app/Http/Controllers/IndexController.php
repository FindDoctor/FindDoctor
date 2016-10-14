<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	session_start();

        $medicos = DB::table('medico')->get();

        return view('pages.inicio', ['medicos' => $medicos]);
    }

    // public function loadMedics(Request $request){ 
    //     session_start();  
    //     echo "";
    // }
}
