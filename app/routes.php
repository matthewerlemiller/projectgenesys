<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {

	if ( Auth::check() ) {
		return Redirect::to('dashboard');
	} else {
		return Redirect::to('login');
	}

});

Route::get('login', function() {

	if(Auth::check()) {
		return Redirect::to('dashboard');
	} else {
		return View::make('login');	
	}

});

Route::post('login', function() {

	$username = Input::get('username');
	$password = Input::get('password');

	if (Auth::attempt(array('username' => $username, 'password' => $password))) {
		return Redirect::to('dashboard');
	} else {
		return Redirect::to('login');
	}

});

Route::get('logout', function() {

	Auth::logout();

	return Redirect::to('login');

});

Route::get('dashboard', function() {

	if (Auth::check()) {
		return View::make('dashboard');	
	} else {
		return Redirect::to('login');
	}
});



// Route::get('setadmin', function() {
// 	$user = new User;

// 	$user->username = 'admin';
// 	$user->password = Hash::make('projectgenesys');
// 	$user->save();

// 	return "Admin Set";
// });


