<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class medicoconsultorio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('medicoconsultorio', function(Blueprint $table){
            $table->integer('consultorioid')->unsigned();
            $table->integer('ncrm');
        });
        
        schema::table('medicoconsultorio', function($table){
            $table->foreign('ncrm')->references('crm')->on('medico')->onDelete('cascade');
            $table->foreign('consultorioid')->references('id_consultorio')->on('consultorio')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('medicoconsultorio');
    }
}
