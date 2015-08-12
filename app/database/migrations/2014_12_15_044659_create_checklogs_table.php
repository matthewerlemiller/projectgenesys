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
			$table->increments('id');
			$table->integer('memberId')->unsigned();
			$table->foreign('memberId')->references('id')->on('members');
			$table->dateTime('checkInDateTime');
			$table->dateTime('checkOutDateTime');
			$table->integer('locationId')->unsigned();
			$table->foreign('locationId')->references('id')->on('locations');
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
