<?php


class Leader extends Eloquent {

	protected $primaryKey = 'Id';

	public function sessions() {

		return $this->hasMany('Session', 'Id');

	}

	public function location() {

		return $this->belongsTo('Location', 'Id');

	}

	

}