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
			$table->increments('SessionId');
			$table->integer('LeaderId')->unsigned();
			$table->foreign('LeaderId')->references('LeaderId')->on('leaders');
			$table->integer('MemberId')->unsigned();
			$table->foreign('MemberId')->references('MemberId')->on('members');
			$table->integer('LessonId')->unsigned();
			$table->foreign('LessonId')->references('LessonId')->on('lessons');
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
