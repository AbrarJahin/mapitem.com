<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;
use View;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function __construct()
	{
		// Sharing data to all the views
		$category = Category::with('SubCategory')->get();
		View::share('categories', $category);
		View::share('total_no_of_adds', 5);
		View::share('no_of_new_offer', 6);
		View::share('no_of_new_message', 4);
	}
}
