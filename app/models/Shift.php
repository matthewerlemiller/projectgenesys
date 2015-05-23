<?php

class Shift extends Eloquent {

	protected $primaryKey = 'Id';

	protected $fillable = array('Time', 'Day');

}