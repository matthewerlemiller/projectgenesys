<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sessions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('leaderId')->unsigned();
			$table->foreign('leaderId')->references('id')->on('leaders');
			$table->integer('memberId')->unsigned();
			$table->foreign('memberId')->references('id')->on('members');
			$table->integer('lessonId')->unsigned();
			$table->foreign('lessonId')->references('id')->on('lessons');
			$table->text('comments')->nullable();
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
		Schema::drop('sessions');
	}

}
