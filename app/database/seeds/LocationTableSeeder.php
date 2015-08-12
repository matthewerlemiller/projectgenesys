<?php

class LocationTableSeeder extends Seeder {

	public function run() {

		DB::table('locations')->delete();

		Location::create(['name' => 'Admin', 'admin' => true, 'password' => Hash::make('projectgenesys')]);
		Location::create(['name' => 'El Cajon North', 'admin' => false, 'password' => Hash::make('elcajonnorth')]);
		Location::create(['name' => 'El Cajon South', 'admin' => false, 'password' => Hash::make('elcajonsouth')]);
		Location::create(['name' => 'Santee', 'admin' => false, 'password' => Hash::make('santee')]);
		Location::create(['name' => 'Lakeside', 'admin' => false, 'password' => Hash::make('lakeside')]);
		Location::create(['name' => 'Alpine', 'admin' => false, 'password' => Hash::make('alpine')]);

	}

}