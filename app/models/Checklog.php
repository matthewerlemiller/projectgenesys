<?php 

class Checklog extends Eloquent {

	protected $primaryKey = 'CheckLogId';

	public function member() {

        return $this->belongsTo('Member', 'MemberId', 'MemberId');
    }

}