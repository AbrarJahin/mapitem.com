<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Request;
use Validator;
use App\Category;
use App\GoogleAnalytics;
use Illuminate\Support\Facades\Redirect;

/*
	Functionality	-> Handel All Admin Works
	Access			-> Only Admin
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class AdminController extends Controller
{
	/*
		URL				-> get: /category
		Functionality	-> Show Users Page
		Access			-> Admin
		Created At		-> 30/07/2016
		Updated At		-> 30/07/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function showCategoryView()
	{
		return view('admin.category.main', [ 'current_page'	=> 'admin.category' ]);
	}

	/*
		URL				-> get: /sub-category
		Functionality	-> Show sub-category Page
		Access			-> Admin
		Created At		-> 31/07/2016
		Updated At		-> 06/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function showSubCategoryView()
	{
		return view('admin.sub_category.main',
								[
									'current_page'	=> 'admin.sub_category',
									'categories'	=> Category::orderBy('name')->get()
								]);
	}

	/*
		URL				-> get: /users
		Functionality	-> Show Users Page
		Access			-> Admin
		Created At		-> 30/07/2016
		Updated At		-> 30/07/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function showUserView()
	{
		return view('admin.users.main', [ 'current_page'	=> 'admin.show_users' ]);
	}

	/*
		URL				-> get: /adds
		Functionality	-> Show adds Page
		Access			-> Admin
		Created At		-> 31/07/2016
		Updated At		-> 31/07/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function showAddView()
	{
		return view('admin.adds.main', [
											'current_page'	=> 'admin.adds',
											'categories'	=> Category::orderBy('name')->get()
										]);
	}

	/*
		URL				-> get: /messages
		Functionality	-> Show Messages Page
		Access			-> Admin
		Created At		-> 31/07/2016
		Updated At		-> 31/07/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function showMessageView()
	{
		return view('admin.messages.main', [ 'current_page'	=> 'admin.messages' ]);
	}

	/*
		URL				-> get: /user_offers
		Functionality	-> Show offers Page
		Access			-> Admin
		Created At		-> 31/07/2016
		Updated At		-> 31/07/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function showOfferView()
	{
		return view('admin.offers.main', [ 'current_page'	=> 'admin.offers' ]);
	}

	/*
		URL				-> get: /transactions
		Functionality	-> Show transactions Page
		Access			-> Admin
		Created At		-> 31/07/2016
		Updated At		-> 31/07/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function showTransactionView()
	{
		return view('admin.users.main', [ 'current_page'	=> 'admin.transactions' ]);
	}

	/*
		URL				-> get: /public_pages
		Functionality	-> Show Public Pages
		Access			-> Admin
		Created At		-> 26/04/2017
		Updated At		-> 26/04/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function showPublicPageView()
	{
		return view('admin.public_pages.main', [ 'current_page'	=> 'admin.public_pages' ]);
	}

	/*
		URL				-> get: /google_analytics
		Functionality	-> Show Google Analytics Page
		Access			-> Admin
		Created At		-> 19/05/2017
		Updated At		-> 19/05/2017
		Created by		-> S. M. Abrar Jahin
	*/
	public function showGoogleAnalyticsView()
	{
		return view('admin.google_analytics.main',
						[
							'current_page'		=> 'admin.google_analytics',
							'google_analytic'	=> GoogleAnalytics::orderBy('route_name', 'asc')->get()
						]);
	}
}
