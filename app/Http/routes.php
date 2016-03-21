<?php

//Testing
	Route::get('/', function ()
	{
		return "OK";
	});

	Route::get('dashboard', function ()
	{
		return "OK";
	});

	Route::get('my_adds', function ()
	{
		return "OK";
	});

	Route::get('offers', function ()
	{
		return "OK";
	});

	Route::get('inbox', function ()
	{
		return "OK";
	});

	Route::get('my_profile', function ()
	{
		return "OK";
	});

	Route::get('account', function ()
	{
		return "OK";
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