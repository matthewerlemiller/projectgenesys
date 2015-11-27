<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaderLocationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leader_location', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('leaderId');
			$table->foreign('leaderId')->references('id')->on('leaders')->onDelete('cascade');
			$table->integer('locationId');
			$table->foreign('locationId')->references('id')->on('locations')->onDelete('cascade');
			// $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('leader_location');
	}

}
