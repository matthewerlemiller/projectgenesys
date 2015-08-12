<?php

class ShiftsTableSeeder extends Seeder {

	public function run()
	{
	
		Shift::create(['day' => 'Monday', 'time' => '3 - 6']);
		Shift::create(['day' => 'Monday', 'time' => '6 - 8']);
		Shift::create(['day' => 'Tuesday', 'time' => '3 - 6']);
		Shift::create(['day' => 'Tuesday', 'time' => '6 - 8']);
		Shift::create(['day' => 'Wednesday', 'time' => '3 - 6']);
		Shift::create(['day' => 'Wednesday', 'time' => '6 - 8']);
		Shift::create(['day' => 'Thursday', 'time' => '3 - 6']);
		Shift::create(['day' => 'Thursday', 'time' => '6 - 8']);
		Shift::create(['day' => 'Friday', 'time' => '3 - 6']);
		Shift::create(['day' => 'Friday', 'time' => '6 - 8']);
		Shift::create(['day' => 'Saturday', 'time' => '12 - 3']);
		Shift::create(['day' => 'Saturday', 'time' => '3 - 6']);
		Shift::create(['day' => 'Sunday', 'time' => '12 - 3']);
		Shift::create(['day' => 'Sunday', 'time' => '3 - 6']);


	}

}