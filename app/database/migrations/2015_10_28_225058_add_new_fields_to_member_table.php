<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToMemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('members', function(Blueprint $table)
		{
			$table->dropColumn('attendsSummerCamp');
			$table->boolean('attendsHighSchoolSummerCamp')->default(false);
			$table->boolean('attendsJrHighSummerCamp')->default(false);
			$table->dropColumn('attendsWinterCamp');
			$table->boolean('attendsHighSchoolWinterCamp')->default(false);
			$table->boolean('attendsJrHighWinterCamp')->default(false);
			$table->boolean('attendsYvRetreat')->default(false);
			$table->dropColumn('leadsKidsMinistry');
			$table->boolean('attendsKidsClub')->default(false);
			$table->boolean('leadsKidsClub')->default(false);
			$table->boolean('attendsKidsChurch')->default(false);
			$table->boolean('leadsKidsChurch')->default(false);
			$table->boolean('attendsSundaySchool')->default(false);
			$table->boolean('leadsSundaySchool')->default(false);
			$table->boolean('attendsMission910')->default(false);

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
			
			$table->dropColumn('attendsHighSchoolSummerCamp');
			$table->dropColumn('attendsHighSchoolWinterCamp');
			$table->dropColumn('attendsJrHighSummerCamp');
			$table->dropColumn('attendsJrHighWinterCamp');
			$table->dropColumn('attendsYvRetreat');
			$table->boolean('leadsKidsMinistry')->default(false);
			$table->boolean('attendsSummerCamp')->default(false);
			$table->boolean('attendsWinterCamp')->default(false);
			$table->dropColumn('attendsKidsClub');
			$table->dropColumn('leadsKidsClub');
			$table->dropColumn('attendsKidsChurch');
			$table->dropColumn('leadsKidsChurch');
			$table->dropColumn('attendsSundaySchool');
			$table->dropColumn('leadsSundaySchool');
			$table->dropColumn('attendsMission910');

		});
	}

}
