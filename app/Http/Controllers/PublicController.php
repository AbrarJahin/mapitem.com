<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use App\Advertisement;
use Request;
use DB;

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
		$requestData = Request::all();
		//Eloquent Query is not applicable here because of bad performance
		/*
		return $advertisements = Advertisement::with('User')
												->with('Category')
												->with('SubCategory')
												->with('AdvertisementImages')
											->get();
		*/
		$tempData = DB::table('advertisements')
				->join('advertisement_images', 'advertisements.id', '=', 'advertisement_images.advertisement_id')
				->join('users', 'advertisements.user_id', '=', 'users.id')
				->select(
							'advertisements.id as id',
							'advertisements.location_lat as lat',
							'advertisements.location_lon as lon',
							'advertisements.price as price',
							'advertisements.title as title',
							'advertisements.description as description',
							'users.user_type as user_image',				//Should be updated later
							'advertisement_images.image_name as advertisement_image'
						)
				->whereBetween('advertisements.location_lat', [ $requestData['lat_min'], $requestData['lat_max'] ])
				->whereBetween('advertisements.location_lon', [ $requestData['lon_min'], $requestData['lon_max'] ])
				->whereBetween('advertisements.price', [ $requestData['price_range_min'], $requestData['price_range_max'] ])
				->whereIn('advertisements.sub_category_id', $requestData['sub_categories'])
				->groupBy('advertisement_images.advertisement_id');
				//$requestData['current_page_no']
				//$requestData['content_per_page']

		//Ordering
		if( $requestData['sort_ordering'] == 'price_asc' )
			$tempData = $tempData->orderBy('price', 'asc');
		else if( $requestData['sort_ordering'] == 'price_desc' )
			$tempData = $tempData->orderBy('price', 'desc');
		/*else if( $requestData['sort_ordering'] == 'rating_desc' )
			$tempData = $tempData->orderBy('name', 'desc');
		else if( $requestData['sort_ordering'] == 'ending_desc' )
			$tempData = $tempData->orderBy('name', 'desc');*/
		else if( $requestData['sort_ordering'] == 'upload_desc' )
			$tempData = $tempData->orderBy('created_at', 'desc');

		//Paginator
		$tempData = $tempData->skip( $requestData['content_per_page']*($requestData['current_page_no']-1) )
							->take($requestData['content_per_page']);

		return $tempData->get();
	}
}
