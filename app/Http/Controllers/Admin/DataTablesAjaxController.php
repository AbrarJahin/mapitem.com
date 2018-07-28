<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Request;
use Validator;
use Illuminate\Support\Facades\Redirect;
use DB;

/*
	Functionality	-> Handel All Admin Works
	Access			-> Only Admin
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class DataTablesAjaxController extends Controller
{
	/*
		URL				-> post: /category_datable
		Functionality	-> Category Datable AJAX
		Access			-> Admin
		Created At		-> 31/07/2016
		Updated At		-> 01/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function categoryDatableAjax()
	{
		$requestData = Request::all();
		$columns = array(
			// datatable column index  => database column name
			0 => 'categories.name'
		);
		$draw_request_code = $requestData['draw'];
		$searchParameter = $requestData['search']['value'];
		$order_by_value = $columns[$requestData['order'][0]['column']];
		$orderingDirection = $requestData['order'][0]['dir'];
		$limit_start = $requestData['start'];
		$limit_interval = $requestData['length'];
		// Base Quary
		$baseQuery = DB::table('categories')
						->select(
									'categories.name as category_name',
									'categories.id as id'
								);
		$totalData = $baseQuery->count();
		//Applying Filters
		////Search Filtering
		$filtered_query = $baseQuery;
		if (!empty($searchParameter))
		{
			$filtered_query = $filtered_query->where('categories.name', 'like', '%'.$searchParameter.'%');
		}
		$totalFiltered = $filtered_query->count();
		//Ordering
		$filtered_query = $filtered_query->orderBy($order_by_value, $orderingDirection);
		//Limiting for Pagination
		$data = $filtered_query->skip($limit_start)->take($limit_interval)->get();
		$json_data = array(
			"draw"				=> intval($draw_request_code),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"		=> intval($totalData),  // total number of records
			"recordsFiltered"	=> intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"				=> $data   // total data array
		);
		return $json_data;
	}

	/*
		URL				-> post: /sub_category_datable
		Functionality	-> Sub-Category Datable AJAX
		Access			-> Admin
		Created At		-> 31/07/2016
		Updated At		-> 01/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function subCategoryDatableAjax()
	{
		$requestData = Request::all();
		$columns = array(
			// datatable column index  => database column name
			0 => 'categories.name',
			1 => 'sub_categories.name'
		);
		$draw_request_code = $requestData['draw'];
		$searchParameter = $requestData['search']['value'];
		$order_by_value = $columns[$requestData['order'][0]['column']];
		$orderingDirection = $requestData['order'][0]['dir'];
		$limit_start = $requestData['start'];
		$limit_interval = $requestData['length'];
		// Base Quary
		$baseQuery = DB::table('sub_categories')
						->join('categories', 'categories.id', '=', 'sub_categories.category_id')
						->select(
							'sub_categories.id as id',
							'categories.name as category_name',
							'sub_categories.name as sub_category_name'
						);
		$totalData = $baseQuery->count();
		//Applying Filters
		////Search Filtering
		$filtered_query = $baseQuery;
		if (!empty($searchParameter))
		{
			$filtered_query = $filtered_query
									->where(function($query) use ($searchParameter)
									{
										$query
											->where('categories.name', 'like', '%'.$searchParameter.'%')
											->orWhere('sub_categories.name', 'like', '%' . $searchParameter . '%');
									});
		}
		$totalFiltered = $filtered_query->count();
		//Ordering
		$filtered_query = $filtered_query->orderBy($order_by_value, $orderingDirection);
		//Limiting for Pagination
		$data = $filtered_query->skip($limit_start)->take($limit_interval)->get();
		$json_data = array(
			"draw" => intval($draw_request_code),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal" => intval($totalData),  // total number of records
			"recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data" => $data   // total data array
		);
		return $json_data;
	}

	/*
		URL             -> post: /users_datable
		Functionality   -> Users Datable AJAX
		Access          -> Admin
		Created At      -> 02/07/2016
		Updated At      -> 02/08/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function usersDatableAjax()
	{
		$requestData = Request::all();
		$columns = array(
			// datatable column index  => database column name
			0 => 'users.first_name',
			1 => 'users.cell_no',
			2 => 'users.email',
			3 => 'users.created_at'
		);
		$draw_request_code = $requestData['draw'];
		$searchParameter = $requestData['search']['value'];
		$order_by_value = $columns[$requestData['order'][0]['column']];
		$orderingDirection = $requestData['order'][0]['dir'];
		$limit_start = $requestData['start'];
		$limit_interval = $requestData['length'];
		// Base Quary
		$baseQuery = DB::table('users')
						->select(
							'users.id as id',
							DB::raw('CONCAT(first_name," ",last_name) as full_name'),
							'users.cell_no as cell_no',
							'users.email as email',
							DB::raw("DATE_FORMAT(users.created_at,'%d %b, %Y') as created_at")
						);
		$totalData = $baseQuery->count();
		//Applying Filters
		////Search Filtering
		$filtered_query = $baseQuery;
		if (!empty($searchParameter))
		{
			$filtered_query = $filtered_query
									->where(function($query) use ($searchParameter)
									{
										$query
											->where('users.first_name', 'like', '%'.$searchParameter.'%')
											->orWhere('users.last_name', 'like', '%' . $searchParameter . '%')
											->orWhere('users.cell_no', 'like', '%' . $searchParameter . '%')
											->orWhere('users.email', 'like', '%' . $searchParameter . '%')
											->orWhere('users.website', 'like', '%' . $searchParameter . '%')
											->orWhere('users.address', 'like', '%' . $searchParameter . '%');
									});
		}
		$totalFiltered = $filtered_query->count();
		//Ordering
		$filtered_query = $filtered_query->orderBy($order_by_value, $orderingDirection);
		//Limiting for Pagination
		$data = $filtered_query->skip($limit_start)->take($limit_interval)->get();
		$json_data = array(
			"draw" => intval($draw_request_code),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal" => intval($totalData),  // total number of records
			"recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data" => $data   // total data array
		);
		return $json_data;
	}

	/*
		URL             -> post: /adds_datable
		Functionality   -> Ads Datable AJAX
		Access          -> Admin
		Created At      -> 03/07/2016
		Updated At      -> 03/08/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function addsDatableAjax()
	{
		$requestData = Request::all();
		$columns = array(
			// datatable column index  => database column name
			0 => 'advertisements.id',
			1 => 'categories.name',
			2 => 'sub_categories.name',
			3 => 'users.first_name',
			4 => 'advertisements.title',
			5 => 'advertisements.price',
			6 => 'advertisements.description',
			7 => 'advertisements.address',
			8 => 'advertisements.created_at'
		);
		$draw_request_code = $requestData['draw'];
		$searchParameter = $requestData['search']['value'];
		$order_by_value = $columns[$requestData['order'][0]['column']];
		$orderingDirection = $requestData['order'][0]['dir'];
		$limit_start = $requestData['start'];
		$limit_interval = $requestData['length'];
		// Base Quary
		$baseQuery = DB::table('advertisements')
						->join('users', 'users.id', '=', 'advertisements.user_id')
						->join('categories', 'categories.id', '=', 'advertisements.category_id')
						->join('sub_categories', 'sub_categories.id', '=', 'advertisements.sub_category_id')
						->select(
							'advertisements.id as id',
							'categories.name as category',
							'sub_categories.name as sub_category',
							DB::raw('CONCAT(users.first_name," ",users.last_name) as owner'),
							'advertisements.title as title',
							'advertisements.price as price',
							DB::raw('CONCAT( LEFT(advertisements.description , 30) ," ..") as description'),
							DB::raw('CONCAT( LEFT(advertisements.address , 30) ," ..") as address'),
							DB::raw("DATE_FORMAT(advertisements.created_at,'%d %b, %Y') as created_at")
						);
		$totalData = $baseQuery->count();
		//Applying Filters
		////Search Filtering
		$filtered_query = $baseQuery;
		if (!empty($searchParameter))
		{
			$filtered_query = $filtered_query
									->where(function($query) use ($searchParameter)
									{
										$query
											->where('users.first_name', 'like', '%'.$searchParameter.'%')
											->orWhere('users.last_name', 'like', '%' . $searchParameter . '%')
											->orWhere('categories.name', 'like', '%' . $searchParameter . '%')
											->orWhere('sub_categories.name', 'like', '%' . $searchParameter . '%')
											->orWhere('advertisements.title', 'like', '%' . $searchParameter . '%')
											->orWhere('advertisements.price', 'like', '%' . $searchParameter . '%')
											->orWhere('advertisements.description', 'like', '%' . $searchParameter . '%')
											->orWhere('advertisements.address', 'like', '%' . $searchParameter . '%');
									});
		}
		$totalFiltered = $filtered_query->count();
		//Ordering
		$filtered_query = $filtered_query->orderBy($order_by_value, $orderingDirection);
		//Limiting for Pagination
		$data = $filtered_query->skip($limit_start)->take($limit_interval)->get();
		$json_data = array(
			"draw" => intval($draw_request_code),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal" => intval($totalData),  // total number of records
			"recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data" => $data   // total data array
		);
		return $json_data;
	}

	/*
		URL             -> post: /messages_datable
		Functionality   -> Messages Datable AJAX
		Access          -> Admin
		Created At      -> 03/07/2016
		Updated At      -> 03/08/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function messagesDatableAjax()
	{
		$requestData = Request::all();

		$columns = array(
			// datatable column index  => database column name
			0	=>	'advertisements.id',
			1	=>	'advertisements.title',
			2	=>	'owner.first_name',
			3	=>	'sender.first_name',
			4	=>	'receiver.first_name',
			5	=>	'messages.message',
			6	=>	'messages.created_at',
			7	=>	'messages.is_read'
		);
		$draw_request_code = $requestData['draw'];
		//$searchParameter = $requestData['search']['value'];
		$order_by_value = $columns[$requestData['order'][0]['column']];
		$orderingDirection = $requestData['order'][0]['dir'];
		$limit_start = $requestData['start'];
		$limit_interval = $requestData['length'];

		//Get Search Params
		$ad_id		= $requestData['columns'][0]['search']['value'];
		$ad_name	= $requestData['columns'][1]['search']['value'];
		$ad_owner	= $requestData['columns'][2]['search']['value'];
		$sender		= $requestData['columns'][3]['search']['value'];
		$receiver	= $requestData['columns'][4]['search']['value'];
		$message	= $requestData['columns'][5]['search']['value'];
		$sent		= $requestData['columns'][6]['search']['value'];
		$received	= $requestData['columns'][7]['search']['value'];

		// Base Quary
		$baseQuery = DB::table('messages')
						->join('message_threads',	'messages.thread_id',				'=', 'message_threads.id')
						->join('advertisements',	'message_threads.advertisement_id',	'=', 'advertisements.id')
						->join('users as owner',	'advertisements.user_id',			'=', 'owner.id')
						->join('users as sender',	'messages.sender_id',				'=', 'sender.id')
						->join('users as receiver',	'messages.receiver_id',				'=', 'receiver.id')
						->select(
							'messages.id as id',
							'advertisements.id as ad_id',
							'advertisements.title as ad_name',
							DB::raw('CONCAT(owner.first_name," ",owner.last_name) as owner_name'),
							DB::raw('CONCAT(sender.first_name," ",sender.last_name) as sender_name'),
							DB::raw('CONCAT(receiver.first_name," ",receiver.last_name) as receiver_name'),
							'messages.message',
							DB::raw("DATE_FORMAT(messages.created_at,'%D %M, %Y %r') AS sent_time"),
							DB::raw("
										CASE WHEN messages.is_read = 'readed'
											THEN
												DATE_FORMAT(messages.updated_at,'%D %M, %Y %r')
											ELSE
												'Not yet read'
											END
										as read_time"
									)
						);
		$totalData = $baseQuery->count();
		//Applying Filters
		////Search Filtering
		$filtered_query = $baseQuery;

		//Search Param Filter - Start
			if (strlen($ad_id)>0)
			{
				$filtered_query = $filtered_query
										->where(function($query) use ($ad_id)
										{
											$query->where('advertisements.id', 'like', '%'.$ad_id.'%');
										});
			}
			if (strlen($ad_name)>0)
			{
				$filtered_query = $filtered_query
										->where(function($query) use ($ad_name)
										{
											$query->where('advertisements.title', 'like', '%'.$ad_name.'%');
										});
			}
			if (strlen($ad_owner)>0)
			{
				$filtered_query = $filtered_query
										->where(function($query) use ($ad_owner)
										{
											$query->where(DB::raw('CONCAT(owner.first_name," ",owner.last_name)'), 'like', '%'.$ad_owner.'%');
										});
			}
			if (strlen($sender)>0)
			{
				$filtered_query = $filtered_query
										->where(function($query) use ($sender)
										{
											$query->where(DB::raw('CONCAT(sender.first_name," ",sender.last_name)'), 'like', '%'.$sender.'%');
										});
			}
			if (strlen($receiver)>0)
			{
				$filtered_query = $filtered_query
										->where(function($query) use ($receiver)
										{
											$query->where(DB::raw('CONCAT(receiver.first_name," ",receiver.last_name)'), 'like', '%'.$receiver.'%');
										});
			}
			if (strlen($message)>0)
			{
				$filtered_query = $filtered_query
										->where(function($query) use ($message)
										{
											$query->where('messages.message', 'like', '%'.$message.'%');
										});
			}
			if (strlen($sent)>0)
			{
				$filtered_query = $filtered_query
										->where(function($query) use ($sent)
										{
											$query->whereRaw("DATE(messages.created_at) = STR_TO_DATE('".$sent."', '%m/%d/%Y')");
										});
			}
			if (strlen($received)>0)
			{
				$filtered_query = $filtered_query
										->where(function($query) use ($received)
										{
											$query	->where('messages.is_read', 'readed')
													->whereRaw("DATE(messages.updated_at) = STR_TO_DATE('".$received."', '%m/%d/%Y')");
													//->whereRaw('DATE(messages.updated_at) = STR_TO_DATE("?", "%m/%d/%Y")', [$received]);
										});
			}
		//Search Param Filter - End

		$totalFiltered = $filtered_query->count();
		//Ordering
		$filtered_query = $filtered_query->orderBy($order_by_value, $orderingDirection)->orderBy('messages.updated_at', 'ASC');
		//Limiting for Pagination
		$data = $filtered_query->skip($limit_start)->take($limit_interval)->get();
		$json_data = array(
			"draw"				=> intval($draw_request_code),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"		=> intval($totalData),  // total number of records
			"recordsFiltered"	=> intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"				=> $data   // total data array
		);
		return $json_data;
	}

	/*
		URL             -> post: /messages_datable
		Functionality   -> Messages Datable AJAX
		Access          -> Admin
		Created At      -> 03/07/2016
		Updated At      -> 03/08/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function offersDatableAjax()
	{
		$requestData = Request::all();
		$columns = array(
			// datatable column index  => database column name
			0	=>	'advertisements.id',
			1	=>	'advertisements.title',
			2	=>	'owner.first_name',
			3	=>	'sender.first_name',
			4	=>	'offers.price',
			5	=>	'offers.message',
			6	=>	'offers.status'
		);
		$draw_request_code = $requestData['draw'];
		$searchParameter = $requestData['search']['value'];
		$order_by_value = $columns[$requestData['order'][0]['column']];
		$orderingDirection = $requestData['order'][0]['dir'];
		$limit_start = $requestData['start'];
		$limit_interval = $requestData['length'];
		// Base Quary
		$baseQuery = DB::table('offers')
						->join('advertisements',	'offers.add_id',			'=', 'advertisements.id')
						->join('users as owner',	'advertisements.user_id',	'=', 'owner.id')
						->join('users as sender',	'offers.sender_id',			'=', 'sender.id')
						->select(
							'offers.id as id',
							'advertisements.id as ad_id',
							'advertisements.title as ad_name',
							DB::raw('CONCAT(owner.first_name," ",owner.last_name) as owner_name'),
							DB::raw("DATE_FORMAT(advertisements.created_at,'%D %M, %Y %r') AS ad_posting_time"),
							DB::raw("DATE_FORMAT(advertisements.updated_at,'%D %M, %Y %r') AS ad_last_edit_time"),
							DB::raw('CONCAT(sender.first_name," ",sender.last_name) as sender_name'),
							'offers.price as price',
							'offers.message as message',
							DB::raw("DATE_FORMAT(offers.created_at,'%D %M, %Y %r') AS offer_sent_time"),
							DB::raw("
										CASE WHEN offers.status <> 'pending'
											THEN
												DATE_FORMAT(offers.updated_at,'%D %M, %Y %r')
											ELSE
												'Not yet Reviewed'
											END
										as offer_review_time"
									),
							'offers.status as status'
						);
		$totalData = $baseQuery->count();
		//Applying Filters
		////Search Filtering
		$filtered_query = $baseQuery;
		if (!empty($searchParameter))
		{
			$filtered_query = $filtered_query
									->where(function($query) use ($searchParameter)
									{
										$query
											->where('advertisements.title', 'like', '%'.$searchParameter.'%')
											->orWhere('owner.first_name', 'like', '%' . $searchParameter . '%')
											->orWhere('sender.first_name', 'like', '%' . $searchParameter . '%')
											->orWhere('offers.message', 'like', '%' . $searchParameter . '%')
											->orWhere('offers.status', 'like', '%' . $searchParameter . '%');
									});
		}
		$totalFiltered = $filtered_query->count();
		//Ordering
		$filtered_query = $filtered_query->orderBy($order_by_value, $orderingDirection)->orderBy('offers.updated_at', 'ASC');
		//Limiting for Pagination
		$data = $filtered_query->skip($limit_start)->take($limit_interval)->get();
		$json_data = array(
			"draw"				=> intval($draw_request_code),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"		=> intval($totalData),  // total number of records
			"recordsFiltered"	=> intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"				=> $data   // total data array
		);
		return $json_data;
	}

	/*
		URL             -> post: /messages_datable
		Functionality   -> Messages Datable AJAX
		Access          -> Admin
		Created At      -> 03/07/2016
		Updated At      -> 03/08/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function publicPagesDatableAjax()
	{
		$requestData = Request::all();
		$columns = array(
			// datatable column index  => database column name
			0 => 'public_pages.is_enabled',
			1 => 'public_pages.page_order',
			2 => 'public_pages.url',
			3 => 'public_pages.small_title',
			4 => 'public_pages.big_title'
		);
		$draw_request_code = $requestData['draw'];
		$searchParameter = $requestData['search']['value'];
		$order_by_value = $columns[$requestData['order'][0]['column']];
		$orderingDirection = $requestData['order'][0]['dir'];
		$limit_start = $requestData['start'];
		$limit_interval = $requestData['length'];
		// Base Quary
		$baseQuery = DB::table('public_pages')
						->select(
							'public_pages.id as id',
							'public_pages.is_enabled as is_enabled',
							'public_pages.page_order as page_order',
							'public_pages.url as url',
							'public_pages.small_title as small_title',
							'public_pages.big_title as big_title'
						);
		$totalData = $baseQuery->count();
		//Applying Filters
		////Search Filtering
		$filtered_query = $baseQuery;
		if (!empty($searchParameter))
		{
			$filtered_query = $filtered_query
									->where(function($query) use ($searchParameter)
									{
										$query
											->where('public_pages.url', 'like', '%'.$searchParameter.'%')
											->orWhere('public_pages.small_title', 'like', '%' . $searchParameter . '%')
											->orWhere('public_pages.big_title', 'like', '%' . $searchParameter . '%');
									});
		}
		$totalFiltered = $filtered_query->count();
		//Ordering
		$filtered_query = $filtered_query->orderBy($order_by_value, $orderingDirection)->orderBy('public_pages.id', 'ASC');
		//Limiting for Pagination
		$data = $filtered_query->skip($limit_start)->take($limit_interval)->get();
		$json_data = array(
			"draw" => intval($draw_request_code),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal" => intval($totalData),  // total number of records
			"recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data" => $data   // total data array
		);
		return $json_data;
	}
}
