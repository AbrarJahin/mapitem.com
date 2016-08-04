<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Request;
use APP\Category;

/*
	Functionality	-> Handel All Admin View AJAX Data
	Access			-> Only Admin
	Created At		-> 04/08/2016
	Created by		-> S. M. Abrar Jahin
*/

class ViewAjaxController extends Controller
{
	/*
		URL				-> post: /category_datable
		Functionality	-> Category Datable AJAX
		Access			-> Admin
		Created At		-> 31/07/2016
		Updated At		-> 01/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function categoryViewAjax()
	{
		$requestData = Request::all();
        //return Category::find( $requestData['category_id'] );
        return Category::where('id', $requestData['category_id'])
                    ->select('name')
                    ->first();
	}
}
