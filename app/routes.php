<?php


Route::get('/', ['before' => 'auth', 'as' => 'home', function() {

	if (Auth::user()->admin) {

		return Redirect::route('admin.index');

	}

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
Route::group(['before' => 'auth'], function() {

	Route::resource('member', 'MemberController');
	Route::post('member/search', ['as' => 'member.search', 'uses' => 'MemberController@searchMembers']);
	Route::post('member/image', ['as' => 'member.image', 'uses' => 'MemberController@uploadImage']);
	// Route::get('member/rank/{memberId}', ['as' => 'member.rank', 'uses' => 'MemberController@getRank']);
	Route::get('member/get/{memberId}', ['as' => 'member.get', 'uses' => 'MemberController@get']);
	Route::get('member/status/{memberId}', ['as' => 'member.status', 'uses' => 'MemberController@getStatus']);
	Route::post('member/kickout', ['as' => 'member.kickout', 'uses' => 'MemberController@kickout']);

});

Route::resource('school', 'SchoolController');

//Checkin
Route::get('checkin/today/{locationId?}', ['as' => 'checkin.today', 'uses' => 'CheckInController@getTodayByLocation']);
Route::get('checkin/heatmap/{locationId?}', ['as' => 'checkin.heatmap', 'uses' => 'CheckInController@getHeatmapData']);
Route::get('checkin/totals/{locationId?}', ['as' => 'checkin.totals', 'uses' => 'CheckInController@getTotalsData']);
Route::get('checkin/chart/{locationId?}', ['as' => 'checkin.chart', 'uses' => 'CheckInController@getChartData']);
Route::post('checkin', ['as' => 'checkin.store', 'uses' => 'CheckInController@store']);

//Shift
Route::get('shift', ['as' => 'shift.index', 'before' => 'auth', 'uses' => 'ShiftController@index']);


//Admin
Route::group(array('prefix' => 'admin', 'before' => 'auth|admin'), function() {

    Route::get('dashboard', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
    Route::get('leaders', ['as' => 'admin.leaders', 'uses' => 'AdminController@leaders']);

});

//Sessions
Route::get('session/{memberId}', ['as' => 'session.get', 'uses' => 'SessionController@get']);
Route::post('session', ['as' => 'session.store', 'uses' => 'SessionController@store']);

//Leader
Route::get('leader/all', ['as' => 'leader.all', 'uses' => 'LeaderController@all']);
Route::post('leader/search', ['as' => 'leader.search', 'uses' => 'LeaderController@search']);
Route::post('leader/assign', ['as' => 'leader.assign', 'uses' => 'LeaderController@assignToLocation']);
Route::post('leader/locations', ['as' => 'leader.locations', 'uses' => 'LeaderController@updateLocations']);
Route::post('leader/unassign', ['as' => 'leader.unassign', 'uses' => 'LeaderController@unassignToLocation']);

//Lesson
Route::get('lesson', ['as' => 'lesson.get', 'uses' => 'LessonController@get']);


//Shifts
Route::get('shift/get', ['as' => 'shift.get', 'uses' => 'ShiftController@get']);

//Locations
Route::get('location', ['as' => 'location.all', 'uses' => 'LocationController@all']);






