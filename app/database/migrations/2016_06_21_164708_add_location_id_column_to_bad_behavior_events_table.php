<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationIdColumnToBadBehaviorEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bad_behavior_events', function(Blueprint $table)
		{
			$table->integer('locationId')->unsigned();
			$table->foreign('locationId')->references('id')->on('locations')->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bad_behavior_events', function(Blueprint $table)
		{
			$table->dropForeign('bad_behavior_events_locationid_foreign');
			$table->dropColumn('locationId');
		});
	}

}
