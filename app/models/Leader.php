<?php


class Leader extends Eloquent {

	protected $primaryKey = 'Id';

	protected $fillable = array('LeaderFirstName', 'LeaderLastName', 'Email', 'LocationId');

	public function sessions() {

		return $this->hasMany('Session', 'Id', 'sessionId');

	}

	public function location() {

		return $this->belongsTo('Location', 'Id', 'locationId');

	}

	

}