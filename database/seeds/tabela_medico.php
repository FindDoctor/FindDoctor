<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class tabela_medico extends Seeder
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
    	foreach(range(1, 10) as $index){
        	DB::table('medicos')->insert([
        		'crm' => $faker->numberBetween($min = 1000000, $max = 9999999),
        		'nome' => $faker->name,
        		'email' => $faker->email,
	            'password' => $faker->password,
	            'endereco' => $faker->address,
	            'telefone' => $faker->landlineNumber,
        	]);
    	}
    }
}
