<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaConsultorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('Consultorio', function (Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id_consultorio');
            $table->string('endereco', 100);
            $table->integer('telefone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('Consultorio');
    }
}
