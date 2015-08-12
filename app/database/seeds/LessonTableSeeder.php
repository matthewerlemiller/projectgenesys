<?php

class LessonTableSeeder extends Seeder {

	public function run() {

		Lesson::create(['name' => 'JV1', 'rankId' => '2']);
		Lesson::create(['name' => 'JV2', 'rankId' => '2']);
		Lesson::create(['name' => 'JV3', 'rankId' => '2']);
		Lesson::create(['name' => 'Varsity1', 'rankId' => '3']);
		Lesson::create(['name' => 'Varsity2', 'rankId' => '3']);
		Lesson::create(['name' => 'Varsity3', 'rankId' => '3']);
		Lesson::create(['name' => 'Varsity4', 'rankId' => '3']);
		Lesson::create(['name' => 'Advanced1', 'rankId' => '4']);

		
	}
	
}

