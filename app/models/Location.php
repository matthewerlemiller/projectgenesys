<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Location extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $hidden = array('password', 'remember_token');

	protected $primaryKey = 'LocationId';

	public function checklogs() {

		return $this->hasMany('Checklog', 'LocationId');

	}

	public function leaders() {

		return $this->hasMany('Leader', 'LocationId');

	}

	public function notelogs() {

		return $this->hasMany('Notelog', 'LocationId');

	}


}
