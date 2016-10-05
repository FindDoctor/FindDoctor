<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaAtende extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('atende', function(Blueprint $table){
            $table->integer('convenioID')->unsigned();
            $table->integer('nCRM');
            $table->primary('convenioID', 'nCRM');
        });
        schema::table('atende', function($table){
            $table->foreign('nCRM')->references('CRM')->on('medico')->onDelete('cascade');
            $table->foreign('convenioID')->references('id_convenio')->on('convenio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('atende');
    }
}
