<?php

class LoginController extends BaseController {

	public function getLogin() {

		if(Auth::check()) {

			return Redirect::to('dashboard');

		} else {

			// $locations = Location::orderBy('Id', 'asc')->get();
			$locations = Location::all();
			$locationsSelect = [];

			foreach($locations as $location) {

				$locationsSelect[$location->LocationId] = $location->LocationName;

			}

			return View::make('login', ['locationsSelect' => $locationsSelect]);	

		}

	}

	public function postLogin() {

		$location = Input::get('location');
		$password = Input::get('password');

		if (Auth::attempt(['Id' => $location, 'password' => $password])) {

			return Redirect::to('dashboard');

		} else {

			return Redirect::route('login.get');

		}

	}

	public function logout() {
		
		Auth::logout();

		return Redirect::route('login.get');
		
	}

}










