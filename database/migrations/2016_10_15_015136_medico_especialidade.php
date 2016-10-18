<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MedicoEspecialidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('medico_especialidade', function(Blueprint $table){
            $table->integer('especialidade_id')->unsigned();
            $table->unsignedInteger('medico_id');
            $table->primary('especialidade_id','medico_id');
        });
        schema::table('medico_especialidade', function($table){
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('especialidade_id')->references('id_especialidade')->on('especialidade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('medico_especialidade');
    }
}
