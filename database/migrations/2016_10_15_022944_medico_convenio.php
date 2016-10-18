<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MedicoConvenio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('medico_convenio', function(Blueprint $table){
            $table->integer('convenio_id')->unsigned();
            $table->unsignedInteger('medico_id');
            $table->primary('convenio_id', 'medico_id');
        });
        schema::table('medico_convenio', function($table){
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('convenio_id')->references('id_convenio')->on('convenio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('medico_convenio');
    }
}
