<?php

class BadBehaviorEvent extends Eloquent
{

	protected $table = 'bad_behavior_events';

	public function status()
    {
		return $this->hasOne('Status', 'id', 'statusId');
    }

    public function member()
    {
        return $this->hasOne('Member', 'id', 'memberId');
    }

    public function shift()
    {
        return $this->belongsTo('Shift', 'shiftId', 'id');
    }

    public function leader()
    {
        return $this->hasOne('Leader', 'id', 'leaderId');
    }

}