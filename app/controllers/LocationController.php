<?php

use Carbon\Carbon;

class LocationController extends BaseController {

	public function __construct() {

		$this->model = Auth::user();
		$this->checkins = $this->model->checklogs();

	}

	public function heatmap() {

		$data = [];

		foreach($this->checkins->get() as $checkin) {

			$timestamp = $checkin->checkInDateTime;

			$timestamp = strtotime($timestamp);

			$data[$timestamp] = 1;

		}

		return Response::json(['data' => $data], 200);

	}

	public function totals() {

		$data = [];

		$data['all'] = count($this->checkins->get());

		$data['week'] = count($this->checkins->where('created_at', '>=', Carbon::now()->subWeek())->get());

		$data['month'] = count($this->checkins->where('created_at', '>=', Carbon::now()->subMonth())->get());

		$data['day'] = count($this->checkins->where('created_at', '>=', Carbon::today())->with('member')->get());

		return Response::json(['data' => $data], 200);

	}


}