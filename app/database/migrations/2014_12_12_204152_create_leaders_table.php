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
			$table->increments('Id');
			$table->string('LeaderFirstName');
			$table->string('LeaderLastName');
			$table->string('Email');
			$table->date('StartDate')->nullable();
			$table->integer('LessonCount')->nullable()->default(0);
			$table->integer('LessonCountMonth')->nullable()->default(0);
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
