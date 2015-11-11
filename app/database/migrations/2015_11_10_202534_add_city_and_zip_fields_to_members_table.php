<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityAndZipFieldsToMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('members', function(Blueprint $table)
		{
			$table->string('city')->nullable();
			$table->string('zip')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('members', function(Blueprint $table)
		{
			$table->dropColumn('city');
			$table->dropColumn('zip');
		});
	}

}
