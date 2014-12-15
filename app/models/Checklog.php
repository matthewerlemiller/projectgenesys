<?php 

class Checklog extends Eloquent {

	protected $primaryKey = 'CheckLogId';

	public function user() {

        return $this->belongsTo('Member', 'MemberId', 'id');
    }

}