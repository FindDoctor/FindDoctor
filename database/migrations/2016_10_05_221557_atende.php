<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class atende extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('atende', function(Blueprint $table){
            $table->integer('convenioid')->unsigned();
            $table->integer('ncrm');
            $table->primary('convenioid', 'ncrm');
        });
        schema::table('atende', function($table){
            $table->foreign('ncrm')->references('crm')->on('medico')->onDelete('cascade');
            $table->foreign('convenioid')->references('id_convenio')->on('convenio')->onDelete('cascade');
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
