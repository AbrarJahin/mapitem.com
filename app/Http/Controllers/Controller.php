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
use App\GoogleAnalytics;
use Carbon\Carbon;
use View;
use DB;
use Request;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
	{
		/////////////////Should be removed, it is created because CRON Job is not working////////////////////////////
		DB::table('advertisements')->where('is_active', 'active')
						->where( 'updated_at', '<', Carbon::now()->subDays(env("AD_AUTO_DISABLE_DAY_INTERVAL", 100)))
						->update(['is_active' => 'inactive']);
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
							->where('is_enabled', "enabled")
							->orderBy('page_order', 'DESC')
							->orderBy('id', 'ASC')
							->get();
		View::share('public_pages',	$publicPages);

		$google_analytics = GoogleAnalytics::where('is_enabled', 'enabled')
								->where('route_name', Request::route()->getName());

		if($google_analytics->count()>0)
		{
			View::share('google_analytics_script',	$google_analytics->first()->analytics_script);
		}
	}
}
