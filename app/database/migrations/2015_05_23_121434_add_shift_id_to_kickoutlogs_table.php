<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShiftIdToKickoutlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kickoutlogs', function(Blueprint $table)
		{
			
			$table->integer('ShiftId')->unsigned();
			$table->foreign('ShiftId')->references('Id')->on('shifts');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('kickoutlogs', function(Blueprint $table)
		{
			
			$table->dropForeign('kickoutlogs_ShiftId_foreign');

		});
	}

}
