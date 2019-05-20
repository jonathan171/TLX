<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCiudadesColombiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('ciudades_colombia', function (Blueprint $table) {
            $table->increments('id');
           $table->string('codigo');
           $table->string('ciudad');
           $table->integer('estado_id')->unsigned();
           $table->foreign('estado_id')->references('id')->on('estados_colombia');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ciudades_colombia');
    }
}
