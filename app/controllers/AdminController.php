<?php


class AdminController extends BaseController {

	public function index() {

		$members = Member::all();

		return View::make('admin-index');

	}

	public function leaders()
	{

		return View::make('admin-leaders');

	}

}