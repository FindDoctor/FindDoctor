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

        $consultorios = DB::table('consultorio')->where('medico_id',$medico)->get();

        $comentarios = DB::table('avalia')->where('medico_id',$medico)->get();

        if (!$medico_return->count()) {
    		return redirect('/');
		}

        return view('pages.medico',['medico' => $medico_return,'consultorios' => $consultorios, 'comentarios' => $comentarios]);
    }

    public function marcarConsulta(){

        $this->middleware('auth');

        if(Auth::guard("paciente")->user() != null){
            $cpf = Auth::guard("paciente")->user()->cpf;
        }else{
            return redirect('/');
        }

    	DB::table('consulta')->insert(
		    ['medico_id' => $_POST['id'], 'consultorio_id' => $_POST['consultorio'], 'paciente_cpf' => $cpf,'data'=> $_POST['data_consulta'], 'motivo'=>$_POST['motivo_consulta'] ,'status'=>'0']
		  );

      $comentarios = DB::table('avalia')
                      ->select('nota', 'comentarios')
                      ->where('medico_id', '=', $_POST['id']);

      //return view ('pages.medico', ['comentarios' => $comentarios]);
        return redirect('/medico/'.$_POST['id']);
    }

    public function atualizaCadastro(){
        $this->middleware('auth');

        $consultorios = null;

        if(Auth::guard("medico")->user()['crm'] != null){
            $id_medico = Auth::guard("medico")->user()['id'];
            $consultorios = DB::table('consultorio')->where('medico_id','=',$id_medico)->get();
        }

        $consultas = DB::table('consulta')
                      ->select('consultorio_id','medico_id', 'paciente_cpf', 'data', 'motivo')
                      ->where('medico_id', '=', Auth::guard("medico")->user()['id'])
                      ->get();

        return view('pages.dados',['consultorios' => $consultorios,'consultas' => $consultas ]);
    }


    public function atualiza(){

        DB::table('medicos')
            ->where('id', $_POST['id'])
            ->update(['nome' => $_POST['nome'],'email' => $_POST['email'],'telefone' => $_POST['telefone'],'cep' => $_POST['cep'],'endereco' => $_POST['endereco'],'numero' => $_POST['numero'],'complemento' => $_POST['complemento'],'bairro' => $_POST['bairro'],'cidade' => $_POST['cidade'],'estado' => $_POST['estado']]);

        return redirect('/dados');
    }

    public function atualizaConsultorio(){

        $insert = $_POST;

        unset($insert['Salvarsubmit']);
        unset($insert['_token']);
        unset($insert['consultorio']);
        unset($insert['crm']);

        $address  = $insert['cep'];
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";

        $response = file_get_contents($url);

        $json = json_decode($response,TRUE); //generate array object from the response from the web

        $insert['latitude'] = $json['results'][0]['geometry']['location']['lat'];

        $insert['longitude'] = $json['results'][0]['geometry']['location']['lng'];

        DB::table('consultorio')
            ->where('id_consultorio', $_POST['consultorio'])
            ->update($insert);

        return redirect('/dados/');
    }

    public function adicionarConsultorio(){

        $insert = $_POST;

        unset($insert['Salvarsubmit']);
        unset($insert['_token']);
        unset($insert['consultorio']);
        $insert['medico_id'] = $insert['id'];
        unset($insert['id']);

        $address = $insert['endereco'] . ' ' . $insert['numero'];

        $address = str_replace(" ", "+", $address); // replace all the white space with "+" sign to match with google search pattern
        $address  = $insert['cep'];
        $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=$address";

        $response = file_get_contents($url);

        $json = json_decode($response,TRUE); //generate array object from the response from the web

        if(empty($json['results']))
            return redirect('/dados/');


        $insert['latitude'] = $json['results'][0]['geometry']['location']['lat'];

        $insert['longitude'] = $json['results'][0]['geometry']['location']['lng'];

        DB::table('consultorio')->insert($insert);

        return redirect('/dados/');

    }

    public function removerConsultorio(){
        DB::table('consultorio')->where('id_consultorio', '=', $_POST['consultorio'])->delete();
        return redirect('/dados');
    }

    public function avaliaMedico(){

        $this->middleware('auth');

        $id = $_POST['id'];


        if(Auth::guard("paciente")->user() != null){
            $cpf = Auth::guard("paciente")->user()->cpf;
        }else{
            return redirect('/');
        }

        $medico_return = DB::table('medicos')->where('id',$id)->get();

        $notaFinal = ($medico_return[0]->n_avaliacoes * $medico_return[0]->nota + $_POST['nota']) / ($medico_return[0]->n_avaliacoes + 1);

        DB::table('medicos')
            ->where('id', $id)
            ->update(['nota' => $notaFinal, 'n_avaliacoes' => ($medico_return[0]->n_avaliacoes + 1)]);

        $insert['nota'] = $_POST['nota'];
        $insert['comentarios'] = $_POST['comentarios_avaliacao'];
        $insert['medico_id'] = $id;

        $insert['paciente_cpf'] = $cpf;

        DB::table('avalia')->insert($insert);

        return redirect('/medico/' . $id);

    }

    public function virarPremium(){
        var_dump($_POST);
    }

}
