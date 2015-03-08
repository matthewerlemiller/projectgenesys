<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKickoutlogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kickoutlogs', function(Blueprint $table)
		{
			$table->increments('Id');
			$table->integer('MemberId')->unsigned();
			$table->foreign('MemberId')->references('Id')->on('members')->onDelete('cascade');
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
		Schema::drop('kickoutlogs');
	}

}
