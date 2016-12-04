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


        $consultorios = DB::table('consultorio')->where('medico_id',$medico_return[0]->crm)->get();


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

        $crm_medico = Auth::guard("medico")->user()['crm'];

        $consultorios = DB::table('consultorio')->where('medico_crm','=',$crm_medico)->get();

        return view('pages.dados',['consultorios' => $consultorios]);
    }


    public function atualiza(){

        DB::table('medicos')
            ->where('id', $_POST['id'])
            ->update(['nome' => $_POST['nome'],'email' => $_POST['email'],'telefone' => $_POST['telefone'],'cep' => $_POST['cep'],'endereco' => $_POST['endereco'],'numero' => $_POST['numero'],'complemento' => $_POST['complemento'],'bairro' => $_POST['bairro'],'cidade' => $_POST['cidade'],'estado' => $_POST['estado']]);

        return redirect('/dados');
    }

    public function atualizaConsultorio(){

        var_dump($_POST);
        exit();
    }

    public function adicionarConsultorio(){

        $insert = $_POST;

        unset($insert['Salvarsubmit']);
        unset($insert['_token']);
        unset($insert['consultorio']);
        $insert['medico_crm'] = $insert['crm'];
        unset($insert['crm']);

        $address = $insert['endereco'] . ' ' . $insert['numero'];

        $address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
 
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";
         
        $response = file_get_contents($url);
         
        $json = json_decode($response,TRUE); //generate array object from the response from the web
         
        $insert['latitude'] = $json['results'][0]['geometry']['location']['lat'];

        $insert['longitude'] = $json['results'][0]['geometry']['location']['lng'];


        DB::table('consultorio')->insert($insert);

        return redirect('/dados/');
        
    }

    public function removerConsultorio(){
        DB::table('consultorio')->where('id_consultorio', '=', $_POST['consultorio'])->delete();
        return redirect('/dados');
    }

}
