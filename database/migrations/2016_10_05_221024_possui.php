<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class possui extends Migration
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
            $table->integer('ncrm');
            $table->primary('especialidadeid','ncrm');
        });
        schema::table('possui', function($table){
            $table->foreign('ncrm')->references('crm')->on('medico')->onDelete('cascade');
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
