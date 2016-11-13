<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('avalia', function(Blueprint $table){
            $table->string('paciente_cpf', 12);
            $table->integer('medico_id')->unsigned();
            $table->string('comentarios', 255);
            $table->integer('nota');
            $table->primary('paciente_cpf', 'medico_id');
        });
        schema::table('avalia', function($table){
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->foreign('paciente_cpf')->references('cpf')->on('pacientes')->onDelete('cascade');
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
