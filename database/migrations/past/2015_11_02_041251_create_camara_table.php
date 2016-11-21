<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camara', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip')->unique();
            $table->integer('lugar_id')->unsigned();
            $table->foreign('lugar_id')->references('id')->on('lugar')->onDelete('cascade');
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
        Schema::drop('camara');
    }
}
