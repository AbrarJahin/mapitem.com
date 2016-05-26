<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Request;
use Response;
use Validator;

/*
	Functionality	-> Handel All Auth Works
	Access			-> No restriction applied in the class, applied from route if needed
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class AddController extends Controller
{
	/*
		URL				-> get: /account
		Functionality	-> Show Dashboard Page
		Access			-> Anyone who is logged in user
		Created At		-> 22/03/2016
		Updated At		-> 22/03/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function addImageUpload()
	{
		$requestData = Request::all();

		$validator = Validator::make(
										$requestData,
										[
											'add_id'				=> 'required',
											'design_estimated_cost'	=> 'image|max:1000'
										]                                        
									);
		//Validator Failed
		if ($validator->fails())
		{
			return $validator->errors()->all();
		}

		/*return [
					'id'	=> $requestData['add_id'],
					//'image'	=> $requestData['uploaded_image']
					'image'	=> $requestData['uploaded_image']
				];*/

		$destinationPath = 'uploads'; // upload path
		$extension = $requestData['uploaded_image']->getClientOriginalExtension(); // getting file extension

		$fileName = rand(11111, 99999) . '.' . $extension; // renameing image
		$upload_success = $requestData['uploaded_image']->move($destinationPath, $fileName); // uploading file to given path

		if ($upload_success)
		{
			return Response::json('success', 200);
		}
		else
		{
			return Response::json('error', 400);
		}
	}
}
