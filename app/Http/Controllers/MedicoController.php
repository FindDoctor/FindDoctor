<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Input;

class MedicoController extends Controller
{
    public function index($medico)
    {
    	session_start();
        $medico_return = DB::table('medicos')->where('id',$medico)->get();

        
        $consultorios = DB::table('consultorio')->where('medico_crm',$medico_return[0]->crm)->get();


        if (!$medico_return->count()) {
    		return redirect('/');
		}

        return view('pages.medico',['medico' => $medico_return,'consultorios' => $consultorios]);
    }

    public function marcarConsulta(){

    	DB::table('consulta')->insert(
		    ['medico_crm' => $_POST['crm'], 'consultorio_id' => $_POST['consultorio'], 'paciente_cpf' => '40701186836','hora' => '16:19:25', 'data'=> $_POST['data-consulta'], 'status'=>'0']
		);

        if (!$medico_return->count()) {
            return redirect('/medico/'.$_POST['crm']);
        }

    }

    public function atualizaCadastro(){
        $this->middleware('auth');

        var_dump(Auth::id());

        return view('pages.dados');
    }


    public function atualiza(){

        DB::table('medicos')
            ->where('id', $_POST['id'])
            ->update(['nome' => $_POST['nome'],'email' => $_POST['email'],'telefone' => $_POST['telefone'],'cep' => $_POST['cep'],'endereco' => $_POST['endereco'],'numero' => $_POST['numero'],'complemento' => $_POST['complemento'],'bairro' => $_POST['bairro'],'cidade' => $_POST['cidade'],'estado' => $_POST['estado']]);

        return redirect('/dados');
    }

}
