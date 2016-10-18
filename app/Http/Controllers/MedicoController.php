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

    public function marcarConsulta(){

    	DB::table('consulta')->insert(
		    ['medico_crm' => $_POST['crm'], 'consultorio_id' => '1', 'paciente_cpf' => '71168968305','hora' => '16:19:25', 'data'=>'2016-10-10', 'status'=>'0']
		);

        if (!$medico_return->count()) {
            return redirect('/medico/'.$_POST['crm']);
        }

    }
}
