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
	public function categoryUpdateAjax()
	{
		return $requestData = Request::all();
	}
}
