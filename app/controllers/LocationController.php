<?php

use Carbon\Carbon;

class LocationController extends BaseController {

	public function __construct() {

		$this->model = Auth::user();
		$this->checkins = $this->model->checklogs();

	}


}