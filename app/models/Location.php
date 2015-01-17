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

	protected $primaryKey = 'Id';

	public function checklogs() {

		return $this->hasMany('Checklog', 'LocationId', 'Id');

	}

	public function leaders() {

		return $this->hasMany('Leader', 'LocationId', 'Id');

	}

	public function notelogs() {

		return $this->hasMany('Notelog', 'LocationId', 'Id');

	}


}
