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
