<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use App\Category;
use App\SubCategory;
use App\PublicPage;
use Validator;
use Response;

/*
	Functionality	-> Handel All Admin AJAX Add Works
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

	/*
		URL				-> post: /public_page_add
		Functionality	-> Public Page Add AJAX
		Access			-> Admin
		Created At		-> 29/04/2017
		Updated At		-> 29/04/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function PublicPageAddAjax()
	{
		$requestData = Request::all();
		$requestData['page_order'] = $requestData['page_order'] ?: 0;

		$validator = Validator::make(
										$requestData,						//Validator need to be updated
										[
											'is_enabled'			=> 'required|in:enabled,disabled',
											'page_order'			=> 'required|numeric|min:0|max:255',
											'big_title'				=> 'string|max:255|unique:public_pages,big_title',
											'small_title'			=> 'required|string|max:20|unique:public_pages,small_title',
											'url'					=> 'required|string|max:100|unique:public_pages,url'
										]
									);

		//Validator Failed
		if ($validator->fails())
		{
			return Response::json($validator->errors()->all(), 400);
		}

		return PublicPage::firstOrCreate(
										[
											'page_order'	=> $requestData['page_order'],
											'url'			=> $requestData['url'],
											'small_title'	=> $requestData['small_title'],
											'big_title'		=> $requestData['big_title'],
											'description'	=> $requestData['description'],
											'is_enabled'	=> $requestData['is_enabled']
										]
									);
	}
}
