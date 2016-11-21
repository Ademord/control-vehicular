<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCamaraBackupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('camara_backup', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ip')->nullable()->unique('camara_ip_unique');
			$table->integer('lugar_id');
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
		Schema::drop('camara_backup');
	}

}
