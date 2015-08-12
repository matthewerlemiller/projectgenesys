<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCommentsFieldToBadBehaviorEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bad_behavior_events', function(Blueprint $table)
		{
			$table->text('comments')->nullable();
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
			$table->dropColumn('comments');
		});
	}

}
