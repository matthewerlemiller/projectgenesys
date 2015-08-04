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
			$table->increments('Id');
			$table->integer('MemberId')->unsigned();
			$table->foreign('MemberId')->references('Id')->on('members');
			$table->integer('StatusId')->unsigned();
			$table->foreign('StatusId')->references('Id')->on('statuses');
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
