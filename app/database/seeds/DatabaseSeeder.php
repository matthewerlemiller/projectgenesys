<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('LocationTableSeeder');
		$this->call('LeaderTableSeeder');
		$this->call('RankTableSeeder');
		$this->call('LessonTableSeeder');
		$this->call('ShiftTableSeeder');
	}

}
