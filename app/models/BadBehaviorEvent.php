<?php

class BadBehaviorEvent extends Eloquent
{

	protected $table = 'bad_behavior_events';

	public function status() {

		return $this->hasOne('Status', 'Id', 'StatusId');

	}

}