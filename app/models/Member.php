<?php

class Member extends Eloquent {

	public function checklogs() 
	{
		return $this->hasMany('Checklog', 'memberId', 'id');
	}

	public function school() 
	{
		return $this->hasOne('School', 'id', 'schoolId');
	}

	public function sessions() 
	{
		return $this->hasMany('SessionLog', 'memberId', 'id');
	}

	public function badBehaviorEvents() 
	{
		return $this->hasMany('BadBehaviorEvent', 'memberId', 'id');
	}

}
















