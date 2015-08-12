<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotelogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notelogs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('text');
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
		Schema::drop('notelogs');
	}

}
