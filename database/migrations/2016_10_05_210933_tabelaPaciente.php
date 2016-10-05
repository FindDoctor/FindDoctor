<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaPaciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Paciente', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->integer('CPF')->primary('CPF');
            $table->string('Nome',70);
            $table->string('E-mail',50)->unique();
            $table->string('Senha',50);
            $table->integer('telefone');
            $table->string('endereco',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('Paciente');
    }
}
