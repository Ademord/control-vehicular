<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCamaraTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('camara', function(Blueprint $table)
		{
			$table->foreign('lugar_id', 'camara_lugar_id_foreign_2')->references('id')->on('lugar')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('camara', function(Blueprint $table)
		{
			$table->dropForeign('camara_lugar_id_foreign_2');
		});
	}

}
