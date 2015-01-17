<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Location extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $hidden = array('password', 'remember_token');

	public function getAuthPassword() {

		return $this->Password;

	}

	// protected $primaryKey = 'LocationId';

	public function checklogs() {

		return $this->hasMany('Checklog', 'id');

	}

	public function leaders() {

		return $this->hasMany('Leader', 'id');

	}

	public function notelogs() {

		return $this->hasMany('Notelog', 'id');

	}


}
