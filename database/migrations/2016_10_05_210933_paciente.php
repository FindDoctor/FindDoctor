<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class paciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function(Blueprint $table){
            $table->integer('cpf')->primary('cpf');
            $table->string('nome',70);
            $table->string('email',50)->unique();
            $table->string('senha',50);
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
        schema::drop('paciente');
    }
}
