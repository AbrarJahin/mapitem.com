<?php

//Public Routes - not logged in
Route::group(['prefix' => '/','middleware' => ['web','not_loggedin']], function()
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

	//Auth - FB login - URL
	Route::get('auth/facebook', [
			'uses' => 'FacebookController@redirectToProvider',
			'as' => 'facebook.login'
		]);
	Route::get('auth/facebook/callback', [
			'uses' => 'FacebookController@handleProviderCallback',
			'as' => 'facebook.login_callback'
		]);

	//Auth - Google login - URL
	Route::get('auth/google', [
			'uses' => 'GoogleController@redirectToProvider',
			'as' => 'google.login'
		]);
	Route::get('auth/google/callback', [
			'uses' => 'GoogleController@handleProviderCallback',
			'as' => 'google.login_callback'
		]);

	//Auth - Password Recovery
	Route::post('auth/reset_password', [
			'uses' => 'AuthController@resetPasswordProcess',
			'as' => 'reset_password'
		]);

	Route::get('auth/password_recover/{recover_token}', [
			'uses' => 'AuthController@recoverPassword',
			'as' => 'password_recover'
		]);

	Route::post('auth/password_recover', [
			'uses' => 'AuthController@recoverPasswordProcess',
			'as' => 'password_recover_post'
		]);
});

//Public Routes - Open for all
Route::group(['prefix' => '/','middleware' => ['web']], function()
{
	//Auth - logout
	Route::get('logout', [
			'uses' => 'AuthController@userLogout',
			'as' => 'logout'
		]);

	//Get Suggestion
	Route::post('get_suggestion', [
			'uses' => 'PublicController@getSuggestion',
			'as' => 'get_suggestion'
		]);
});

