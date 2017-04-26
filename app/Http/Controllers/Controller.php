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
use App\PublicPage;
use View;
use DB;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
	{
		if(Auth::check())	//If user is logged in normal user - then share this data
		{
			if (Auth::user()->user_type == "normal_user")
			{
				$addsCount		=	DB::table('advertisements')
										->where('user_id', Auth::user()->id)
										->where('is_active', 'active')
										->count();

				$offerCount		=	DB::table('offers')
										->join('advertisements', 'advertisements.id', '=', 'offers.add_id')
										->where('advertisements.user_id', Auth::user()->id)
										->where('offers.status', 'pending')
										->count();

				$messageCount	=	DB::table('messages')	//Should be checked if message is read or not, for that migration is added, but not updated in server
										->join('message_threads', 'message_threads.id', '=', 'messages.thread_id')
										->join('advertisements', 'advertisements.id', '=', 'message_threads.advertisement_id')
										->where('advertisements.user_id', Auth::user()->id)
										->count();

				$notifications			=	UserNotification::find( Auth::user()->id );

				View::share('total_no_of_adds',		$notifications['my_adds']);
				View::share('no_of_new_offer',		$notifications['offers']);
				View::share('no_of_new_message',	$notifications['inbox']);

				View::share('adds_count',		$addsCount);
				View::share('offer_count',		$offerCount);
				View::share('message_count',	$messageCount);
			}
		}

		//Need to be confirm
		if(!Auth::check() || Auth::user()->user_type == "normal_user")
		{
			// Sharing data to all category the views
			$category = Category::with('SubCategory')->get();
			View::share('categories', $category);
		}

		//Public page's URL
		$publicPages = PublicPage::select('url', 'small_title')
							->orderBy('page_order', 'DESC')
							->orderBy('id', 'ASC')
							->get();
		View::share('public_pages',	$publicPages);
	}
}
