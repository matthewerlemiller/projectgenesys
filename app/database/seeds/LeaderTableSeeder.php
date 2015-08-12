<?php

use Carbon\Carbon;

class LeaderTableSeeder extends Seeder {

	public function run() {

		DB::table('leaders')->delete();

		$faker = Faker\Factory::create();

		foreach(range(1, 25) as $index) {

			$leader = Leader::create([

				'firstName' => $faker->firstNameMale,
				'lastName' => $faker->lastName,
				'email' => $faker->email,

			]);

		}
		
	}
	
}