<?php

namespace App\Http\Controllers\Auth;

use App\Paciente;
use App\Medico;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
		if(array_key_exists("cpf", $data)) {
			return Validator::make($data, [
	            'nome' => 'required|max:70|min:6',
				'cpf' => 'required|max:11|min:10|unique:pacientes',
				'telefone' => 'required|max:11|min:10',
	            'email' => 'required|email|max:50|unique:pacientes',
				'endereco' => 'required|max:100|min:6',
	            'password' => 'required|min:6|confirmed',
	        ]);
		}
		else {
			return Validator::make($data, [
	            'nome' => 'required|max:70|min:6',
				'crm' => 'required|unique:medicos',
				'telefone' => 'required|max:11|min:10',
	            'email' => 'required|email|max:50|unique:medicos',
				'endereco' => 'required|max:100|min:6',
	            'password' => 'required|min:6|confirmed',
	        ]);
		}
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Paciente
     */
    protected function create(array $data)
    {
		if(array_key_exists("cpf", $data)) {
	        return Paciente::create([
	            'nome' => $data['nome'],
	            'cpf' => $data['cpf'],
	            'telefone' => $data['telefone'],
	            'email' => $data['email'],
	            'endereco' => $data['endereco'],
	            'password' => bcrypt($data['password']),
	        ]);
		}
		else {
			return Medico::create([
	            'nome' => $data['nome'],
	            'crm' => $data['crm'],
	            'telefone' => $data['telefone'],
	            'email' => $data['email'],
	            'endereco' => $data['endereco'],
	            'password' => bcrypt($data['password']),
	        ]);
		}
    }
}
