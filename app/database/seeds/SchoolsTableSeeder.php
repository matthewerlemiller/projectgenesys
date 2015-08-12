<?php


class SchoolsTableSeeder extends Seeder {

	public function run()
	{
		
		School::create(['name' => 'Chet F. Herrit', 'type' => 'Middle School']);
		School::create(['name' => 'West Hills High School', 'type' => 'High School']);
		School::create(['name' => 'Santana High School', 'type' => 'High School']);
		School::create(['name' => 'Rio Seco', 'type' => 'Middle School']);
		School::create(['name' => 'Carlton Hills', 'type' => 'Middle School']);
		School::create(['name' => 'El Capitan', 'type' => 'High School']);
		
	}

}