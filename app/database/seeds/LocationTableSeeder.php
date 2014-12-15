<?php

class LocationTableSeeder extends Seeder {

	public function run() {

		DB::table('locations')->delete();

		Location::create(['LocationName' => 'Admin', 'Admin' => true, 'Password' => Hash::make('projectgenesys')]);
		Location::create(['LocationName' => 'El Cajon North', 'Admin' => false, 'Password' => Hash::make('elcajonnorth')]);
		Location::create(['LocationName' => 'El Cajon South', 'Admin' => false, 'Password' => Hash::make('elcajonsouth')]);
		Location::create(['LocationName' => 'Santee', 'Admin' => false, 'Password' => Hash::make('santee')]);
		Location::create(['LocationName' => 'Lakeside', 'Admin' => false, 'Password' => Hash::make('lakeside')]);
		Location::create(['LocationName' => 'Alpine', 'Admin' => false, 'Password' => Hash::make('alpine')]);

	}

}