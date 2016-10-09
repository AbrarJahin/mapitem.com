<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Request;
use Auth;
use App\UserWishlist;
use URL;

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
		$add_status	=	true;
		$message	=	'';
		$hearts_image	=	'';

		$userWishlistItem = UserWishlist::where('user_id',	Auth::user()->id)
										->where('advertisement_id',	$requestData['advertisement_id'])
										->first();

		if (is_null($userWishlistItem))
		{
			// Not Wishlisted - add new
			UserWishlist::Create([
					'user_id' 			=>	Auth::user()->id,
					'advertisement_id'	=>	$requestData['advertisement_id']
				]);

			$add_status		=	true;
			$message		=	'Added to Wishlist';
			$hearts_image	=	URL::asset('svg/filled.svg');
		}
		else
		{
			// Already Wishlisted - delete the existing
			//$userWishlistItem->delete();
			UserWishlist::where('user_id',	Auth::user()->id)
										->where('advertisement_id',	$requestData['advertisement_id'])
										->delete();

			$add_status		=	false;
			$message		=	'Wishlisted Item Removed';
			$hearts_image	=	URL::asset('svg/normal.svg');
		}

		return [
					'add_status'	=>	$add_status,
					'message'		=>	$message,
					'hearts_image'	=>	$hearts_image
				];
	}
}