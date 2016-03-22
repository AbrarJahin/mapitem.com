<?php

// User Routes
Route::group(['prefix' => '/','namespace' => 'User','middleware' => ['web'],'as' => 'user'], function()
{
	//Dashboard Routes
	Route::get('dashboard', [
			'uses' => 'UserController@dashboardView',
			'as' => '.dashboard'
		]);

	//My Adds Routes
	Route::get('my_adds', [
			'uses' => 'UserController@myAddsView',
			'as' => '.my_adds'
		]);

	//Offers Routes
	Route::get('offers', [
			'uses' => 'UserController@offerView',
			'as' => '.offers'
		]);

	//Inbox Routes
	Route::get('inbox', [
			'uses' => 'UserController@inboxView',
			'as' => '.inbox'
		]);

	//My Profile Routes
	Route::get('profile', [
			'uses' => 'UserController@myProfileView',
			'as' => '.profile'
		]);

	//Account Routes
	Route::get('account', [
			'uses' => 'UserController@accountView',
			'as' => '.account'
		]);
});