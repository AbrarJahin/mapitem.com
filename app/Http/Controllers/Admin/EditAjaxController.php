<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use DB;

/*
	Functionality	-> Handel All Admin Works
	Access			-> Only Admin
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class EditAjaxController extends Controller
{
	/*
		URL				-> post: /category_update
		Functionality	-> Category Edit AJAX
		Access			-> Admin
		Created At		-> 06/08/2016
		Updated At		-> 07/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function categoryUpdateAjax()
	{
		$requestData = Request::all();
		return DB::table('categories')
				->where('id', $requestData['category_id'])
				->update(
							[
								'name' => $requestData['category_name']
							]
						);
	}

	/*
		URL				-> post: /sub_category_update
		Functionality	-> Category Edit AJAX
		Access			-> Admin
		Created At		-> 06/08/2016
		Updated At		-> 07/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function subCategoryUpdateAjax()
	{
		$requestData = Request::all();
		return DB::table('sub_categories')
				->where('id', $requestData['sub_category_id'])
				->update(
							[
								'category_id'	=> $requestData['category_id'],
								'name'			=> $requestData['sub_category_name']
							]
						);
	}

	/*
		URL				-> post: /user_update
		Functionality	-> Category Edit AJAX
		Access			-> Admin
		Created At		-> 08/08/2016
		Updated At		-> 08/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function userUpdateAjax()
	{
		$requestData = Request::all();
		return DB::table('users')
				->where('id', $requestData['id'])
				->update(
							[
								'is_enabled'	=> $requestData['is_enabled']
							]
						);
	}
}
