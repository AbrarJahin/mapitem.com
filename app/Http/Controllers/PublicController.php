<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use App\Advertisement;
use App\PublicPage;
use App\UserAdvertisementView;
use App\GoogleAnalytics;
use Request;
use Auth;
use DB;
use URL;

class PublicController extends Controller
{//A controller to show public pages

	/*
		URL				-> get: /
		Functionality	-> Show Home Page
		Access			-> Anyone who is Not Admin
		Created At		-> 22/03/2016
		Updated At		-> 22/03/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function index()
	{
		$advertisements	=	Advertisement::with('User')
								->with('AdvertisementImages')
								->orderBy('advertisements.created_at', 'desc')
								->take(8)
								->get();
								//->paginate(8);

		return view('public.index.main',
						[
							'current_page'		=>	'Home',
							'advertisements'	=>	$advertisements
						]
					);
	}

	/*
		URL				-> post: /index_items
		Functionality	-> Show Index - Items
		Access			-> Anyone who is not admin
		Created At		-> 16/08/2016
		Updated At		-> 16/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function indexItemsAjax()
	{
		$requestData = Request::all();

		return	DB::table('advertisements')
					->join('advertisement_images', 'advertisements.id', '=', 'advertisement_images.advertisement_id')
					->join('users', 'advertisements.user_id', '=', 'users.id')
					->leftJoin('user_wishlists', function ($join)
								{
									$user_id = 1;
									if(Auth::check())
									{
										$user_id = Auth::user()->id;
									}

									$join->on('user_wishlists.advertisement_id', '=', 'advertisements.id')
										->where('user_wishlists.user_id', '=', $user_id);
								})
					->select(
								'advertisements.id as id',
								'advertisements.price as price',
								'advertisements.title as title',
								'advertisements.description as description',
								//'users.profile_picture as user_image',
								'advertisement_images.image_name as advertisement_image',
								DB::raw(
											"CASE  
												WHEN ISNULL(user_wishlists.advertisement_id) THEN '".URL::asset('svg/normal.svg')."'
												ELSE '".URL::asset('svg/filled.svg')."'
											END as hearts_image"
										),
								DB::raw(
											"CASE  
												WHEN LENGTH(users.profile_picture)>0 THEN users.profile_picture
												ELSE '../images/empty-profile.jpg'
											END as user_image"
										)
							)
					->whereBetween('advertisements.location_lat', [ $requestData['lat_min'], $requestData['lat_max'] ])
					->whereBetween('advertisements.location_lon', [ $requestData['lon_min'], $requestData['lon_max'] ])
					->groupBy('advertisement_images.advertisement_id')
					//->orderBy('advertisements.created_at', 'desc')
					->inRandomOrder()
					->take(8)
					->get();
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
												'current_page'			=>	'Ad Listing',
												'sort_distance_options'	=>	[
																				'price_asc'		=>	'Price - Lowest',
																				'price_desc'	=>	'Price - Highest',
																				'rating_desc'	=>	'Rating - Highest',
																				'ending_desc'	=>	'Ending - Soonest',
																				'upload_desc'	=>	'Newest - Listed'
																			]
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
	public function listingViewSearch($search_location,$lat,$lon,$lat_min,$lon_min,$lat_max,$lon_max,$search_data="")
	{
		return view('public.listing.main', [
												'current_page'			=>	'Ad Listing',
												'sort_distance_options'	=>	[
																				'price_asc'		=>	'Price - Lowest',
																				'price_desc'	=>	'Price - Highest',
																				'rating_desc'	=>	'Rating - Highest',
																				'ending_desc'	=>	'Ending - Soonest',
																				'upload_desc'	=>	'Newest - Listed'
																			],
												'search_location'		=>	$search_location,
												'latitude'				=>	$lat,
												'longitude'				=>	$lon,
												'mapLatMin'				=>	$lat_min,
												'mapLonMin'				=>	$lon_min,
												'mapLatMax'				=>	$lat_max,
												'mapLonMax'				=>	$lon_max,
												'search_data'			=>	$search_data
											]);
	}

	/*
		URL             -> post: /find_subcategory
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
		URL             -> post: /find_map_items
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
		$tempData = DB::table('advertisements')
				->join('advertisement_images', 'advertisements.id', '=', 'advertisement_images.advertisement_id')
				->join('users', 'advertisements.user_id', '=', 'users.id')
				->leftJoin('user_wishlists', function ($join)
								{
									$user_id = 1;
									if(Auth::check())
									{
										$user_id = Auth::user()->id;
									}

									$join->on('user_wishlists.advertisement_id', '=', 'advertisements.id')
										->where('user_wishlists.user_id', '=', $user_id);
								})
				->where('advertisements.is_active', "active")
				->whereBetween('advertisements.location_lat', [ $requestData['lat_min'], $requestData['lat_max'] ])
				->whereBetween('advertisements.location_lon', [ $requestData['lon_min'], $requestData['lon_max'] ])
				->where('advertisements.price', '>', $requestData['price_range_min'])
				->where(function($query) use ($requestData)
					{
						$query
							->where('advertisements.title', 'like', '%'.$requestData['search_value'].'%')
							->orWhere('advertisements.description', 'like', '%'.$requestData['search_value'].'%');
					});

		if( isset($requestData['sub_categories']) )
			$tempData = $tempData->whereIn('advertisements.sub_category_id', $requestData['sub_categories']);
		else
			$tempData = $tempData->whereIn('advertisements.sub_category_id', []);

		if($requestData['price_range_max']!=1000)
			$tempData = $tempData->where('advertisements.price', '<', $requestData['price_range_max']);

		//Should check if there is a better way than using collection in this case
		$totalElementFound = collect(
										$tempData->groupBy('advertisements.id')->pluck('advertisements.id')
									)->count();

		//Ordering
		if( $requestData['sort_ordering'] == 'price_asc' )
			$tempData = $tempData->orderBy('advertisements.price', 'asc');
		else if( $requestData['sort_ordering'] == 'price_desc' )
			$tempData = $tempData->orderBy('advertisements.price', 'desc');
		/*else if( $requestData['sort_ordering'] == 'rating_desc' )
			$tempData = $tempData->orderBy('name', 'desc');
		else if( $requestData['sort_ordering'] == 'ending_desc' )
			$tempData = $tempData->orderBy('name', 'desc');*/
		else if( $requestData['sort_ordering'] == 'upload_desc' )
			$tempData = $tempData->orderBy('advertisements.created_at', 'desc');

