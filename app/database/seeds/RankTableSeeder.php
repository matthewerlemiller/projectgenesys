<?php


class RankTableSeeder extends Seeder {

	public function run() {

		Rank::create(['Rank' => 'Member']);
		Rank::create(['Rank' => 'JV']);
		Rank::create(['Rank' => 'Varsity']);
		Rank::create(['Rank' => 'Advanced']);

	}

}