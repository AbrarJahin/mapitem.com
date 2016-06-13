<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Request;

class PublicController extends Controller
{
	//A controller to show public pages
	/*
		URL				-> get: /dashboard
		Functionality	-> Show Dashboard Page
		Access			-> Anyone who is logged in user
		Created At		-> 22/03/2016
		Updated At		-> 22/03/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function index()
	{
		return view('public.index.main',[ 'current_page'   => 'Home' ]);
	}

	/*
		URL             -> get: /listing
		Functionality   -> Show Listing Page
		Access          -> Anyone who is logged in user
		Created At      -> 22/03/2016
		Updated At      -> 22/03/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function listingView()
	{
		return view('public.listing.main', [
												'current_page'			=>	'Add Listing',
												'sort_distance_options'	=>	[
																				'price_asc'		=>	'Price - Lowest',
																				'price_desc'	=>	'Price - Highest',
																				'rating_desc'	=>	'Rating - Highest',
																				'ending_desc'	=>	'Ending - Soonest',
																				'upload_desc'	=>	'Newest - Listed'
																			]
												/*
												,
												'distance_range_options'=>	[
																				'Any Distance',
																				'2',
																				'3',
																				'4',
																				'5',
																				'6',
																				'7',
																			]
												*/
											]);
	}

	/*
		URL             -> get: /listing/sub-cat/lat/lon/search-data
		Functionality   -> Show Listing Page
		Access          -> Anyone who is logged in user
		Created At      -> 22/03/2016
		Updated At      -> 22/03/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function listingViewSearch($sub_cat_id,$lat,$lon,$search_data)
	{
		/*return [
					'cat' => $sub_cat_id,
					'lat' => $lat,
					'lon' => $lon,
					'data' => $search_data,
				];*/
		return view('public.listing.main', [
												'current_page'			=>	'Add Listing',
												'sort_distance_options'	=>	[
																				'Distance - Closest',
																				'2',
																				'3',
																				'4',
																				'5',
																				'6',
																				'7',
																			],
												'distance_range_options'=>	[
																				'Any Distance',
																				'2',
																				'3',
																				'4',
																				'5',
																				'6',
																				'7',
																			]
											]);
	}

	/*
		URL             -> get: /listing
		Functionality   -> Show SubCategory Page
		Access          -> All
		Created At      -> 22/03/2016
		Updated At      -> 22/03/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function findSubcategory()
	{
		$requestData = Request::all();
		return SubCategory::select('id', 'name')
						->where('category_id', $requestData['category_id'])
						->orderBy('name', 'asc')
						->get();
	}

	/*
		URL             -> get: /listing
		Functionality   -> Show Listing Page
		Access          -> All
		Created At      -> 14/06/2016
		Updated At      -> 14/06/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function findMapItems()
	{
		return $requestData = Request::all();
		return SubCategory::select('id', 'name')
						->where('category_id', $requestData['category_id'])
						->orderBy('name', 'asc')
						->get();
	}
}
