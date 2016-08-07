<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use App\Category;
use App\SubCategory;

/*
	Functionality	-> Handel All Admin Works
	Access			-> Only Admin
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class AddAjaxController extends Controller
{
	/*
		URL				-> post: /category_add
		Functionality	-> Category Add AJAX
		Access			-> Admin
		Created At		-> 31/07/2016
		Updated At		-> 01/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function categoryAddAjax()
	{
		$requestData = Request::all();
		return Category::firstOrCreate(
										[
											'name' => $requestData['category_name']
										]
									);
	}

	/*
		URL				-> post: /sub_category_add
		Functionality	-> Sub-Category Add AJAX
		Access			-> Admin
		Created At		-> 07/08/2016
		Updated At		-> 07/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function subCategoryAddAjax()
	{
		$requestData = Request::all();
		return SubCategory::firstOrCreate(
										[
											'category_id'	=> $requestData['category_id'],
											'name'			=> $requestData['sub_category_name']
										]
									);
	}
}
