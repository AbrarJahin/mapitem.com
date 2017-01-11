<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use DB;
use Storage;
use App\AdvertisementImage;
use App\Advertisement;
use Log;

/*
	Functionality	-> Handel All Admin Works
	Access			-> Only Admin
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class DeleteAjaxController extends Controller
{
	/*
		URL             -> post: /category_delete
		Functionality   -> Category Delete AJAX
		Access          -> Admin
		Created At      -> 06/08/2016
		Updated At      -> 06/08/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function categoryDeleteAjax()
	{
		$requestData = Request::all();
		return DB::table('categories')
					->where('id', '=', $requestData['id'])
					->delete();
	}

	/*
		URL             -> post: /sub_category_delete
		Functionality   -> Category Delete AJAX
		Access          -> Admin
		Created At      -> 06/08/2016
		Updated At      -> 06/08/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function subCategoryDeleteAjax()
	{
		$requestData = Request::all();
		return DB::table('sub_categories')
					->where('id', '=', $requestData['id'])
					->delete();
	}

	/*
		URL             -> post: /user_delete
		Functionality   -> User Delete AJAX
		Access          -> Admin
		Created At      -> 08/08/2016
		Updated At      -> 08/08/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function userDeleteAjax()
	{
		$requestData = Request::all();
		return DB::table('users')
					->where('id', '=', $requestData['id'])
					->delete();
	}

	/*
		URL             -> post: /advertisement_delete
		Functionality   -> Advertisement Delete AJAX
		Access          -> Admin
		Created At      -> 11/01/2017
		Updated At      -> 11/01/2017
		Created by      -> S. M. Abrar Jahin
	*/
	public function advertisementDeleteAjax()
	{
		$requestData = Request::all();
		$basePath = public_path()."/uploads/";//."me.JPG";

		/*
			return DB::table('users')
					->where('id', '=', $requestData['id'])
					->delete();
		*/

		$images = AdvertisementImage::where('advertisement_id', $requestData['id'])->get();

		foreach ($images as $image)
		{
			$imagePath = $basePath.$image->image_name;

			if(file_exists($imagePath))
			{
				//Storage::Delete($imagePath);
				unlink($imagePath);
			}
			else
			{
				Log::error("File Not Found - ".$imagePath);
			}
		}

		//Advertisement::find($requestData['id'])->delete();
		return DB::table('advertisements')
					->where('id', '=', $requestData['id'])
					->delete();

		return $requestData;
	}
}
