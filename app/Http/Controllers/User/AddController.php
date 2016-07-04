<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Request;
use Response;
use Validator;
use App\Advertisement;
use App\AdvertisementImage;
use Auth;

/*
	Functionality	-> Handel All Auth Works
	Access			-> No restriction applied in the class, applied from route if needed
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class AddController extends Controller
{
	/*
		URL				-> POST: /post_add
		Functionality	-> Ad. add post
		Access			-> Anyone who is logged in user
		Created by		-> S. M. Abrar Jahin
	*/
	public function addPost()
	{
		$requestData = Request::all();

		$validator = Validator::make(
										$requestData,						//Validator need to be updated
										[
											'category_id'				=> 'required',
											'sub_category_id'			=> 'required',
											'title'						=> 'required',
											'price'						=> 'required',
											'description'				=> 'required',
											'address'					=> 'required',
											'product_geo_location_lat'				=> 'required',
											'product_geo_location_lon'				=> 'required'
										]
									);
		//Validator Failed
		if ($validator->fails())
		{
			return $validator->errors()->all();
		}

		$advertisement = Advertisement::firstOrCreate(
													[
														'user_id'			=> Auth::user()->id,
														'category_id'		=> $requestData['category_id'],
														'sub_category_id'	=> $requestData['sub_category_id'],
														'title'				=> $requestData['title'],
														'description'		=> $requestData['description'],
														'price'		=> $requestData['description'],
														'address'			=> $requestData['address'],
														'location_lat'		=> $requestData['product_geo_location_lat'],
														'location_lon'		=> $requestData['product_geo_location_lon']
													]);
		return $advertisement->id;
	}

	/*
		URL				-> POST: /add_images
		Functionality	-> Upoad ad. images
		Access			-> Anyone who is logged in user
		Created by		-> S. M. Abrar Jahin
	*/
	public function addImageUpload()
	{
		$requestData = Request::all();

		$validator = Validator::make(
										$requestData,
										[
											'add_id'			=> 'required',
											'uploaded_image'	=> 'image|max:5120'
										]
									);
		//Validator Failed
		if ($validator->fails())
		{
			return $validator->errors()->all();
		}

		$destinationPath = 'uploads'; // upload path

		//Renaming the file
		$extension = $requestData['uploaded_image']->getClientOriginalExtension(); // getting file extension
		$fileName = Auth::user()->id."-".rand(11111, 99999) . '.' . $extension; // renameing image

		$upload_success = $requestData['uploaded_image']->move($destinationPath, $fileName); // uploading file to given path

		if ($upload_success)
		{
			$advertisement = AdvertisementImage::firstOrCreate(
														[
															'advertisement_id'	=> $requestData['add_id'],
															'image_name'		=> $fileName
														]);
			return Response::json($advertisement, 200);
		}
		else
		{
			return Response::json('error', 400);
		}
	}

	/*
		URL				-> POST: /update_advertisement_status
		Functionality	-> Update ad. status
		Access			-> Anyone who is logged in user
		Created by		-> S. M. Abrar Jahin
	*/
	public function addUpdateStatus()
	{
		$requestData = Request::all();

		$advertisement				=	Advertisement::where('id',$requestData['advertisement_id'])
													->where('user_id',Auth::user()->id)
													->first();
		$advertisement->is_active	=	$requestData['status'];
		$advertisement->save();

		return $advertisement;
	}
}
