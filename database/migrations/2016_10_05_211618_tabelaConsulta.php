<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaConsulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('consulta', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->engine = 'MyISAM';         
            $table->integer('nCRM');
            $table->integer('consultorioID')->unsigned();
            $table->integer('pacienteCPF');
            $table->time('hora');
            $table->date('data');
            $table->primary(array('nCRM','pacienteCPF','consultorioID'));
        });
        
        schema::table('consulta', function($table){
            $table->foreign('nCRM')->references('CRM')->on('medico')->onDelete('cascade');
            $table->foreign('consultorioID')->references('id_consultorio')->on('consultorio')->onDelete('cascade');
            $table->foreign('pacienteCPF')->references('CPF')->on('paciente')->onDelete('cascade');
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