		//Paginator
		$data = $tempData->select(
								'advertisements.id as id',
								'advertisements.location_lat as lat',
								'advertisements.location_lon as lon',
								'advertisements.price as price',
								'advertisements.title as title',
								'advertisements.description as description',
								'users.profile_picture as user_image',				//Should be updated later
								'advertisement_images.image_name as advertisement_image',
								DB::raw(
											"CASE  
												WHEN ISNULL(user_wishlists.advertisement_id) THEN '".URL::asset('svg/normal.svg')."'
												ELSE '".URL::asset('svg/filled.svg')."'
											END as hearts_image"
										)
							)
							->groupBy( 'advertisement_images.advertisement_id' )
							->skip( $requestData['content_per_page']*($requestData['current_page_no']-1) )
							->take( $requestData['content_per_page'] )
							->get();
		///////////////////////////////////////////////////////////////////////////////
		$temp_categories = DB::table('advertisements')
								->where('advertisements.is_active', "active")
								->whereBetween('advertisements.location_lat', [ $requestData['lat_min'], $requestData['lat_max'] ])
								->whereBetween('advertisements.location_lon', [ $requestData['lon_min'], $requestData['lon_max'] ])
								->where('advertisements.price', '>', $requestData['price_range_min'])
								->where(function($query) use ($requestData)
									{
										$query
											->where('advertisements.title', 'like', '%'.$requestData['search_value'].'%')
											->orWhere('advertisements.description', 'like', '%'.$requestData['search_value'].'%');
									});
		/*
		if( isset($requestData['sub_categories']) )
			$temp_categories = $temp_categories->whereIn('advertisements.sub_category_id', $requestData['sub_categories']);
		else
			$temp_categories = $temp_categories->whereIn('advertisements.sub_category_id', []);
		*/
		if($requestData['price_range_max']!=1000)
			$temp_categories = $temp_categories->where('advertisements.price', '<', $requestData['price_range_max']);

		$categories = $temp_categories
						->Join('categories', 'advertisements.category_id', '=', 'categories.id')
						->select(
									'categories.id as category_id',
									DB::raw("COUNT('advertisements.id') as count")
								)
						->groupBy('categories.id')
						->get();

		$sub_categories = $temp_categories
							->Join('sub_categories', 'advertisements.sub_category_id', '=', 'sub_categories.id')
							->select(
										'sub_categories.id as sub_category_id',
										DB::raw("COUNT('advertisements.id') as count")
									)
							->groupBy('sub_categories.id')
							->get();
		///////////////////////////////////////////////////////////////////////////////

