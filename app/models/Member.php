<?php



class Member extends Eloquent {

	// protected $primaryKey = 'MemberId';

	public function checklogs() {

		return $this->hasMany('Checklog', 'id');

	}

	public function school() {

		return $this->hasOne('School', 'id');

	}

	public function sessions() {

		return $this->hasMany('Session', 'id');

	}

}
















