<?php 

class Checklog extends Eloquent {

		public function user() {

	        return $this->belongsTo('Member', 'MemberId', 'id');
	    }

}