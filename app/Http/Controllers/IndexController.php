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


        $medicos = DB::table('medicos')->orderBy('premium', 'desc')->orderBy('nota', 'desc')->get();

		session()->forget('socialAccount');

        return view('pages.inicio', ['medicos' => $medicos]);
    }

    public function loadMedics(Request $request){

        session_start();

        $medicos = DB::table('medicos');

        if(isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
            $medicos->where('nome', 'like', '%' . $_POST['nome'] .'%');
        }

		if($_POST['especialidade'] != 'Todas') {
			$medicos->where('especialidade', '=', $_POST['especialidade']);
		}

        $medicos->orderBy('premium', 'desc');
        $medicos->orderBy('nota', 'desc');

        $result = $medicos->get();

        $result = json_encode($result);

        echo $result;
        exit();

        //Incluir campos de WHERE

    }

    public function infomedico()
    {
    	session_start();
        return view('pages.infomedico');
    }

	public function loadMarkers(Request $request) {
		$result = DB::table('medicos')
					->join('consultorio', 'medicos.id', '=', 'consultorio.medico_id')
					->select('medicos.nome', 'consultorio.latitude', 'consultorio.longitude')
					->get();

		$result = json_encode($result);

		echo $result;
		exit();
	}
}
