<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePossuiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('possui', function(Blueprint $table){
            $table->integer('especialidadeid')->unsigned();
            $table->unsignedInteger('medico_id');
            $table->primary('especialidadeid','medico_id');
        });
        schema::table('possui', function($table){
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('especialidadeid')->references('id_especialidade')->on('especialidade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('possui');
    }
}
