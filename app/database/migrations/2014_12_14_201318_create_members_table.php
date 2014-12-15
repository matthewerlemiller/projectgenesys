<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
			$table->increments('MemberId');
			$table->string('NameFirst');
			$table->string('NameMiddle');
			$table->string('NameLast');
			$table->date('DateBirth');
			$table->string('NumberPhone');
			$table->string('AddressEmail');
			$table->string('AddressHome');
			$table->string('ImagePath');
			$table->string('Parent1NameFirst');
			$table->string('Parent1NameLast');
			$table->string('Parent2NameFirst');
			$table->string('Parent2NameLast');
			$table->string('Parent1Phone1');
			$table->string('Parent1Phone2');
			$table->string('Parent2Phone1');
			$table->string('Parent2Phone2');
			$table->string('EmergNameFirst');
			$table->string('EmergNameLast');
			$table->string('EmergPhone1');
			$table->string('EmergPhone2');
			$table->boolean('PermissionSlip');
			$table->boolean('Baptized');
			$table->boolean('Saved');
			$table->boolean('Skatepark');
			$table->date('BaptizedDate');
			$table->string('status');
			$table->integer('School')->unsigned();
			$table->foreign('School')->references('SchoolId')->on('schools');
			$table->string('Gender');
			$table->string('Ethnicity');
			$table->boolean('M_HsGroup');
			$table->boolean('M_HsSmGroup');
			$table->boolean('M_JrGroup');
			$table->boolean('M_HigherGround');
			$table->boolean('M_LeaderCore');
			$table->boolean('E_SummerCamp');
			$table->boolean('E_WinterCamp');
			$table->boolean('E_FutureQuest');
			$table->boolean('L_Worship');
			$table->boolean('L_HsSmGroup');
			$table->boolean('L_JrGroup');
			$table->boolean('L_KidsMinistry');
			$table->boolean('L_BusMinistry');
			$table->boolean('L_HigherGround');
			$table->boolean('CheckedIn');
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
		Schema::drop('members');
	}

}
