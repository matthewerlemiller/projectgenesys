<?php


class StatusesTableSeeder extends Seeder {

	public function run()
	{
		
		Status::create(['Name' => 'Good']);
		Status::create(['Name' => 'Kicked Out']);
		Status::create(['Name' => 'Suspended']);
		
	}

}