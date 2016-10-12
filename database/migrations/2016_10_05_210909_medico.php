<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Medico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico', function (Blueprint $table){
			$table->increments('id');
            $table->integer('crm')->unique();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('Endereco', 100)->nullable();
            $table->integer('Telefone')->nullable();
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
        schema::drop('medico');
    }
}
