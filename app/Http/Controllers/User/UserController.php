<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Request;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;

/*
	Functionality	-> Handel All Auth Works
	Access			-> No restriction applied in the class, applied from route if needed
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class UserController extends Controller
{
	/*
		URL				-> get: /dashboard
		Functionality	-> Show Dashboard Page
		Access			-> Anyone who is logged in user
		Created At		-> 22/03/2016
		Updated At		-> 22/03/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function dashboardView()
	{
		return view('admin.dashboard.main', [ 'current_page'	=> 'user.dashboard' ]);
	}

	/*
		URL				-> get: /my_adds
		Functionality	-> Show Dashboard Page
		Access			-> Anyone who is logged in user
		Created At		-> 22/03/2016
		Updated At		-> 22/03/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function myAddsView()
	{
		return view('admin.dashboard.main', [ 'current_page'	=> 'user.my_adds' ]);
	}

	/*
		URL				-> get: /offers
		Functionality	-> Show Dashboard Page
		Access			-> Anyone who is logged in user
		Created At		-> 22/03/2016
		Updated At		-> 22/03/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function offerView()
	{
		return view('admin.dashboard.main', [ 'current_page'	=> 'user.offers' ]);
	}

	/*
		URL				-> get: /inbox
		Functionality	-> Show Dashboard Page
		Access			-> Anyone who is logged in user
		Created At		-> 22/03/2016
		Updated At		-> 22/03/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function inboxView()
	{
		return view('admin.dashboard.main', [ 'current_page'	=> 'user.inbox' ]);
	}

	/*
		URL				-> get: /profile
		Functionality	-> Show Dashboard Page
		Access			-> Anyone who is logged in user
		Created At		-> 22/03/2016
		Updated At		-> 22/03/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function myProfileView()
	{
		return view('admin.dashboard.main', [ 'current_page'	=> 'user.profile' ]);
	}

	/*
		URL				-> get: /account
		Functionality	-> Show Dashboard Page
		Access			-> Anyone who is logged in user
		Created At		-> 22/03/2016
		Updated At		-> 22/03/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function accountView()
	{
		return view('admin.dashboard.main', [ 'current_page'	=> 'user.account' ]);
	}
}
