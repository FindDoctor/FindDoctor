<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class medico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico', function (Blueprint $table){
            $table->integer('crm')->primary('crm');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('Endereco', 100)->nullable();
            $table->integer('Telefone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('medico');
    }
}
