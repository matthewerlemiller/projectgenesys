<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('checklogs', function(Blueprint $table)
		{
			$table->increments('Id');
			$table->integer('MemberId')->unsigned();
			$table->foreign('MemberId')->references('Id')->on('members');
			$table->dateTime('CheckInDateTime');
			$table->dateTime('CheckOutDateTime');
			$table->integer('LocationId')->unsigned();
			$table->foreign('LocationId')->references('Id')->on('locations');
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
		Schema::drop('checklogs');
	}

}
