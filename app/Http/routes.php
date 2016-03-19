<?php

//Testing
	Route::get('/', function ()
	{
		return "OK";
	});

	Route::get('listing', function ()
	{
		return view('welcome');
	});

	Route::get('listing_out', function ()
	{
		return view('welcome');
	});
//Testing End


// Auth Routes
Route::group(['prefix' => '/','middleware' => ['web'],'as' => 'auth'], function()
{
	//Login Routes
	Route::post('login', [
			'uses' => 'LoginController@userLoginProcess',
			'as' => 'login.process'
		]);
	//Register Routes
	Route::post('register', [
			'uses' => 'LoginController@userRegisterProcess',
			'as' => 'register.process'
		]);
	//Logout an user
	Route::any('logout', [
			'uses' => 'LoginController@userLogout',
			'as' => 'logout'
		]);
});