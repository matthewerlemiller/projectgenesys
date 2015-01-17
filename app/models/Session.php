<?php


class Session extends Eloquent {

	// protected $primaryKey = 'SessionId';

	public function leader() {

		return $this->belongsTo('Leader', 'id');

	}

	public function member() {

		return $this->belongsTo('Member', 'id');

	}	

	public function lesson() {

		return $this->hasOne('Lesson', 'id');

	}

}