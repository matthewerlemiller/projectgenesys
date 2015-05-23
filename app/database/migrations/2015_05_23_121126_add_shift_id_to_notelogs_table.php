<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShiftIdToNotelogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('notelogs', function(Blueprint $table)
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
		Schema::table('notelogs', function(Blueprint $table)
		{
			
			$table->dropForeign('notelogs_ShiftId_foreign');

		});
	}

}
