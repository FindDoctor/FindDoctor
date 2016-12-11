<?php

namespace App\Http\Controllers\MedicoAuth;

use File;
use App\Medico;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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
        $this->middleware('medico.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
		$messages = [
            'required' => 'O campo :attribute é obrigatório.',
			'size'    => ':attribute deve ter exatamente :size caracteres.',
			'between' => ':attribute deve ter tamanho entre :min e :max.',
			'crm' => 'Não foi possível validar o CRM',
			'email' => 'Formato de e-mail inválido',
			'min' => 'O campo deve ser preenchido com pelo menos :min caracteres',
			'confirmed' => 'As senhas não são iguais',
			'max'  => 'O campo deve ser preenchido com no maximo :max caracteres'
        ];

		return Validator::make($data, [
			'nome' => 'required|max:70|min:6',
			//'crm' => 'required|unique:medicos|crm',
			'crm' => 'required|unique:medicos',
			'telefone' => 'required|max:11|min:10',
			'email' => 'required|email|max:50|unique:medicos|unique:pacientes',
			'cep' => 'required|max:9|min:9',
			'endereco' => 'required|max:100|min:6',
			'numero' => 'required',
			'complemento' => 'min:3',
			'bairro' => 'required|min:6',
			'cidade' => 'required|min:3',
			'estado' => 'required|min:2',
			'password' => 'required|min:6|confirmed',
			'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
		], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Paciente
     */
    protected function create(array $data)
    {
		//dd($data);
		@$image = $data['foto'];
		$imagename = '';
		if($image) {
			$imagename = time().'.'.$image->getClientOriginalExtension();

			$destinationPath = public_path('/imgs/medicos/');

			if(!File::exists($destinationPath)) {
			    File::makeDirectory($destinationPath, 0775);
			}

			$img = Image::make($image->getRealPath());
			$img->resize(400, 400, function ($cons) {
				$cons->aspectRatio();
			})->save($destinationPath.$imagename);
		}

        return Medico::create([
			'nome' => $data['nome'],
			'crm' => $data['crm'],
			'telefone' => $data['telefone'],
			'email' => $data['email'],
			'cep' => $data['cep'],
			'endereco' => $data['endereco'],
			'numero' => $data['numero'],
			'complemento' => $data['complemento'],
			'bairro' => $data['bairro'],
			'cidade' => $data['cidade'],
			'estado' => $data['estado'],
			'password' => bcrypt($data['password']),
			'foto' => $imagename ? $imagename : '',
		]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('medico');
    }
}
