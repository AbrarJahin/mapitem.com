<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use APP\Category;
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
		Created At		-> 08//08/2016
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
}
