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
		$leaders = $location->leaders;

		return Response::json(['data' => $leaders], 200);

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