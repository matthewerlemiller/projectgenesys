<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leaders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('LocationId')->unsigned();
			$table->foreign('LocationId')->references('LocationId')->on('locations');
			$table->string('LeaderFirstName');
			$table->string('LeaderLastName');
			$table->string('Email');
			$table->date('StartDate');
			$table->integer('LessonCount');
			$table->integer('LessonCountMonth');
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
		Schema::drop('leaders');
	}

}
