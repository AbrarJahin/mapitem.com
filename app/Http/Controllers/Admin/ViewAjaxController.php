<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use APP\Category;
use APP\PublicPage;
use APP\GoogleAnalytics;
use DB;

/*
	Functionality	-> Handel All Admin View AJAX Data
	Access			-> Only Admin
	Created At		-> 04/08/2016
	Created by		-> S. M. Abrar Jahin
*/

class ViewAjaxController extends Controller
{
	/*
		URL				-> post: /category_view
		Functionality	-> Category Datable AJAX
		Access			-> Admin
		Created At		-> 31/07/2016
		Updated At		-> 01/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function categoryViewAjax()
	{
		$requestData = Request::all();
        //return Category::find( $requestData['category_id'] );
        return Category::where('id', $requestData['category_id'])
                    ->select('name')
                    ->first();
	}

	/*
		URL				-> post: /sub_category_view
		Functionality	-> Category Datable AJAX
		Access			-> Admin
		Created At		-> 06/08/2016
		Updated At		-> 06/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function subCategoryViewAjax()
	{
		$requestData = Request::all();
		return DB::table('sub_categories')
				->join('categories', 'categories.id', '=', 'sub_categories.category_id')
				->select(
							'categories.id as category_id',
							'sub_categories.name as name'
						)
				->where('sub_categories.id', '=', $requestData['sub_category_id'])
				->get();
	}

	/*
		URL				-> post: /user_view
		Functionality	-> Category Datable AJAX
		Access			-> Admin
		Created At		-> 08/08/2016
		Updated At		-> 08/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function userViewAjax()
	{
		$requestData = Request::all();
		return DB::table('users')
				->select(
					DB::raw('CONCAT(first_name," ",last_name) as full_name'),
					'users.cell_no as cell_no',
					'users.email as email',
					'users.website as website',
					DB::raw("DATE_FORMAT(users.date_of_birth,'%d %b, %Y') as date_of_birth"),
					DB::raw('CONCAT(social_security_number_p1,"-",social_security_number_p2,"-",social_security_number_p3) as social_security_number'),
					DB::raw('CONCAT("(",location_latitude,",",location_longitude,")") as user_location'),
					'users.address as address',
					'users.is_enabled as is_enabled'
				)
				->where('id', '=', $requestData['id'])
				->get();
	}

	/*
		URL				-> post: /add_view
		Functionality	-> View Datable's add detail with AJAX
		Access			-> Admin
		Created At		-> 13/05/2017
		Updated At		-> 13/05/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function AddViewAjax()
	{
		$requestData = Request::all();

		return DB::table('advertisements')
				->join('users', 'users.id', '=', 'advertisements.user_id')
				->join('categories', 'categories.id', '=', 'advertisements.category_id')
				->join('sub_categories', 'sub_categories.id', '=', 'advertisements.sub_category_id')
				->select(
					'advertisements.title as title',
					'advertisements.description as description',
					'advertisements.price as price',
					DB::raw('CONCAT(users.first_name," ",users.last_name) as owner_name'),
					'categories.name as category_name',
					'sub_categories.name as sub_category_name',
					'advertisements.address as address',
					'advertisements.is_active as is_active'
				)
				->where('advertisements.id', '=', $requestData['add_id'])
				->get();
	}

	/*
		URL				-> post: /public_page_view
		Functionality	-> Public Page iew AJAX
		Access			-> Admin
		Created At		-> 29/04/2017
		Updated At		-> 29/04/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function PublicPageViewAjax()
	{
		$requestData = Request::all();
		return PublicPage::findOrFail($requestData['id']);
	}

	/*
		URL				-> post: /google_analytics_view
		Functionality	-> Google Analytics iew AJAX
		Access			-> Admin
		Created At		-> 20/05/2017
		Updated At		-> 20/05/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function GoogleAnalyticsViewAjax()
	{
		$requestData = Request::all();
		return GoogleAnalytics::findOrFail($requestData['id']);
	}
}
