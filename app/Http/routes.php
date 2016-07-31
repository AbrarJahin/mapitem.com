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

		//Add Update Status - AJAX
		Route::post('update_add_status', [
				'uses'	=> 'AddController@addUpdateStatus',
				'as'	=> '.update_add_status'
			]);

		//Add Detail - AJAX
		Route::post('detail_add', [
				'uses'	=> 'AddController@addDetail',
				'as'	=> '.add_detail'
			]);

		//Add Update - AJAX
		Route::post('update_add', [
				'uses'	=> 'AddController@addUpdate',
				'as'	=> '.update_add'
			]);

		//Add Advertisement Review
		Route::post('write_review', [
				'uses'	=> 'AddController@writeReview',
				'as'	=> '.write_review'
			]);
	//Addvertisement - End
	
	//Inbox Messaging - Start
		//Add Image Upload AJAX
		Route::post('create_message_thread', [
				'uses'	=> 'MessageController@createThread',
				'as'	=> '.create_message_thread'
			]);
		//get All Message List
		Route::post('message_thread_detail', [
				'uses'	=> 'MessageController@threadDetail',
				'as'	=> '.message_thread_detail'
			]);
		//Send New Message From Inbox
		Route::post('inbox_message_send', [
				'uses'	=> 'MessageController@inboxMessageSend',
				'as'	=> '.inbox_message_send'
			]);
	//Inbox Messaging - End
});

//Admin Routes
Route::group(['prefix' => '/','namespace' => 'Admin','middleware' => ['web','admin'],'as' => 'admin'], function()
{
	//Users Page
	Route::get('users', [
			'uses' => 'AdminController@showUserView',
			'as' => '.show_users'
		]);

	//Category Page
	Route::get('category', [
			'uses' => 'AdminController@showCategoryView',
			'as' => '.category'
		]);

	//Sub-category Page
	Route::get('sub-category', [
			'uses' => 'AdminController@showSubCategoryView',
			'as' => '.sub_category'
		]);

	//Adds Page
	Route::get('adds', [
			'uses' => 'AdminController@showAddView',
			'as' => '.adds'
		]);

	//Messages Page
	Route::get('messages', [
			'uses' => 'AdminController@showMessageView',
			'as' => '.messages'
		]);

	//Offers Page
	Route::get('user_offers', [
			'uses' => 'AdminController@showOfferView',
			'as' => '.offers'
		]);

	//Transactions Page
	Route::get('transactions', [
			'uses' => 'AdminController@showTransactionView',
			'as' => '.transactions'
		]);

	//Datatables AJAX - Start
		Route::post('category_datable', [
				'uses' => 'DataTablesAjaxController@categoryDatableAjax',
				'as' => '.category_datable'
			]);

	//Datatables AJAX - End
	
});
