<?php

use Carbon\Carbon;

class LocationController extends BaseController {


	public function all()
	{

		$locations = Location::where('admin', '=', false)->with('leaders')->get();

		return Response::json(['data' => $locations], 200);

	}

}