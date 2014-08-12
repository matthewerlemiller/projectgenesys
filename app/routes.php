<?php

// Home Route. Check for login, redirect to dash if true,
// back to login if false.
Route::get('/', array('as' => 'home', function() {

	if ( Auth::check() ) {
		return Redirect::to('dashboard');
	} else {
		return Redirect::to('login');
	}

}));


// Login/Logout routes
Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@logout');


// Dash Route
Route::get('dashboard', function() {

	if (Auth::check()) {

		return View::make('dashboard');	

	} else {

		return Redirect::to('login');
		
	}
});


// Add Member Route.
Route::get('addmember', 'MemberController@getAddMember');
Route::post('addmember', 'MemberController@submitNewMember');




