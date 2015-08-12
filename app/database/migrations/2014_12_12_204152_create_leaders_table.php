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
			$table->string('firstName');
			$table->string('lastName');
			$table->string('email');
			$table->integer('lessonCount')->default(0);
			$table->date('startDate')->nullable();
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
