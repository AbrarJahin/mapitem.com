<?php

//Testing
	Route::get('/', function ()
	{
		return view('welcome');
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
	Route::get('/', [
		'uses'			=> 'LoginController@userLoginView',
		'middleware'	=> 'before_loggedin',
		'as'			=> '.home'
		]);
	Route::get('login', [
		'uses' 			=> 'LoginController@userLoginView',
		'middleware'	=> 'before_loggedin',
		'as' 			=> 'login.view'
		]);
	Route::post('login', [
			'uses' => 'LoginController@userLoginProcess',
			'as' => 'login.process'
		]);
	//Register Routes
	Route::get('register', [
			'uses' => 'LoginController@UserRegisterView',
			//'middleware' => 'admin',
			'as' => 'register.view'
		]);
	Route::post('register', [
			'uses' => 'LoginController@userRegisterProcess',
			'as' => 'register.process'
		]);
	Route::get('logout', [
			'uses' => 'LoginController@userLogout',
			'as' => 'logout'
		]);
});