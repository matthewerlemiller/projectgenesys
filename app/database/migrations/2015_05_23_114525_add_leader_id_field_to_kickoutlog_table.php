<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLeaderIdFieldToKickoutlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kickoutlogs', function(Blueprint $table)
		{
			
			$table->integer('LeaderId')->unsigned();
			$table->foreign('LeaderId')->references('Id')->on('leaders');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('kickoutlogs', function(Blueprint $table)
		{
			
			$table->dropForeign('kickoutlogs_LeaderId_foreign');

		});
	}

}
