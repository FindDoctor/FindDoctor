<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class MedicoController extends Controller
{
    public function index($medico)
    {
    	session_start();
        $medico_return = DB::table('medicos')->where('crm',$medico)->get();

        if (!$medico_return->count()) {
    		return redirect('/');
		}


        return view('pages.medico',['medico' => $medico_return]);
    }
}
