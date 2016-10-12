<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class avalia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('avalia', function(Blueprint $table){
            $table->string('pacientecpf', 12);
            $table->integer('ncrm');
            $table->string('comentarios', 255);
            $table->integer('nota');
            $table->primary('pacientecpf', 'ncrm');
        });
        schema::table('avalia', function($table){
            $table->foreign('ncrm')->references('crm')->on('medicos')->onDelete('cascade');
            $table->foreign('pacientecpf')->references('cpf')->on('pacientes')->onDelete('cascade');
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
