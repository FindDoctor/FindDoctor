<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function(Blueprint $table){
			$table->increments('id');
            $table->string('cpf', 12)->unique();
            $table->string('nome',70);
            $table->string('email',50)->unique();
            $table->string('password');
            $table->string('telefone');
            $table->string('endereco',100);
			$table->rememberToken();
 -          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('pacientes');
    }
}
