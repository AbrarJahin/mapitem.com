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
		//return Category::with('SubCategory')->get();
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
																			],
												'categories'			=>	Category::with('SubCategory')->get()
											]);
	}

	/*
		URL             -> get: /listing
		Functionality   -> Show Listing Page
		Access          -> Anyone who is logged in user
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
}
