<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaPossui extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('possui', function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->integer('especialidadeID')->unsigned();
            $table->integer('nCRM');
            $table->primary('especialidadeID','nCRM');
        });
        schema::table('possui', function($table){
            $table->foreign('nCRM')->references('CRM')->on('medico')->onDelete('cascade');
            $table->foreign('especialidadeID')->references('id_especialidade')->on('especialidade')->onDelete('cascade');
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
