<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Request;
use Validator;
use Illuminate\Support\Facades\Redirect;

/*
	Functionality	-> Handel All Admin Works
	Access			-> Only Admin
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class DataTablesAjaxController extends Controller
{
	/*
		URL				-> get: /account
		Functionality	-> Show Dashboard Page
		Access			-> Anyone who is logged in user
		Created At		-> 22/03/2016
		Updated At		-> 22/03/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function showAllUsersView()
	{
		return "OK";
		return view('user.account.main', [ 'current_page'	=> 'user.account' ]);
	}
}
