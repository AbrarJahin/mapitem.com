<?php

Route::group(['prefix' => '/','middleware' => ['web']], function()
{
	//Auth - registration
	Route::post('register', [
			'uses' => 'AuthController@userRegisterProcess',
			'as' => 'register_user'
		]);

	//Auth - login
	Route::post('login', [
			'uses' => 'AuthController@userLoginProcess',
			'as' => 'login'
		]);

	//Auth - logout
	Route::get('logout', [
			'uses' => 'AuthController@userLogout',
			'as' => 'userLogout'
		]);

	//Index Page
	Route::get('/', [
			'uses' => 'PublicController@index',
			'as' => 'index'
		]);

	//listing Page
	Route::get('listing', [
			'uses' => 'PublicController@listingView',
			'as' => 'listing'
		]);
});

// User Routes
Route::group(['prefix' => '/','namespace' => 'User','middleware' => ['web','normal_user'],'as' => 'user'], function()
{
	//Dashboard Page
	Route::get('dashboard', [
			'uses' => 'UserController@dashboardView',
			'as' => '.dashboard'
		]);

	//My Adds Page
	Route::get('my_adds', [
			'uses' => 'UserController@myAddsView',
			'as' => '.my_adds'
		]);

	//Offers Page
	Route::get('offers', [
			'uses' => 'UserController@offerView',
			'as' => '.offers'
		]);

	//Inbox Page
	Route::get('inbox', [
			'uses' => 'UserController@inboxView',
			'as' => '.inbox'
		]);

	//My Profile Page
	Route::get('profile', [
			'uses' => 'UserController@myProfileView',
			'as' => '.profile'
		]);

	//Account Page
	Route::get('account', [
			'uses' => 'UserController@accountView',
			'as' => '.account'
		]);
});