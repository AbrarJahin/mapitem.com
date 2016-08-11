<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\Category;
use App\UserNotification;
use App\Advertisement;
use View;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
	{
		if(Auth::check())	//If user is logged in normal user - then share this data
		{
			if (Auth::user()->user_type == "normal_user")
			{
				$notifications			=	UserNotification::find( Auth::user()->id );

				View::share('total_no_of_adds',		$notifications['my_adds']);
				View::share('no_of_new_offer',		$notifications['offers']);
				View::share('no_of_new_message',	$notifications['inbox']);
			}
		}

		//Need to be confirm
		if(!Auth::check() || Auth::user()->user_type == "normal_user")
		{
			// Sharing data to all category the views
			$category = Category::with('SubCategory')->get();
			View::share('categories', $category);
		}
	}
}
