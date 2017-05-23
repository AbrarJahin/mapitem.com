<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use DB;
use Validator;
use App\PublicPage;
use App\GoogleAnalytics;
use Response;

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
		URL				-> post: /add_update
		Functionality	-> Add Edit AJAX
		Access			-> Admin
		Created At		-> 13/05/2017
		Updated At		-> 13/05/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function AddUpdateAjax()
	{
		$requestData = Request::all();
		return DB::table('advertisements')
				->where('id', $requestData['id'])
				->update(
							[
								'title'			=> $requestData['title'],
								'description'	=> $requestData['description'],
								'price'			=> $requestData['price'],
								'is_active'		=> $requestData['is_active']
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
		$publicPage = PublicPage::find($requestData['id']);	//It is called before validator because it is used in validator

		$validator = Validator::make(
										$requestData,
										[
											'id'			=> 'required',
											'is_enabled'	=> 'required|in:enabled,disabled',
											'page_order'	=> 'required|numeric|min:0|max:255',
											'big_title'		=> 'string|max:255|unique:public_pages,big_title,'.$publicPage->id,				//ID is given to ignore existing item's current element in DB
											'small_title'	=> 'required|string|max:20|unique:public_pages,small_title,'.$publicPage->id,
											'url'			=> 'required|string|max:100|unique:public_pages,url,'.$publicPage->id
										]
									);

		//Validator Failed
		if ($validator->fails())
		{
			return Response::json($validator->errors()->all(), 400);
		}

		$publicPage->big_title		=	$requestData['big_title'];
		$publicPage->description	=	$requestData['description'];
		$publicPage->is_enabled		=	$requestData['is_enabled'];
		$publicPage->page_order		=	$requestData['page_order'];
		$publicPage->small_title	=	$requestData['small_title'];
		$publicPage->url			=	$requestData['url'];
		$publicPage->save();

		return $publicPage;
	}

	/*
		URL				-> post: /google_analytics_update
		Functionality	-> Google Analytics Edit AJAX
		Access			-> Admin
		Created At		-> 20/05/2017
		Updated At		-> 20/05/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function GoogleAnalyticsUpdateAjax()
	{
		$requestData = Request::all();

		$validator = Validator::make(
										$requestData,
										[
											'analytics_script'	=> 'string',
											'detail'			=> 'required|string|max:255',
											'id'				=> 'required|numeric',
											'is_enabled'		=> 'required|in:enabled,disabled',
											'route_name'		=> 'required|string|max:100',
											'url'				=> 'required|string|max:100'
										]
									);

		//Validator Failed
		if ($validator->fails())
		{
			return Response::json($validator->errors()->all(), 400);
		}

		$googleAnalytics = GoogleAnalytics::find($requestData['id']);

		$googleAnalytics->is_enabled		=	$requestData['is_enabled'];
		$googleAnalytics->route_name		=	$requestData['route_name'];
		$googleAnalytics->url				=	$requestData['url'];
		$googleAnalytics->detail			=	$requestData['detail'];
		$googleAnalytics->analytics_script	=	$requestData['analytics_script'];
		$googleAnalytics->save();

		return $googleAnalytics;
	}
}
