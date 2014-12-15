<?php

// Home Route. Check for login, redirect to dash if true,
// back to login if false.
Route::get('/', ['before' => 'auth', 'as' => 'home', function() {
	
	return Redirect::route('dashboard');

}]);


// Login/Logout routes
Route::get('login', ['as' => 'login.get', 'uses' => 'LoginController@getLogin']);
Route::post('login', ['as' => 'login.post', 'uses' => 'LoginController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);


// Dash Route
Route::get('dashboard', ['before' => 'auth', 'as' =>'dashboard', function() {

	return View::make('dashboard');	

}]);


//Member Route.
Route::resource('member', 'MemberController');
Route::post('member/search', ['as' => 'searchMembers', 'uses' => 'MemberController@searchMembers']);


//Checkin
Route::get('checkin/{id}', ['as' => 'checkin', 'uses' => 'CheckInController@checkIn']);

//Shift 
Route::get('shift', ['as' => 'shift.index', 'before' => 'auth', 'uses' => 'ShiftController@index']);


//Admin
Route::get('admin', ['as' => 'admin.index', 'before' => 'auth|admin', 'uses' => 'AdminController@index']);
