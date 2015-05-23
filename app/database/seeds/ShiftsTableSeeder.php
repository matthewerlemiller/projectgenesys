<?php

class ShiftsTableSeeder extends Seeder {

	public function run()
	{
	
		Shift::create(['Day' => 'Monday', 'Time' => '3 - 6']);
		Shift::create(['Day' => 'Monday', 'Time' => '6 - 8']);
		Shift::create(['Day' => 'Tuesday', 'Time' => '3 - 6']);
		Shift::create(['Day' => 'Tuesday', 'Time' => '6 - 8']);
		Shift::create(['Day' => 'Wednesday', 'Time' => '3 - 6']);
		Shift::create(['Day' => 'Wednesday', 'Time' => '6 - 8']);
		Shift::create(['Day' => 'Thursday', 'Time' => '3 - 6']);
		Shift::create(['Day' => 'Thursday', 'Time' => '6 - 8']);
		Shift::create(['Day' => 'Friday', 'Time' => '3 - 6']);
		Shift::create(['Day' => 'Friday', 'Time' => '6 - 8']);
		Shift::create(['Day' => 'Saturday', 'Time' => '12 - 3']);
		Shift::create(['Day' => 'Saturday', 'Time' => '3 - 6']);
		Shift::create(['Day' => 'Sunday', 'Time' => '12 - 3']);
		Shift::create(['Day' => 'Sunday', 'Time' => '3 - 6']);


	}

}