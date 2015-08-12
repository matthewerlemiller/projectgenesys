<?php


class StatusesTableSeeder extends Seeder {

	public function run()
	{
		
		Status::create(['name' => 'Good']);
		Status::create(['name' => 'Kicked Out']);
		Status::create(['name' => 'Suspended']);
		
	}

}