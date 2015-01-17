<?php



class Member extends Eloquent {

	protected $primaryKey = 'Id';

	public function checklogs() {

		return $this->hasMany('Checklog', 'MemberId', 'Id');

	}

	public function school() {

		return $this->hasOne('School','MemberId', 'Id');

	}

	public function sessions() {

		return $this->hasMany('Session', 'MemberId', 'Id');

	}

}
















