<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCamaraBackupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('camara_backup', function(Blueprint $table)
		{
			$table->foreign('lugar_id', 'camara_lugar_id_foreign')->references('id')->on('lugar')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('camara_backup', function(Blueprint $table)
		{
			$table->dropForeign('camara_lugar_id_foreign');
		});
	}

}
