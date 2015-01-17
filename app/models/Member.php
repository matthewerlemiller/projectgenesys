<?php



class Member extends Eloquent {

	protected $primaryKey = 'Id';

	public function checklogs() {

		return $this->hasMany('Checklog', 'Id');

	}

	public function school() {

		return $this->hasOne('School', 'Id');

	}

	public function sessions() {

		return $this->hasMany('Session', 'Id');

	}

}
















