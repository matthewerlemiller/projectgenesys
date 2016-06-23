<?php

class CenterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /center
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('center');
	}

	
}