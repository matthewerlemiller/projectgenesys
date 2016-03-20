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

	public function scopeSearch($query, $q) 
	{
		return empty($q) ? $query : $query->whereRaw("SELECT * FROM person WHERE to_tsvector(firstName, lastName) @@ to_tsquery('$q')", [$q]);
	}

}
















