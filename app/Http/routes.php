<?php

//Public Routes
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
			'as' => 'logout'
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

	Route::get('listing/{sub_category}/{latitude}/{longitude}/{search_for}', [
			'uses' => 'PublicController@listingViewSearch',
			'as' => 'listing-search'
		]);

	//Sub-category Showing - AJAX
	Route::post('find_subcategory', [
			'uses' => 'PublicController@findSubcategory',
			'as' => 'find_subcategory'
		]);

	//Map Item Showing - AJAX
	Route::post('find_map_items', [
			'uses' => 'PublicController@findMapItems',
			'as' => 'find_map_items'
		]);

	//Map Item Showing - AJAX
	Route::post('selected_item_detail', [
			'uses' => 'PublicController@detailedMapItem',
			'as' => 'selected_item_detail'
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

	//My Profile Page
	Route::post('profile_update', [
			'uses' => 'UserController@profileUpdate',
			'as' => '.profile_update'
		]);

	//WishList Page
	Route::get('wishlist', [
			'uses' => 'UserController@myWishList',
			'as' => '.wishlist'
		]);

	//Account Page
	Route::get('account', [
			'uses' => 'UserController@accountView',
			'as' => '.account'
		]);
	//Addvertisement - Start
		//Add Image Upload AJAX
		Route::post('post_add', [
				'uses'	=> 'AddController@addPost',
				'as'	=> '.post_add'
			]);

		//Add Image Upload AJAX
		Route::post('add_images', [
				'uses'	=> 'AddController@addImageUpload',
				'as'	=> '.advertisement_images'
			]);

		//Add Image Upload AJAX
		Route::post('update_add_status', [
				'uses'	=> 'AddController@addUpdateStatus',
				'as'	=> '.update_add_status'
			]);

		//Add Advertisement Review
		Route::post('write_review', [
				'uses'	=> 'AddController@writeReview',
				'as'	=> '.write_review'
			]);
	//Addvertisement - End
});