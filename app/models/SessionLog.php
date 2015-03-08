<?php


class SessionLog extends Eloquent {

	protected $primaryKey = 'Id';

	protected $table = 'sessions';

	public function leader() {

		return $this->belongsTo('Leader', 'LeaderId', 'Id');

	}

	public function member() {

		return $this->belongsTo('Member', 'MemberId', 'Id');

	}	

	public function lesson() {

		return $this->hasOne('Lesson', 'Id', 'LessonId');

	}

}