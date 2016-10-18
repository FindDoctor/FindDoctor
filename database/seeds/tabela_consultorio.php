<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Faker\Factory as Faker;

class tabela_consultorio extends Seeder
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
        	DB::table('medicos')->insert([
        		'medico_crm' => '',
	            'endereco' => $faker->address,
	            'telefone' => $faker->landlineNumber,
        	]);
    }
}
