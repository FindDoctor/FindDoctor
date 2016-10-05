<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaMedico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Medico', function (Blueprint $table){
            $table->engine = 'InnoDB';
            $table->integer('CRM')->primary('CRM');
            $table->string('Nome');
            $table->string('E-mail')->unique();
            $table->string('Senha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('Medico');
    }
}
