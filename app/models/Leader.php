<?php


class Leader extends Eloquent {

	protected $primaryKey = 'Id';

	public function sessions() {

		return $this->hasMany('Session', 'Id', 'sessionId');

	}

	public function location() {

		return $this->belongsTo('Location', 'Id', 'locationId');

	}

	

}