<?php

class LoginController extends BaseController {

	// GET /login
	// Check for logged in user, redirect to dash if true,
	// back to login if false.
	public function getLogin() {

		if(Auth::check()) {
			return Redirect::to('dashboard');
		} else {
			return View::make('login');	
		}

	}

	// POST /login
	// Collect input fields and attempt login. If successful
	// redirect to dash, if failed redirect to login.
	public function postLogin() {

		$username = Input::get('username');
		$password = Input::get('password');

		if (Auth::attempt(array('username' => $username, 'password' => $password))) {
			return Redirect::to('dashboard');
		} else {
			return Redirect::to('login');
		}

	}

	// GET /logout
	// Logout user, then redirect to login.
	public function logout() {
		
		Auth::logout();
		return Redirect::to('login');
		
	}

}










