<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('numero')->unique();
            $table->integer('miembro_id')->unsigned();
            $table->foreign('miembro_id')->references('id')->on('miembro')->onDelete('cascade');
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
        Schema::drop('placa');
    }
}
