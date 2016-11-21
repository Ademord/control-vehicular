<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPlacaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('placa', function(Blueprint $table)
		{
			$table->foreign('miembro_id')->references('id')->on('miembro')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('placa', function(Blueprint $table)
		{
			$table->dropForeign('placa_miembro_id_foreign');
		});
	}

}
