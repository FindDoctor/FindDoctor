<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableModel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('Medico',function($t){
            $t->string('Endereco', 100)->nullable();
            $t->integer('Telefone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('Medico',function($t){
            $t->dropColumn('Endereco');
            $t->dropColumn('Telefone');
        });
    }
}
