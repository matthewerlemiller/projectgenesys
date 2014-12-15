<?php


class Session extends Eloquent {

	protected $primaryKey = 'SessionId';

	public function leader() {

		return $this->belongsTo('Leader', 'LeaderId');

	}

	public function member() {

		return $this->belongsTo('Member', 'MemberId');

	}	

	public function lesson() {

		return $this->hasOne('Lesson', 'LessonId');

	}

}