<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaAvalia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('avalia', function(Blueprint $table){
            $table->integer('pacienteCPF');
            $table->integer('nCRM');
            $table->string('comentarios', 255);
            $table->integer('nota');
            $table->primary('pacienteCPF', 'nCRM');
        });
        schema::table('avalia', function($table){
            $table->foreign('nCRM')->references('CRM')->on('medico')->onDelete('cascade');
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
        schema::drop('avalia');
    }
}
