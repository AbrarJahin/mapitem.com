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
							'sub_categories.id as id',
							'categories.id as category_id',
							'sub_categories.name as name'
						)
				->where('sub_categories.id', '=', $requestData['sub_category_id']);
				->get()
				->first();
	}
}
