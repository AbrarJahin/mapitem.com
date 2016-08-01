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

class EditAjaxController extends Controller
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
}
