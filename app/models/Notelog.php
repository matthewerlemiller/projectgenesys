<?php


class Notelog extends Eloquent {

	public function location() {

		return $this->belongsTo('Location', 'locationId', 'id');

	}



}