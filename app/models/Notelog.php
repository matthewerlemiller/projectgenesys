<?php


class Notelog extends Eloquent {

	protected $primaryKey = 'Id';

	public function location() {

		return $this->belongsTo('Location', 'Id');

	}



}