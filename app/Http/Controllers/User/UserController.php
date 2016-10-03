<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Request;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\MessageThread;
use App\Advertisement;
use App\UserNotification;
use App\Offer;
use Carbon\Carbon;
use DB;

/*
	Functionality	-> Handel All User Works
	Access			-> Only Users
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class UserController extends Controller
{
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
		return view('user.account.main', [ 'current_page'	=> 'user.account' ]);
	}

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
		return view('user.dashboard.main', [ 'current_page'	=> 'user.dashboard' ]);
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
		//Remove Notification for Offer
		$userNotification = UserNotification::firstOrNew([
															'user_id' => Auth::user()->id
														]);
		$userNotification->inbox = 0;
		$userNotification->save();

		$user_message_threades = MessageThread::join('users as sender', 'sender.id',	'=', 'message_threads.sender_id')
											->join('users as receiver', 'receiver.id',	'=', 'message_threads.receiver_id')
											->select(
														DB::raw(
															"CASE  
																WHEN sender.id = ".Auth::user()->id." THEN CONCAT(receiver.first_name, ' ', receiver.last_name)
																ELSE CONCAT(sender.first_name, ' ', sender.last_name)
															END as sender_name"
														),
														'message_threads.id as id',
														'message_threads.title as title',
														DB::raw(
															"CASE
																WHEN DATE(message_threads.created_at) = DATE(NOW()) THEN DATE_FORMAT(message_threads.created_at, '%r')
																ELSE DATE_FORMAT(message_threads.created_at, '%b %D, %Y')
															END as created_at"
														)
													)
											//DATE_FORMAT(message_threads.created_at, '%D %Y, %r')
											->where('sender_id',		Auth::user()->id)
											->orWhere('receiver_id',	Auth::user()->id)
											->get();
		return view('user.inbox.main',
						[
							'current_page'		=>	'user.inbox',
							'message_threads'	=>	$user_message_threades,
							'no_of_new_message'	=>	0	//Added this to remove middleware lacking effect
						]
					);
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
		//Remove Notification for Offer
		$userNotification = UserNotification::firstOrNew([
															'user_id' => Auth::user()->id
														]);
		$userNotification->my_adds = 0;
		$userNotification->save();

		$my_adds = Advertisement::withTrashed()
					->with('User')
					->with('AdvertisementImages')
					->where('user_id',Auth::user()->id)
					->paginate(5);
		return view('user.my_adds.main', [
											'current_page'		=>	'user.my_adds',
											'my_adds'			=>	$my_adds,
											'total_no_of_adds'	=>	0	//Added this to remove middleware lacking effect
										]);
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
		//Remove Notification for Offer
		$userNotification = UserNotification::firstOrNew([
															'user_id' => Auth::user()->id
														]);
		$userNotification->offers = 0;
		$userNotification->save();

		//Get Offer Data
		$advertisements = Advertisement::with('AdvertisementImages')
					->with('Offer','Offer.User')
					->where('user_id', Auth::user()->id)
					->has('Offer')
					->get();

		return view('user.offers.main',
						[
							'current_page'		=>	'user.offers',
							'no_of_new_offer'	=>	0,	//Added this to remove middleware lacking effect
							'advertisements'	=>	$advertisements
						]
					);
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
		$user = User::where( 'id', Auth::user()->id )
					->select(
								'address',
								DB::raw('COALESCE(cell_no,"") as cell_no'),
								//'cell_no',
								DB::raw('DATE_FORMAT(date_of_birth, "%m/%d/%Y") as date_of_birth'),
								'email',
								'first_name',
								'last_name',
								'social_security_number_p1',
								'social_security_number_p2',
								'social_security_number_p3',
								'website',
								'profile_picture',
								'location_latitude',
								'location_longitude'
							)
					->first();

		return view('user.profile.main', [
											'current_page'	=> 'user.profile',
											'current_user'	=> $user
										]);
	}

	/*
		URL				-> post: /profile_update
		Functionality	-> Show Dashboard Page
		Access			-> Anyone who is logged in user
		Created At		-> 27/06/2016
		Updated At		-> 27/06/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function profileUpdate()
	{
		$requestData = Request::all();

		$user = User::find(Auth::user()->id);

		$user->address						= $requestData['address'];
		$user->cell_no						= $requestData['cell_no'];
		$user->date_of_birth				= Carbon::createFromFormat('m/d/Y', $requestData['date_of_birth']);
		$user->email						= $requestData['email'];
		$user->first_name					= $requestData['first_name'];
		$user->last_name					= $requestData['last_name'];
		$user->location_longitude			= $requestData['location_longitude'];
		$user->location_latitude			= $requestData['location_latitude'];
		$user->social_security_number_p1	= $requestData['social_security_1'];
		$user->social_security_number_p2	= $requestData['social_security_2'];
		$user->social_security_number_p3	= $requestData['social_security_3'];
		$user->website						= $requestData['website'];

		if(	isset(	$requestData['profile_image']	)	)	//If file was uploaded
		{
			if( strlen($user->profile_picture)>4 )
			{
				$fileName = $user->profile_picture;
			}
			else
			{
				//Renaming the file
				$extension = $requestData['profile_image']->getClientOriginalExtension(); // getting file extension
				$fileName = Auth::user()->id."pp".rand(111111, 999999) . '.' . $extension; // renameing image
			}

			$destinationPath = 'uploads'; // upload path

			$upload_success = $requestData['profile_image']->move($destinationPath, $fileName); // uploading file to given path

			if ($upload_success)
			{
				$user->profile_picture	=	$fileName;
			}
		}

		if($user->save())
			return 'Updated';
		else
			return 'Profile Update Failed';
	}

	/*
		URL				-> get: /update_offer_status
		Functionality	-> Update Offer
		Access			-> Anyone who is logged in user
		Created At		-> 14/08/2016
		Updated At		-> 14/08/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function updateOffer()
	{
		$requestData	=	Request::all();	//offer_id, status
		$offer	=	Offer::find($requestData['offer_id']);
		$advertisement = Advertisement::find($offer->add_id);
		if($advertisement->user_id===Auth::user()->id)
		{
			$offer->status=$requestData['status'];
			$offer->save();
			return $offer;
		}
		else
			return response()->json(['error'=> ["Your are not owner of this add"] ], 403);
	}

	/*
		URL				-> get: /wishlist
		Functionality	-> Show Dashboard Page
		Access			-> Anyone who is logged in user
		Created At		-> 22/03/2016
		Updated At		-> 22/03/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function myWishList()
	{
		return view('user.wishlist.main', [ 'current_page'	=> 'user.wishlist' ]);
	}

	/*
		URL				-> get: /update_notification_settings
		Functionality	-> Update Settings
		Access			-> Anyone who is logged in user
		Created At		-> 03/10/2016
		Updated At		-> 03/10/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function updateNotificationSettings()
	{
		$requestData	=	Request::all();
		$user = User::find( Auth::user()->id );
		$user->$requestData['settingsName'] = $requestData['status'];
		$user->save();
		return $user;
	}
}
