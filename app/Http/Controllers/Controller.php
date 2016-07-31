<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;
use View;
use Auth;
use App\Advertisement;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
	{
		if(Auth::check())	//If user is logged in normal user - then share this data
		{
			if (Auth::user()->user_type == "normal_user")
			{
				$total_no_of_adds = Advertisement::where('user_id', Auth::id())->count();
				View::share('total_no_of_adds', $total_no_of_adds);
				View::share('no_of_new_offer', 6);
				View::share('no_of_new_message', 4);
				/*// Sharing data to all the views
				$category = Category::with('SubCategory')->get();
				View::share('categories', $category);*/
			}
		}

		//Need to be confirm
		//if(!Auth::check() || Auth::user()->user_type == "normal_user")
		{
			// Sharing data to all category the views
			$category = Category::with('SubCategory')->get();
			View::share('categories', $category);
		}
	}
}
