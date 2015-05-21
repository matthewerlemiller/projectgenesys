<?php


class RankTableSeeder extends Seeder {

	public function run() {

		Rank::create(['Name' => 'New', 'Abbreviation' => 'N']);
		Rank::create(['Name' => 'JV', 'Abbreviation' => 'JV']);
		Rank::create(['Name' => 'Varsity', 'Abbreviation' => 'V']);
		Rank::create(['Name' => 'Advanced', 'Abbreviation' => 'A']);

	}

}