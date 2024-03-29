<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use APP\Category;
use APP\PublicPage;
use APP\GoogleAnalytics;
use DB;

/*
	Functionality	-> Handel All Admin View AJAX Data
	Access			-> Only Admin
	Created At		-> 04/08/2016
	Created by		-> S. M. Abrar Jahin
*/

class ViewAjaxController extends Controller
{
	/*
		URL				-> post: /category_view
		Functionality	-> Category Datable AJAX
		Access			-> Admin
		Created At		-> 31/07/2016
		Updated At		-> 01/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function categoryViewAjax()
	{
		$requestData = Request::all();
		/*
		return Category::where('id', $requestData['category_id'])
					->select('name')
					->first();
		*/
		return DB::table('categories')
					->where('id', $requestData['category_id'])
					->select('name')
					->get();
	}

	/*
		URL				-> post: /sub_category_view
		Functionality	-> Category Datable AJAX
		Access			-> Admin
		Created At		-> 06/08/2016
		Updated At		-> 06/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function subCategoryViewAjax()
	{
		$requestData = Request::all();
		return DB::table('sub_categories')
				->join('categories', 'categories.id', '=', 'sub_categories.category_id')
				->select(
							'categories.id as category_id',
							'sub_categories.name as name'
						)
				->where('sub_categories.id', '=', $requestData['sub_category_id'])
				->get();
	}

	/*
		URL				-> post: /user_view
		Functionality	-> Category Datable AJAX
		Access			-> Admin
		Created At		-> 08/08/2016
		Updated At		-> 08/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function userViewAjax()
	{
		$requestData = Request::all();
		return DB::table('users')
				->select(
					DB::raw('CONCAT(first_name," ",last_name) as full_name'),
					'users.cell_no as cell_no',
					'users.email as email',
					'users.website as website',
					DB::raw("DATE_FORMAT(users.date_of_birth,'%d %b, %Y') as date_of_birth"),
					DB::raw('CONCAT(social_security_number_p1,"-",social_security_number_p2,"-",social_security_number_p3) as social_security_number'),
					DB::raw('CONCAT("(",location_latitude,",",location_longitude,")") as user_location'),
					'users.address as address',
					'users.is_enabled as is_enabled'
				)
				->where('id', '=', $requestData['id'])
				->get();
	}

	/*
		URL				-> post: /add_view
		Functionality	-> View Datable's add detail with AJAX
		Access			-> Admin
		Created At		-> 13/05/2017
		Updated At		-> 13/05/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function AddViewAjax()
	{
		$requestData = Request::all();

		return DB::table('advertisements')
				->join('users', 'users.id', '=', 'advertisements.user_id')
				->join('categories', 'categories.id', '=', 'advertisements.category_id')
				->join('sub_categories', 'sub_categories.id', '=', 'advertisements.sub_category_id')
				->select(
					'advertisements.id as id',
					'advertisements.title as title',
					'advertisements.description as description',
					'advertisements.price as price',
					DB::raw('CONCAT(users.first_name," ",users.last_name) as owner_name'),
					'users.email as owner_email',
					'categories.name as category_name',
					'sub_categories.name as sub_category_name',
					'advertisements.address as address',
					'advertisements.is_active as is_active'
				)
				->where('advertisements.id', '=', $requestData['add_id'])
				->get();
	}

	/*
		URL				-> post: /public_page_view
		Functionality	-> Public Page iew AJAX
		Access			-> Admin
		Created At		-> 29/04/2017
		Updated At		-> 29/04/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function PublicPageViewAjax()
	{
		$requestData = Request::all();
		return PublicPage::findOrFail($requestData['id']);
	}

	/*
		URL				-> post: /google_analytics_view
		Functionality	-> Google Analytics view AJAX
		Access			-> Admin
		Created At		-> 20/05/2017
		Updated At		-> 20/05/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function GoogleAnalyticsViewAjax()
	{
		$requestData = Request::all();
		return GoogleAnalytics::findOrFail($requestData['id']);
	}

	/*
		URL				-> post: /message_view
		Functionality	-> Message view AJAX
		Access			-> Admin
		Created At		-> 19/07/2017
		Updated At		-> 19/07/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function MessageViewAjax()
	{
		$requestData = Request::all();
		return DB::table('messages')
						->join('message_threads',	'messages.thread_id',				'=', 'message_threads.id')
						->join('advertisements',	'message_threads.advertisement_id',	'=', 'advertisements.id')
						->join('users as owner',	'advertisements.user_id',			'=', 'owner.id')
						->join('users as sender',	'messages.sender_id',				'=', 'sender.id')
						->join('users as receiver',	'messages.receiver_id',				'=', 'receiver.id')
						->select(
							'messages.id as id',
							'advertisements.title as title',
							DB::raw('CONCAT(owner.first_name," ",owner.last_name) as owner_name'),
							DB::raw("DATE_FORMAT(advertisements.created_at,'%D %M, %Y %r') AS ad_posting_time"),
							DB::raw("DATE_FORMAT(advertisements.updated_at,'%D %M, %Y %r') AS ad_last_edited_time"),
							DB::raw('CONCAT(sender.first_name," ",sender.last_name) as sender_name'),
							'sender.email as sender_email',
							DB::raw('CONCAT(receiver.first_name," ",receiver.last_name) as receiver_name'),
							'receiver.email as receiver_email',
							'messages.message as messages_text',
							DB::raw("DATE_FORMAT(messages.created_at,'%D %M, %Y %r') AS message_sent_time"),
							DB::raw("
										CASE WHEN messages.is_read = 'readed'
											THEN
												DATE_FORMAT(messages.updated_at,'%D %M, %Y %r')
											ELSE
												'Not yet read'
											END
										as read_time"
									)
						)
						->where('messages.id', '=', $requestData['message_id'])
						->get();
	}
}
