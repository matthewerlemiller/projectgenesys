<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadBehaviorEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bad_behavior_events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('memberId')->unsigned();
			$table->foreign('memberId')->references('id')->on('members');
			$table->integer('statusId')->unsigned();
			$table->foreign('statusId')->references('id')->on('statuses');
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
		Schema::drop('bad_behavior_events');
	}

}
