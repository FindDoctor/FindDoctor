<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('consulta', function(Blueprint $table){
            $table->increments('consulta_id');
            $table->integer('consultorio_id')->unsigned();
            $table->integer('medico_id')->unsigned();
            $table->string('paciente_cpf', 12);
            $table->time('hora');
            $table->date('data');
            $table->boolean('status');
        });

        schema::table('consulta', function($table){
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('consultorio_id')->references('id_consultorio')->on('consultorio')->onDelete('cascade');
            $table->foreign('paciente_cpf')->references('cpf')->on('pacientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('consulta');
    }
}
