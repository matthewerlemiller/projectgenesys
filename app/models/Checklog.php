<?php 

class Checklog extends Eloquent {

	protected $primaryKey = 'Id';

	public function member() {

        return $this->belongsTo('Member', 'MemberId', 'Id');
    }

}