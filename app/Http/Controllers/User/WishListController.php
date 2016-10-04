<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Request;
use Auth;
use App\UserWishlist;

/*
	Functionality	-> Handel All Auth Works
	Access			-> Only user can access this class
	Created At		-> 04/10/2016
	Created by		-> S. M. Abrar Jahin
*/

class WishListController extends Controller
{
	/*
		URL				-> post: /add_user_wishlist
		Functionality	-> Add a product in wishlist
		Access			-> Anyone who is logged in user
		Created At		-> 04/10/2016
		Updated At		-> 04/10/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function addWishlist()
	{
		$requestData = Request::all();

		$userWishlist = UserWishlist::firstOrCreate([
								'user_id' 			=> Auth::user()->id,
								'advertisement_id'	=>	$requestData['advertisement_id']
							]);
		return $userWishlist;
	}
}