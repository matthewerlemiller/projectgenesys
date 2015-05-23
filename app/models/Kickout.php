<?php


class Kickout extends Eloquent {

	protected $table = 'kickoutlogs';


	public function member() {

		return $this->belongsTo('Member', 'MemberId');

	}

	public function leader() {

		return $this->belongsTo('Leader', 'LeaderId');

	}

}