<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class consulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('consulta', function(Blueprint $table){
            $table->integer('ncrm');
            $table->integer('consultorioid')->unsigned();
            $table->string('pacientecpf', 12);
            $table->time('hora');
            $table->date('data');
            $table->primary(array('ncrm','pacientecpf','consultorioid'));
        });

        schema::table('consulta', function($table){
            $table->foreign('ncrm')->references('crm')->on('medico')->onDelete('cascade');
            $table->foreign('consultorioid')->references('id_consultorio')->on('consultorio')->onDelete('cascade');
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
        schema::drop('consulta');
    }
}
