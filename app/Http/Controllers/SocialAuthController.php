<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Illuminate\Support\Facades\Auth;
use Socialite;

class SocialAuthController extends Controller
{
	public function redirect($prov)
    {
        return Socialite::driver($prov)->redirect();
    }

    public function callback($prov, SocialAccountService $service)
    {
		$user = $service->createOrGetUser(Socialite::driver($prov)->stateless()->user());

		if($user instanceof \Illuminate\Http\RedirectResponse) {
			return $user;
		}
		else {
			Auth::login($user, true);
			return redirect()->to('/');
		}
    }

	public function registerForm()
	{
		$data = session('data');
		if (isset($data)) {
			return view('auth.socialRegister', [
				'nome' 			=> $data['nome'],
				'email' 		=> $data['email']
			]);
		}
		else
			return redirect('/');
	}
}
