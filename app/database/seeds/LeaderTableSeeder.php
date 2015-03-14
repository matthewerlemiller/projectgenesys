<?php

class LeaderTableSeeder extends Seeder {

	public function run() {

		DB::table('leaders')->delete();

		// $faker = Faker\Factory::create();

		// foreach(range(1, 25) as $index) {

		// 	$leader = Leader::create([

		// 		'LeaderFirstName' => $faker->firstNameMale,
		// 		'LeaderLastName' => $faker->lastName,
		// 		'Email' => $faker->email,

		// 	]);

		// }

		Leader::create(['LocationId' => 1, 'LeaderFirstName' => 'Jeremy', 'LeaderLastName' => 'Miller', 'Email' => 'random@gmail.com']);
		Leader::create(['LocationId' => 1, 'LeaderFirstName' => 'David', 'LeaderLastName' => 'Matranga', 'Email' => 'random@gmail.com']);
		Leader::create(['LocationId' => 1, 'LeaderFirstName' => 'Josh', 'LeaderLastName' => 'Simmons', 'Email' => 'random@gmail.com']);
		Leader::create(['LocationId' => 1, 'LeaderFirstName' => 'Mark', 'LeaderLastName' => 'Hoffman', 'Email' => 'random@gmail.com']);
		Leader::create(['LocationId' => 1, 'LeaderFirstName' => 'John', 'LeaderLastName' => 'Doe', 'Email' => 'random@gmail.com']);
		
	}
	
}