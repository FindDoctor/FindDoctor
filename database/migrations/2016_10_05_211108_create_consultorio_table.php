<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultorioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('consultorio', function (Blueprint $table){
            $table->increments('id_consultorio');
            $table->string('medico_crm');
            $table->string('endereco', 100);
            $table->integer('telefone');
            
        });

        schema::table('consultorio', function($table){
            $table->foreign('medico_crm')->references('crm')->on('medicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('consultorio');
    }
}
