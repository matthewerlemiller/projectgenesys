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
			$table->integer('LeaderId')->unsigned();
			$table->foreign('LeaderId')->references('Id')->on('leaders');
			$table->integer('MemberId')->unsigned();
			$table->foreign('MemberId')->references('Id')->on('members');
			$table->integer('LessonId')->unsigned();
			$table->foreign('LessonId')->references('Id')->on('lessons');
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
