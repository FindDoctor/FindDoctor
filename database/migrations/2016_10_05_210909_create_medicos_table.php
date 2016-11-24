<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table){
			$table->increments('id');
            $table->string('crm')->unique();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('telefone')->nullable();

            $table->string('cep');
            $table->string('endereco');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');

            $table->integer('n_avaliacoes')->default(0);
            $table->float('nota')->default(-1);

			$table->rememberToken()->nullable();
 -          $table->timestamps();
            $table->string('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('medicos');
    }
}
