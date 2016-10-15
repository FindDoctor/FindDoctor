<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class MedicoController extends Controller
{
    public function index()
    {
    	session_start();
    	// $id = Request::query('id');

        // $medico = DB::table('medicos')->where('',10)->get();

        return view('pages.medico');
    }
}