		//Formetting data for sending
		$json_data	=	array(
						"showing_start"	=>	($totalElementFound > 0 ? ($requestData['current_page_no']-1)*$requestData['content_per_page']+1 : 0),												// Records Show Start
						"showing_end"	=>	min($totalElementFound,$requestData['current_page_no']*$requestData['content_per_page']),												// Records Show End
						"total_element"	=>	$totalElementFound,												// Total number of records
						"total_page"	=>	ceil( $totalElementFound / $requestData['content_per_page'] ),	// total number of pages
						"current_page"	=>	$requestData['current_page_no']/1,								// current page number
						"categories"	=>	$categories,													// Category and sub category array
						"sub-categories"=>	$sub_categories,
						"data"			=>	$data															// total data array
					);

		return $json_data;
	}

	/*
		URL             -> get: /listing
		Functionality   -> Show Listing Page
		Access          -> All
		Created At      -> 22/03/2016
		Updated At      -> 22/03/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function detailedMapItem()
	{
		$requestData = Request::all();

		//Update View count - Start
			$user_id = 1;	//Default User ID for non logged in users
			if(Auth::check())
				$user_id = Auth::user()->id;
			$prev_element = DB::table('user_add_views')
						->where('user_id', $user_id)
						->where('add_id', $requestData['product_id']);
			if($prev_element->count()>0)
			{
				$prev_element=$prev_element->pluck('total_view');
				DB::table('user_add_views')
						->where('user_id', $user_id)
						->where('add_id', $requestData['product_id'])
						->update([
									'total_view' => $prev_element[0]+1
								]);
			}
			else
			{
				DB::table('user_add_views')->insert([
												'user_id'	=>	$user_id,
												'add_id'	=>	$requestData['product_id']
											]);
			}
		//Update View count - End

		//Return the Product detail
		$advertisement = Advertisement::with('AdvertisementImages')
							->find($requestData['product_id']);

		$add_owner	=	DB::table('users')
							->join('user_reviews', 'users.id', '=', 'user_reviews.add_owner_id')
							->select(
									'users.id as user_id',
									'users.is_fb_verified as fb_verification_status',
									DB::raw("
												CASE WHEN users.profile_picture IS NULL or users.profile_picture = ''
													THEN
														'".url('images/empty-profile.jpg')."'
													ELSE
														CONCAT('".url('uploads')."','/', users.profile_picture)
													END
												as profile_picture"
											),
									DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS user_name"),
									//'users.cell_no as cell_no',
									DB::raw('COALESCE(users.cell_no,"") as cell_no'),
									'users.website as website',
									'users.email as email',
									DB::raw("FLOOR( AVG(user_reviews.rating) ) AS user_rating")
								)
							->where('id', $advertisement->user_id)
							->first();

		$reviews = DB::table('user_reviews')
						->join('users', 'users.id', '=', 'user_reviews.user_id')
						->select(
									DB::raw("CONCAT(users.first_name, ' ', users.last_name) AS user_name"),
									'user_reviews.review as review',
									'user_reviews.rating as rating',
									DB::raw("DATE_FORMAT(user_reviews.updated_at,'%m/%d/%Y %H:%i:%s') AS added_on")
								)
						//->where('add_id', $requestData['product_id'])
						->where('add_owner_id', $advertisement->user_id)
						->orderBy('user_reviews.updated_at', 'desc')
						->get();

		return [
					'advertisement'	=>	$advertisement,
					'reviews'		=>	$reviews,
					'add_owner'		=>	$add_owner
				];
	}

	/*
		URL             -> post: /get_suggestion
		Functionality   -> Give Suggestions for Search
		Access          -> All
		Created At      -> 28/11/2016
		Updated At      -> 29/11/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function getSuggestion()
	{
		$requestData = Request::all();

		return DB::table('advertisements')
						->where('title', 'like', '%'.$requestData['search_string'].'%')
						->whereBetween('location_lat', [ $requestData['lat_min'], $requestData['lat_max'] ])
						->whereBetween('location_lon', [ $requestData['lon_min'], $requestData['lon_max'] ])
						->select(
									'title as name'
								)
						->orderBy('title', 'asc')
						->take(5)
						->distinct()
                		->get();
	}

	/*
		URL             -> get: /info/{url}
		Functionality   -> Public pages
		Access          -> All
		Created At      -> 26/04/2017
		Updated At      -> 26/04/2017
		Created by      -> S. M. Abrar Jahin
	*/
	public function getPublicPage($url)
	{
		$publicPage = PublicPage::where('url', $url)->where('is_enabled', 'enabled')->firstOrFail();
		return view('public.public_page.main',
						[
							'current_page'	=>	'Home',
							'public_page'	=>	$publicPage
						]
					);
	}
}
