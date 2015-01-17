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
			$table->increments('Id');
			$table->text('Note');
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
		Schema::drop('notelogs');
	}

}
