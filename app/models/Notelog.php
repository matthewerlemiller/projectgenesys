<?php


class Notelog extends Eloquent {

	// protected $primaryKey = 'NoteLogId';

	public function location() {

		return $this->belongsTo('Location', 'id');

	}



}