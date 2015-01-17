<?php


class Leader extends Eloquent {

	// protected $primaryKey = 'LeaderId';

	public function sessions() {

		return $this->hasMany('Session', 'id');

	}

	public function location() {

		return $this->belongsTo('Location', 'id');

	}

	

}