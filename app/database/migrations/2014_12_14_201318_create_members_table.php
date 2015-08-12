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
			$table->increments('id');
			$table->string('firstName');
			$table->string('middleName')->nullable();
			$table->string('lastName');
			$table->date('birthDate')->nullable();
			$table->string('phone')->nullable();
			$table->string('email')->nullable();
			$table->string('address')->nullable();
			$table->string('image')->nullable();

			$table->string('parent1Name')->nullable();
			$table->string('parent1Phone')->nullable();
			$table->string('parent2Name')->nullable();
			$table->string('parent2Phone')->nullable();

			$table->string('emergencyContactName')->nullable();
			$table->string('emergencyContactPhone')->nullable();

			$table->boolean('permissionSlip')->default(false);
			$table->boolean('baptized')->default(false);
			$table->boolean('saved')->default(false);
			$table->boolean('skatepark')->default(false);
			$table->date('daptizedDate')->nullable();
			// $table->string('status')->nullable();
			$table->integer('schoolId')->unsigned()->nullable();
			$table->foreign('schoolId')->references('id')->on('schools');
			$table->string('gender')->nullable();
			$table->string('ethnicity')->nullable();
			$table->boolean('attendsHighSchoolGroup')->default(false);
			$table->boolean('attendsHighSchoolSmallGroup')->default(false);
			$table->boolean('attendsJrHighGroup')->default(false);
			$table->boolean('attendsHigherGround')->default(false);
			$table->boolean('attendsLeadershipCore')->default(false);
			$table->boolean('attendsSummerCamp')->default(false);
			$table->boolean('attendsWinterCamp')->default(false);
			$table->boolean('attendsFutureQuest')->default(false);
			$table->boolean('leadsWorship')->default(false);
			$table->boolean('leadsHighSchoolSmallGroup')->default(false);
			$table->boolean('leadsJrHighGroup')->default(false);
			$table->boolean('leadsKidsMinistry')->default(false);
			$table->boolean('leadsBusMinistry')->default(false);
			$table->boolean('leadsHigherGround')->default(false);
			$table->boolean('leadsJrStaff')->default(false);
			$table->timestamp('jrStaffDate')->nullable();
			$table->boolean('checkedIn')->default(false);
			$table->integer('lessonId')->unsigned()->nullable();
			$table->foreign('lessonId')->references('id')->on('lessons');
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
