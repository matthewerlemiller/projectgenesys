<?php

class LeaderTableSeeder extends Seeder {

	public function run() {

		DB::table('leaders')->delete();

		$faker = Faker\Factory::create();

		foreach(range(1, 25) as $index) {

			$leader = Leader::create([

				'LeaderFirstName' => $faker->firstNameMale,
				'LeaderLastName' => $faker->lastName,
				'Email' => $faker->email,

			]);

		}
		
	}
	
}