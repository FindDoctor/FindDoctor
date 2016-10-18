<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class tabela_paciente extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	$faker->addProvider(new \Faker\Provider\pt_BR\PhoneNumber($faker));
    	$faker->addProvider(new \Faker\Provider\pt_BR\Person($faker));
    	foreach(range(1, 10) as $index){
        	DB::table('pacientes')->insert([
        		'cpf' => $faker->cpf(false),
        		'nome' => $faker->name,
        		'email' => $faker->email,
	            'password' => $faker->password,
	            'endereco' => $faker->address,
	            'telefone' => $faker->landlineNumber,
        	]);
    	}
    }
}
