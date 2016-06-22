<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLeaderIdToBadBehaviorEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bad_behavior_events', function(Blueprint $table)
		{
			$table->integer('leaderId')->unsigned()->nullable();
			$table->foreign('leaderId')->references('id')->on('leaders');
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
			$table->dropForeign('bad_behavior_events_leaderid_foreign');
			$table->dropColumn('leaderId');
		});
	}

}
