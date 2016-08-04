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
            3 => 'users.website',
            4 => 'users.date_of_birth',
            5 => 'users.social_security_number_p1',
            6 => 'users.address'
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
                            'users.website as website',
                            'users.date_of_birth as date_of_birth',
                            DB::raw('CONCAT(social_security_number_p1,"-",social_security_number_p2,"-",social_security_number_p3) as social_security_number'),
                            'users.address as address'
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
                                            ->orWhere('users.date_of_birth', 'like', '%' . $searchParameter . '%')
                                            ->orWhere('users.social_security_number_p1', 'like', '%' . $searchParameter . '%')
                                            ->orWhere('users.social_security_number_p2', 'like', '%' . $searchParameter . '%')
                                            ->orWhere('users.social_security_number_p3', 'like', '%' . $searchParameter . '%')
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
        Functionality   -> Adds Datable AJAX
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
            0 => 'categories.name',
            1 => 'sub_categories.name',
            2 => 'users.first_name',
            3 => 'advertisements.title',
            4 => 'advertisements.price',
            5 => 'advertisements.description',
            6 => 'advertisements.address'
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
                            DB::raw('CONCAT( LEFT(advertisements.address , 30) ," ..") as address')
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
            0 => 'categories.name',
            1 => 'sub_categories.name',
            2 => 'users.first_name',
            3 => 'advertisements.title',
            4 => 'advertisements.price',
            5 => 'advertisements.description',
            6 => 'advertisements.address'
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
                            DB::raw('CONCAT( LEFT(advertisements.address , 30) ," ..") as address')
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
}
