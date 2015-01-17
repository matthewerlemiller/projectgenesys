<?php



class Member extends Eloquent {

	// protected $primaryKey = 'MemberId';

	public function checklogs() {

		return $this->hasMany('Checklog', 'MemberId');

	}

	public function school() {

		return $this->hasOne('School', 'MemberId');

	}

	public function sessions() {

		return $this->hasMany('Session', 'MemberId');

	}

}
















