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

        $medicos = DB::table('medicos')->get();

        return view('pages.inicio', ['medicos' => $medicos]);
    }

    public function loadMedics(Request $request){

        $medicos = DB::table('medicos');

        if(isset($_POST['nome']) && strlen($_POST['nome']) > 0){
            $medicos->where('nome', 'like', '%' . $_POST['nome'] .'%');
        }

        $result = $medicos->get();

        $result = json_encode($result);

        echo $result;
        exit();

        //Incluir campos de WHERE

    }
}
