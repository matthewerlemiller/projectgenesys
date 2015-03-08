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
			$table->increments('Id');
			$table->string('NameFirst');
			$table->string('NameMiddle')->nullable();
			$table->string('NameLast');
			$table->date('DateBirth')->nullable();
			$table->string('NumberPhone')->nullable();
			$table->string('AddressEmail')->nullable();
			$table->string('AddressHome')->nullable();
			$table->string('ImagePath')->nullable();
			$table->string('Parent1NameFirst')->nullable();
			$table->string('Parent1NameLast')->nullable();
			$table->string('Parent2NameFirst')->nullable();
			$table->string('Parent2NameLast')->nullable();
			$table->string('Parent1Phone1')->nullable();
			$table->string('Parent1Phone2')->nullable();
			$table->string('Parent2Phone1')->nullable();
			$table->string('Parent2Phone2')->nullable();
			$table->string('EmergNameFirst')->nullable();
			$table->string('EmergNameLast')->nullable();
			$table->string('EmergPhone1')->nullable();
			$table->string('EmergPhone2')->nullable();
			$table->boolean('PermissionSlip')->nullable();
			$table->boolean('Baptized')->nullable();
			$table->boolean('Saved')->nullable();
			$table->boolean('Skatepark')->nullable();
			$table->date('BaptizedDate')->nullable();
			$table->string('Status')->nullable();
			$table->integer('School')->unsigned()->nullable();
			$table->foreign('School')->references('Id')->on('schools');
			$table->string('Gender')->nullable();
			$table->string('Ethnicity')->nullable();
			$table->boolean('M_HsGroup')->nullable();
			$table->boolean('M_HsSmGroup')->nullable();
			$table->boolean('M_JrGroup')->nullable();
			$table->boolean('M_HigherGround')->nullable();
			$table->boolean('M_LeaderCore')->nullable();
			$table->boolean('E_SummerCamp')->nullable();
			$table->boolean('E_WinterCamp')->nullable();
			$table->boolean('E_FutureQuest')->nullable();
			$table->boolean('L_Worship')->nullable();
			$table->boolean('L_HsSmGroup')->nullable();
			$table->boolean('L_JrGroup')->nullable();
			$table->boolean('L_KidsMinistry')->nullable();
			$table->boolean('L_BusMinistry')->nullable();
			$table->boolean('L_HigherGround')->nullable();
			$table->boolean('L_JrStaff')->nullable();
			$table->timestamp('L_JrStaff_Timestamp')->nullable();
			$table->boolean('CheckedIn')->nullable();
			$table->integer('LessonId')->unsigned()->nullable();
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
		Schema::drop('members');
	}

}
