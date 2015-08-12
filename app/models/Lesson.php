<?php


class Lesson extends Eloquent {

	public function rank() {

		return $this->hasOne('Rank', 'id', 'rankId');

	}

}