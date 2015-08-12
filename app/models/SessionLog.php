<?php


class SessionLog extends Eloquent {

	protected $table = 'sessions';

	public function leader() {

		return $this->belongsTo('Leader', 'leaderId', 'id');

	}

	public function member() {

		return $this->belongsTo('Member', 'memberId', 'id');

	}	

	public function lesson() {

		return $this->hasOne('Lesson', 'id', 'lessonId');

	}

}