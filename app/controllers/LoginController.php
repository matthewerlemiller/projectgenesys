<?php

class LoginController extends BaseController {

	public function getLogin() {

		if(Auth::check()) {

			return Redirect::to('dashboard');

		} else {

			return View::make('login');	

		}

	}

	public function postLogin() {

		$username = Input::get('username');
		$password = Input::get('password');

		if (Auth::attempt(['LocationName' => $username, 'Password' => $password])) {

			return Redirect::to('dashboard');

		} else {

			return Redirect::to('login');

		}

	}

	public function logout() {
		
		Auth::logout();

		return Redirect::to('login');
		
	}

}










