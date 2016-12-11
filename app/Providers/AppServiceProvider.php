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
			$cpf = preg_replace('/[^0-9]/', '', (string) $value);

			// Valida tamanho
			if (strlen($cpf) != 11)
				return false;

			$invalidos = array('00000000000',
				'11111111111',
				'22222222222',
				'33333333333',
				'44444444444',
				'55555555555',
				'66666666666',
				'77777777777',
				'88888888888',
				'99999999999'
			);

			if (in_array($cpf, $invalidos)) return false;

			// Calcula e confere primeiro dígito verificador
			for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
				$soma += $cpf{$i} * $j;

			$resto = $soma % 11;

			if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto))
				return false;

			// Calcula e confere segundo dígito verificador
			for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
				$soma += $cpf{$i} * $j;

			$resto = $soma % 11;

			return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
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
