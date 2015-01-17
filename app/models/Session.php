<?php


class Session extends Eloquent {

	protected $primaryKey = 'Id';

	public function leader() {

		return $this->belongsTo('Leader', 'Id');

	}

	public function member() {

		return $this->belongsTo('Member', 'Id');

	}	

	public function lesson() {

		return $this->hasOne('Lesson', 'Id');

	}

}