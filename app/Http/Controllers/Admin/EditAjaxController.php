<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use DB;
use Validator;
use App\PublicPage;

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

	/*
		URL				-> post: /public_pages_update
		Functionality	-> Public Page Edit AJAX
		Access			-> Admin
		Created At		-> 29/04/2017
		Updated At		-> 29/04/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function PublicPageUpdateAjax()
	{
		$requestData = Request::all();

		$validator = Validator::make(
										$requestData,						//Validator need to be updated
										[
											'id'			=> 'required',
											'is_enabled'	=> 'required|in:enabled,disabled',
											'page_order'	=> 'required|numeric|min:0|max:255',
											'big_title'		=> 'string|max:255|unique:public_pages,big_title',
											'small_title'	=> 'required|string|max:20|unique:public_pages,small_title',
											'url'			=> 'required|string|max:100|unique:public_pages,url'
										]
									);

		//Validator Failed
		if ($validator->fails())
		{
			return Response::json($validator->errors()->all(), 400);
		}

		$publicPage = User::find($requestData['id']);
		$publicPage->big_title		=	$requestData['big_title'];
		$publicPage->description	=	$requestData['description'];
		$publicPage->is_enabled		=	$requestData['is_enabled'];
		$publicPage->page_order		=	$requestData['page_order'];
		$publicPage->small_title	=	$requestData['small_title'];
		$publicPage->url			=	$requestData['url'];
		$publicPage->save();

		return $publicPage;
	}
}
