<?php

class LessonTableSeeder extends Seeder {

	public function run() {

		Lesson::create(['LessonName' => 'JV1', 'LessonRank' => '2']);
		Lesson::create(['LessonName' => 'JV2', 'LessonRank' => '2']);
		Lesson::create(['LessonName' => 'JV3', 'LessonRank' => '2']);
		Lesson::create(['LessonName' => 'Varsity1', 'LessonRank' => '3']);
		Lesson::create(['LessonName' => 'Varsity2', 'LessonRank' => '3']);
		Lesson::create(['LessonName' => 'Varsity3', 'LessonRank' => '3']);
		Lesson::create(['LessonName' => 'Varsity4', 'LessonRank' => '3']);
		Lesson::create(['LessonName' => 'Advanced1', 'LessonRank' => '4']);

		
	}
	
}

