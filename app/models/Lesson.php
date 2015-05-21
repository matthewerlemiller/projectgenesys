<?php


class Lesson extends Eloquent {

	protected $primaryKey = 'Id';

	public function rank() {

		return $this->hasOne('Rank', 'Id', 'LessonRank');

	}

}