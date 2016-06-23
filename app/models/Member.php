<?php

use Carbon\Carbon;

class Member extends Eloquent
{
    protected $appends = ['status'];

    public function checklogs() 
    {
        return $this->hasMany('Checklog', 'memberId', 'id');
    }

    public function school() 
    {
        return $this->hasOne('School', 'id', 'schoolId');
    }

    public function sessions() 
    {
        return $this->hasMany('SessionLog', 'memberId', 'id');
    }

    public function badBehaviorEvents() 
    {
        return $this->hasMany('BadBehaviorEvent', 'memberId', 'id');
    }

    public function scopeSearch($query, $q) 
    {
        return empty($q) ? $query : $query->whereRaw("SELECT * FROM person WHERE to_tsvector(firstName, lastName) @@ to_tsquery('$q')", [$q]);
    }

    public function getStatusAttribute()
    {
        /* This will need to be updated when we add suspension support, suspensions should last longer than 24 hours */
        $badBehaviorEvents = $this->badBehaviorEvents()->where('created_at', '>=', Carbon::now()->subDay())->where('active', '=', true)->get();

        if (count($badBehaviorEvents)) {
            foreach($badBehaviorEvents as $event) {
                if ($event->status->name === 'Suspended') {
                    return $event->status;
                }
            }
            return $badBehaviorEvents[0]->status;
        }
        $goodStatus = Status::where('name', '=', 'Good')->first();

        return $goodStatus;
    }

}
















