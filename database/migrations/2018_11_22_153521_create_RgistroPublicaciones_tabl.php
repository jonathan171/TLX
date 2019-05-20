<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRgistroPublicacionesTabl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('_token');
            $table->string('nombre');
            $table->string('email');
            $table->string('categoria');
            $table->string('ciudad');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('contacto');
            $table->string('precio');
            $table->string('imagen_principal');
            $table->string('url_carpeta');
            $table->string('confirmacion');
            
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('publicaciones');
    }
}
