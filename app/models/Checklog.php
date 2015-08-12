<?php 

class Checklog extends Eloquent {

	public function member() {

        return $this->belongsTo('Member', 'memberId', 'id');
    }

}