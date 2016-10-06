<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Paciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->integer('CPF');
            $table->string('nome', 50);
            $table->string('email', 50);
            $table->string('senha', 50);
            $table->integer('telefone');
            $table->string('endereco', 100);
            $table->primary('CPF');
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paciente');
        //
    }
}
