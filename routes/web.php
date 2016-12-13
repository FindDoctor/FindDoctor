<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/', 'IndexController@index');
Route::get('/home', 'IndexController@index');

Route::get('/login', function () {
	return View('auth.login');
});
Route::get('/register', function () {
	return View('auth.register');
});

Route::group(['prefix' => 'paciente'], function () {
	//Paciente Login
	Route::post('login', 'PacienteAuth\LoginController@login');
	Route::get('logout', 'PacienteAuth\LoginController@logout');

	//Paciente Register
	Route::post('register', 'PacienteAuth\RegisterController@register');

	//Paciente Passwords
	Route::post('password/email', 'PacienteAuth\ForgotPasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'PacienteAuth\ResetPasswordController@reset');
	Route::get('password/reset', 'PacienteAuth\ForgotPasswordController@showLinkRequestForm');
	Route::get('password/reset/{token}', 'PacienteAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'medico'], function () {
	//Medico Login
	Route::post('login', 'MedicoAuth\LoginController@login');
	Route::get('logout', 'MedicoAuth\LoginController@logout');

	//Medico Register
	Route::post('register', 'MedicoAuth\RegisterController@register');

	//Medico Passwords
	Route::post('password/email', 'MedicoAuth\ForgotPasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'MedicoAuth\ResetPasswordController@reset');
	Route::get('password/reset', 'MedicoAuth\ForgotPasswordController@showLinkRequestForm');
	Route::get('password/reset/{token}', 'MedicoAuth\ResetPasswordController@showResetForm');
});

//atualizacao de dados
Route::get('dados', 'MedicoController@atualizaCadastro');
Route::post('atualiza', 'MedicoController@atualiza');
Route::post('atualizaConsultorio', 'MedicoController@atualizaConsultorio');
Route::post('removerConsultorio', 'MedicoController@removerConsultorio');
Route::post('adicionarConsultorio', 'MedicoController@adicionarConsultorio');
Route::post('avalia-medico', 'MedicoController@avaliaMedico');
Route::post('', 'MedicoController@avaliaMedico');
Route::post('virarPremium', 'MedicoController@virarPremium');

//Logins
Route::get('/cadastroPaciente', 'LoginController@cadastrarPaciente');

//load de medicos na home
Route::post('/carregamedicos', 'IndexController@loadMedics');
Route::post('/carregamarkers', 'IndexController@loadMarkers');

//Pagina do médico
Route::get('/medico', function(){
	return redirect('');
});

Route::get('/medico/{medico}', ['uses' => 'MedicoController@index']);
Route::get('/infomedico', 'InfoMedicoController@index');


Route::post('/marcar-consulta', 'MedicoController@marcarConsulta');

//Social
Route::get('/social/{prov}/redirect', 'SocialAuthController@redirect');
Route::get('/social/{prov}/callback', 'SocialAuthController@callback');
Route::get('/social/register', 'SocialAuthController@registerForm')->name('socialRegister');


Route::get('/quemsomos', function() {
	return view('pages.quemsomos');
});
Route::get('/contato', function() {
	return view('pages.contato');
});
