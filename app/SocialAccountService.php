<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
		$account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        }
		else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = Paciente::whereEmail($providerUser->getEmail())->first();

            if (!isset($user)) {
				$socialAcount = session("socialAccount");
				if(isset($socialAcount))
					session()->forget("socialAccount");

				session(['socialAccount' => $account]);

				return redirect()->route('socialRegister')->with('data', [
					'nome' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
				]);
            }
			else {
				$account->user()->associate($user);
	            $account->save();

	            return $user;
			}
        }

    }
}
