<?php


class RankTableSeeder extends Seeder {

	public function run() {

		Rank::create(['name' => 'New', 'abbreviation' => 'N']);
		Rank::create(['name' => 'JV', 'abbreviation' => 'JV']);
		Rank::create(['name' => 'Varsity', 'abbreviation' => 'V']);
		Rank::create(['name' => 'Advanced', 'abbreviation' => 'A']);

	}

}