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
Route::resource('member', 'MemberController', ['before' => 'auth']);
Route::post('member/search', ['as' => 'member.search', 'uses' => 'MemberController@searchMembers']);
Route::post('member/image', ['as' => 'member.image', 'uses' => 'MemberController@uploadImage']);
// Route::get('member/rank/{memberId}', ['as' => 'member.rank', 'uses' => 'MemberController@getRank']);
Route::get('member/get/{memberId}', ['as' => 'member.get', 'uses' => 'MemberController@get']);

//Checkin
Route::get('checkin/{id}', ['as' => 'checkin', 'uses' => 'CheckInController@checkIn']);
Route::get('checkedin', ['as' => 'getCheckedIn', 'uses' => 'CheckInController@getCheckedIn']);


//Shift
Route::get('shift', ['as' => 'shift.index', 'before' => 'auth', 'uses' => 'ShiftController@index']);


//Admin
Route::get('admin', ['as' => 'admin.index', 'before' => 'auth|admin', 'uses' => 'AdminController@index']);


//Sessions
Route::get('session/{memberId}', ['as' => 'session.get', 'uses' => 'SessionController@get']);
Route::post('session', ['as' => 'session.store', 'uses' => 'SessionController@store']);

//Leader
Route::get('leader/all', ['as' => 'leader.all', 'uses' => 'LeaderController@all']);
Route::post('leader/search', ['as' => 'leader.search', 'uses' => 'LeaderController@search']);

//Lesson
Route::get('lesson', ['as' => 'lesson.get', 'uses' => 'LessonController@get']);


//Shifts
Route::get('shift/get', ['as' => 'shift.get', 'uses' => 'ShiftController@get']);

