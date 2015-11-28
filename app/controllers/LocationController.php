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

}