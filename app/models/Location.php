<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Location extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $hidden = array('password', 'remember_token');

	public function getAuthPassword() {

		return $this->password;

	}

	public function checklogs() {

		return $this->hasMany('Checklog', 'locationId', 'id');

	}

	public function leaders() {

		return $this->hasMany('Leader', 'locationId', 'id');

	}

	public function notelogs() {

		return $this->hasMany('Notelog', 'locationId', 'id');

	}


}
