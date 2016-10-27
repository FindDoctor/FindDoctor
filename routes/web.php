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

Auth::routes();

Route::get('/', 'IndexController@index');
Route::get('/home', 'IndexController@index');

//Medico Login
Route::get('medico/login', 'MedicoAuth\LoginController@showLoginForm');
Route::post('medico/login', 'MedicoAuth\LoginController@login');
Route::get('medico/logout', 'MedicoAuth\LoginController@logout');

//Medico Passwords
Route::post('medico/password/email', 'MedicoAuth\ForgotPasswordController@sendResetLinkEmail');
Route::post('medico/password/reset', 'MedicoAuth\ResetPasswordController@reset');
Route::get('medico/password/reset', 'MedicoAuth\ForgotPasswordController@showLinkRequestForm');
Route::get('medico/password/reset/{token}', 'MedicoAuth\ResetPasswordController@showResetForm');

//Logins

Route::get('/cadastroPaciente', 'LoginController@cadastrarPaciente');

//load de medicos na home
Route::post('/carregamedicos', 'IndexController@loadMedics');

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
