<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;
use View;
use DB;
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
				$total_no_of_adds		=	Advertisement::where('user_id', Auth::id())->count();
				$total_no_of_offers		=	DB::table('offers')
												->join('advertisements', 'advertisements.id', '=', 'offers.add_id')
												->where('advertisements.user_id', Auth::user()->id)
												->count();
				$total_no_of_messages	=	DB::table('message_threads')
												->where('sender_id', Auth::user()->id)
												->count()
											+
											DB::table('message_threads')
												->where('receiver_id', Auth::user()->id)
												->count();

				View::share('total_no_of_adds',		$total_no_of_adds);
				View::share('no_of_new_offer',		$total_no_of_offers);
				View::share('no_of_new_message',	$total_no_of_messages);
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
