<?php

// Home Route. Check for login, redirect to dash if true,
// back to login if false.
Route::get('/', array('as' => 'home', function() {

	//if ( Auth::check() ) {
		return Redirect::to('dashboard');
	//} else {
		//return Redirect::to('login');
	//}

}));


// Login/Logout routes
Route::get('login', ['as' => 'login', 'uses' => 'LoginController@getLogin']);
Route::post('login', 'LoginController@postLogin');
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);


// Dash Route
Route::get('dashboard', function() {

	//if (Auth::check()) {

		return View::make('dashboard');	

	//} else {

		return Redirect::to('login');
		
	//}
});


//Member Route.
Route::get('member/', [ 'as' => 'listMembers', 'uses' => 'MemberController@listMembers']);
Route::get('member/create', [ 'as' => 'createMember', 'uses' => 'MemberController@getAddMember']);
Route::post('member/create', 'MemberController@submitNewMember');
Route::get('member/{id}', [ 'as' => 'viewMember', 'uses' => 'MemberController@viewMember']);
Route::get('member/{id}/edit', ['as' => 'getEditMember', 'uses' => 'MemberController@getEditMember']);
Route::put('member/{id}/edit', ['as' => 'postEditMember', 'uses' => 'MemberController@postEditMember']);
Route::post('member/search', ['as' => 'searchMembers', 'uses' => 'MemberController@searchMembers']);


//Checkin
Route::get('checkin/{id}', ['as' => 'checkin', 'uses' => 'CheckInController@checkIn']);




