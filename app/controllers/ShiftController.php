<?php


class ShiftController extends BaseController {

	/**
	 * Display shift page
	 *
	 */
	public function index() {
		return View::make('shift');
	}

	public function get() 
	{
		try {
			$shifts = Shift::all();
		} catch (Exception $e) {
			Log::error($e);

			return Response::json(['message' => 'There was an error getting shifts'], 404);
		}

		return Response::json(['data' => $shifts], 200);
	}

}