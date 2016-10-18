<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InfoMedicoController extends Controller
{
	
    public function index()
    {
    	session_start();

        return view('pages.infomedico');
    }
}
