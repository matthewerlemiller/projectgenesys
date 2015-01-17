<?php


class Session extends Eloquent {

	protected $primaryKey = 'Id';

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