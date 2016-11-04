<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Validator::extend('crm', function($attribute, $value, $parameters, $validator) {
			$curl = curl_init();

            // Validacao consulta crm
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'http://www.consultacrm.com.br/api/index.php?tipo=crm&uf=&q=' . $value . '&chave=2831097512&destino=json',
                CURLOPT_USERAGENT => 'Codular Sample cURL Request'
            ));
            // Send the request & save response to $resp
            $resp = curl_exec($curl);
            $result = json_decode($resp);
            // Close request to clear up some resources
            curl_close($curl);

            if($result->total)
				return true;
			else
				return false;
        });

		Validator::extend('cpf', function($attribute, $value, $parameters, $validator) {
			// Elimina mascara
            $cpf = preg_replace('[^0-9]', '', $value);
            $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

			$cpfsProibidos = [
				'00000000000',
				'11111111111',
				'22222222222',
				'33333333333',
				'44444444444',
				'55555555555',
				'66666666666',
				'77777777777',
				'88888888888',
				'99999999999'
			];

			// Verifica se o numero de digitos informados é igual a 11
            if (strlen($cpf) != 11) return false;

			// Verifica se nenhuma das sequências invalidas abaixo
			// foi digitada. Caso afirmativo, retorna falso
            else if (in_array($cpf, $cpfsProibidos))
                return false;

			// Calcula os digitos verificadores para verificar se o
			// CPF é válido
			else {
			    for ($t = 9; $t < 11; $t++) {
			        for ($d = 0, $c = 0; $c < $t; $c++)
			            $d += $cpf{$c} * (($t + 1) - $c);

			        $d = ((10 * $d) % 11) % 10;

			        if ($cpf{$c} != $d)
						return false;
			    }

			    return true;
			}
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
		if ($this->app->environment() == 'local') {
	        $this->app->register('Hesto\MultiAuth\MultiAuthServiceProvider');
	    }
    }
}
