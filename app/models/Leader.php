<?php


class Leader extends Eloquent {

	protected $fillable = array('firstName', 'lastName', 'email', 'locationId');

	public function sessions() {

		return $this->hasMany('Session', 'id', 'sessionId');

	}

	public function location() {

		return $this->belongsTo('Location', 'id', 'locationId');

	}

	

}