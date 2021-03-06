<?php

use Carbon\Carbon;

class LocationController extends BaseController {


	public function all()
	{
		$locations = Location::where('admin', '=', false)->with('leaders')->get();
		return Response::json(['data' => $locations], 200);
	}

	/**
	 * Returns leaders for current logged in Location.
	 *
	 * @return Response
	 */
	public function leaders()
	{
		$location = Auth::user();
		$leaders = $location->leaders()->orderBy('firstName', 'ASC')->get();

		return Response::json(['data' => $leaders], 200);

	}

	public function kickouts()
	{
		$locationId = Input::get('locationId');

		$location = Location::find($locationId);
		$kickouts = $location->badBehaviorEvents()->whereHas('status', function($q) {
			$q->where('name', '=', 'Kicked Out');
		})->where('created_at', '>=', Carbon::now()->subDay())->where('active', '=', true)->with('member', 'shift', 'leader')->get();

		return Response::json(['data' => $kickouts], 200);
	}

	/*
	 * Sets lesson goal amount for location
	 */
	public function updateGoal()
	{
		$locationId = Input::get('locationId');
		$goal = Input::get('goal');

		$location = Location::find($locationId);
		$location->goal = $goal;
		$location->save();

		return Response::json(['data' => $goal], 200);
	}

	public function updateDirector()
	{
		$locationId = Input::get('locationId');
		$director = Input::get('director');

		$location = Location::find($locationId);
		$location->director = $director;
		$location->save();

		return Response::json(['data' => $director], 200);
	}
}