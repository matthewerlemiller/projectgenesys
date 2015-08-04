<?php


class Member extends Eloquent {

	protected $primaryKey = 'Id';

	// protected $timestamps = true;

	public function checklogs() {

		return $this->hasMany('Checklog', 'MemberId', 'Id');

	}

	public function school() {

		return $this->hasOne('School','MemberId', 'Id');

	}

	public function sessions() {

		return $this->hasMany('SessionLog', 'MemberId', 'Id');

	}

	public function badBehaviorEvents() {

		return $this->hasMany('BadBehaviorEvent', 'MemberId', 'Id');

	}

}
