//Public Routes - Can't be accessed by Admin
Route::group(['prefix' => '/','middleware' => ['web','non_admin']], function()
{
	//Index Page
	Route::get('/', [
			'uses' => 'PublicController@index',
			'as' => 'index'
		]);

	//Index Page
	Route::post('index_items', [
			'uses' => 'PublicController@indexItemsAjax',
			'as' => 'index_items'
		]);

	//listing Page
	Route::get('listing', [
			'uses' => 'PublicController@listingView',
			'as' => 'listing'
		]);

	Route::get('listing/{search_location}/{latitude}/{longitude}/{lat_min}/{lon_min}/{lat_max}/{lon_max}/{search_for}', [
			'uses' => 'PublicController@listingViewSearch',
			'as' => 'listing-search'
		]);

	Route::get('listing/{search_location}/{latitude}/{longitude}/{lat_min}/{lon_min}/{lat_max}/{lon_max}', [
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

	//Get Public Page
	Route::get('info/{url}', [
			'uses' => 'PublicController@getPublicPage',
			'as' => 'public_page'
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

	//WishList Page - Start
		Route::get('wishlist', [
				'uses' => 'UserController@myWishList',
				'as' => '.wishlist'
			]);
		//Find only wishlisted items from map
		Route::post('find_wishlisted_map_items', [
				'uses' => 'UserController@findWishlistedMapItems',
				'as' => '.find_wishlisted_map_items'
			]);
	//WishList Page - End

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

		//Add Image AJAX- Start
			 //Upload Image
			Route::post('add_images', [
					'uses'	=> 'AddController@addImageUpload',
					'as'	=> '.advertisement_images'
				]);
			//Delete Image
			Route::delete('delete_image', [
					'uses'	=> 'AddController@deleteUploadedImage',
					'as'	=> '.delete_advertisement_images'
				]);
			//Show Server Images
			Route::post('all_images', [
					'uses'	=> 'AddController@showAllAddImages',
					'as'	=> '.existing_advertisement_images'
				]);
		//Add Image - End

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

		//Send Advertisement Offer
		Route::post('send_offer', [
				'uses'	=> 'AddController@sendOffer',
				'as'	=> '.send_offer'
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
	
	//Offer Status - Start
		//Add Image Upload AJAX
		Route::post('update_offer_status', [
				'uses'	=> 'UserController@updateOffer',
				'as'	=> '.update_offer_status'
			]);
	//Offer Status - End

	//Notification Settings - Start
		//Notification Settings AJAX
		Route::post('update_notification_settings', [
				'uses'	=> 'UserController@updateNotificationSettings',
				'as'	=> '.update_notification_settings'
			]);
	//Notification Settings - End

	//Password Update AJAX
	Route::post('auth/update_password', [
			'uses'		=> 'UserController@updatePassword',
			'as'		=> '.update_password'
		]);

	//Add wishlist AJAX
	Route::post('add_user_wishlist', [
			'uses'		=> 'WishListController@addWishlist',
			'as'		=> '.add_wishlist'
		]);
});

//Admin Routes
Route::group(['prefix' => '/','namespace' => 'Admin','middleware' => ['web','admin'],'as' => 'admin'], function()
{
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

	//Users Page
	Route::get('users', [
			'uses' => 'AdminController@showUserView',
			'as' => '.show_users'
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

	//Pulic Pages Manage Page
	Route::get('public_pages', [
			'uses' => 'AdminController@showPublicPageView',
			'as' => '.public_pages'
		]);

	//Datatables AJAX - Start
		Route::post('category_datable', [
				'uses' => 'DataTablesAjaxController@categoryDatableAjax',
				'as' => '.category_datable'
			]);

		Route::post('sub_category_datable', [
				'uses' => 'DataTablesAjaxController@subCategoryDatableAjax',
				'as' => '.sub_category_datable'
			]);

		Route::post('users_datable', [
				'uses' => 'DataTablesAjaxController@usersDatableAjax',
				'as' => '.users_datable'
			]);

		Route::post('adds_datable', [
				'uses' => 'DataTablesAjaxController@addsDatableAjax',
				'as' => '.adds_datable'
			]);

		Route::post('messages_datable', [
				'uses' => 'DataTablesAjaxController@messagesDatableAjax',
				'as' => '.messages_datable'
			]);

		Route::post('public_pages_datable', [
				'uses' => 'DataTablesAjaxController@publicPagesDatableAjax',
				'as' => '.public_pages_datable'
			]);
	//Datatables AJAX - End

	//Add Data AJAX - Start
		Route::post('category_add', [
				'uses' => 'AddAjaxController@categoryAddAjax',
				'as' => '.category_add'
			]);

		Route::post('sub_category_add', [
				'uses' => 'AddAjaxController@subCategoryAddAjax',
				'as' => '.sub_category_add'
			]);

		Route::post('public_page_add', [
				'uses' => 'AddAjaxController@PublicPageAddAjax',
				'as' => '.public_page_add'
			]);
	//Add Data AJAX - END

	//View Data AJAX - Start
		Route::post('category_view', [
				'uses' => 'ViewAjaxController@categoryViewAjax',
				'as' => '.category_view'
			]);

		Route::post('sub_category_view', [
				'uses' => 'ViewAjaxController@subCategoryViewAjax',
				'as' => '.sub_category_view'
			]);

		Route::post('user_view', [
				'uses' => 'ViewAjaxController@userViewAjax',
				'as' => '.user_view'
			]);

		Route::post('add_view', [
				'uses' => 'ViewAjaxController@AddViewAjax',
				'as' => '.add_view'
			]);

		Route::post('public_page_view', [
				'uses' => 'ViewAjaxController@PublicPageViewAjax',
				'as' => '.public_page_view'
			]);
	//View Data AJAX - END

	//Edit Data AJAX - Start
		Route::post('category_update', [
				'uses' => 'EditAjaxController@categoryUpdateAjax',
				'as' => '.category_update'
			]);

		Route::post('sub_category_update', [
				'uses' => 'EditAjaxController@subCategoryUpdateAjax',
				'as' => '.sub_category_update'
			]);

		Route::post('user_update', [
				'uses' => 'EditAjaxController@userUpdateAjax',
				'as' => '.user_update'
			]);

		Route::post('add_update', [
				'uses' => 'EditAjaxController@AddUpdateAjax',
				'as' => '.add_update'
			]);

		Route::post('public_pages_update', [
				'uses' => 'EditAjaxController@PublicPageUpdateAjax',
				'as' => '.public_pages_update'
			]);
	//Edit Data AJAX - END

	//Delete Data AJAX - Start
		Route::post('category_delete', [
				'uses' => 'DeleteAjaxController@categoryDeleteAjax',
				'as' => '.category_delete'
			]);

		Route::post('sub_category_delete', [
				'uses' => 'DeleteAjaxController@subCategoryDeleteAjax',
				'as' => '.sub_category_delete'
			]);

		Route::post('user_delete', [
				'uses' => 'DeleteAjaxController@userDeleteAjax',
				'as' => '.user_delete'
			]);

		Route::post('advertisement_delete', [
				'uses' => 'DeleteAjaxController@advertisementDeleteAjax',
				'as' => '.advertisement_delete'
			]);

		Route::post('public_page_delete', [
				'uses' => 'DeleteAjaxController@PublicPageDeleteAjax',
				'as' => '.public_page_delete'
			]);
	//Delete Data AJAX - END
});
