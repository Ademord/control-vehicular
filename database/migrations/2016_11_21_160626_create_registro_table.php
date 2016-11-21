<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRegistroTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registro', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('camara');
			$table->string('lugar');
			$table->string('filename');
			$table->string('placa');
			$table->timestamps();
			$table->string('mime');
			$table->string('miembro')->nullable();
			$table->boolean('mismatch')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registro');
	}

}
