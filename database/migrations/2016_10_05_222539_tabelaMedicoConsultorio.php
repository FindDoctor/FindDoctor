<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaMedicoConsultorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('medicoConsultorio', function(Blueprint $table){
            $table->integer('consultorioID')->unsigned();
            $table->integer('nCRM');
        });
        
        schema::table('medicoConsultorio', function($table){
            $table->foreign('nCRM')->references('CRM')->on('medico')->onDelete('cascade');
            $table->foreign('consultorioID')->references('id_consultorio')->on('consultorio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('medicoConsultorio');
    }
}
