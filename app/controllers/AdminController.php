<?php


class AdminController extends BaseController {

	public function index() {

		$members = Member::all();

		return View::make('admin',['members' => $members]);

	}

}