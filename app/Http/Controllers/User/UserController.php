<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Request;
use Response;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\MessageThread;
use App\Message;
use App\Advertisement;
use App\UserNotification;
use App\Offer;
use Carbon\Carbon;
use DB;
use Hash;
use URL;
use Image;
use Log;

/*
	Functionality	-> Handel All User Works
	Access			-> Only Users
	Created At		-> 05/02/2016
	Created by		-> S. M. Abrar Jahin
*/

class UserController extends Controller
{
	private $destinationPath	=	'uploads';	// upload path
	private $max_height			=	144;		//Max image height
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
		return view('user.dashboard.main', [	'current_page'	=> 'user.dashboard'	]);
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
												'message_threads.updated_at as last_message_time',
												DB::raw(
													"CASE
														WHEN message_threads.is_read = 'not_readed' AND message_threads.last_sender_id <> ".Auth::user()->id." THEN 'not_readed'
														ELSE 'readed'
													END as is_readed"
												)
											)
									->where('sender_id',		Auth::user()->id)
									->orWhere('receiver_id',	Auth::user()->id)
									->orderBy('message_threads.updated_at', 'desc')
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
					->orderBy('created_at', 'desc')
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

		$validator = Validator::make(
										$requestData,
										[
											'profile_image'				=> 'image|max:15000|mimes:jpeg,bmp,png',
											'address'					=> 'string|max:255',
											'cell_no'					=> 'string|max:60|unique:users,cell_no,'.$user->id,
											'date_of_birth'				=> 'date',
											'email'						=> 'email|max:60|unique:users,email,'.$user->id,
											'first_name'				=> 'string|max:50',
											'last_name'					=> 'string|max:50',
											'location_longitude'		=> 'numeric',
											'location_latitude'			=> 'numeric',
											'social_security_number_p1'	=> 'string|max:3',
											'social_security_number_p2'	=> 'string|max:2',
											'social_security_number_p3'	=> 'string|max:4',
											'website'					=> 'string|max:70'
										]
									);

		//Validator Failed
		if ($validator->fails())
		{
			return Response::json($validator->errors()->all(), 400);
			//abort(400, 'Validation Error');
		}

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
			//Creating the file Name
			$extension = $requestData['profile_image']->getClientOriginalExtension(); // getting file extension
			$fileName = Auth::user()->id."p". substr(sha1(rand()), 0, 10).substr( md5(rand()), 0, 10) . '.' . $extension; // renameing image

			if ($requestData['profile_image']->move($this->destinationPath, $fileName))
			{
				//New file uploaded, so need to remove previous file
				if( strlen($user->profile_picture)>4 )
				{	//If pro-pic exists then remove the file
					try
					{
						unlink($this->destinationPath.'/'.$user->profile_picture);
					}
					catch (\Exception $e)
					{
						Log::warning("First - ");
						Log::error($e->getMessage());
					}
				}

				$uploadedFileLocation = realpath($this->destinationPath.'/'.$fileName);
				//Resizing image
				try
				{
					Image::make($uploadedFileLocation)
						->resize($this->max_height,$this->max_height)
						->orientate()
						->save($uploadedFileLocation);
					$user->profile_picture	=	$fileName;
				}
				catch (\Exception $e)
				{
					Log::warning("Second - ");
					Log::error($e->getMessage());
					try
					{
						unlink($uploadedFileLocation);
					}
					catch (\Exception $ex)
					{
						Log::warning("Third - ");
						Log::error($ex->getMessage());
					}
				}
			}
			else
			{
				Log::error("Pro Pic Upload Failed");
			}
		}

		if($user->save())
			return $user;
		else
			return response()->json(['error'=> ["Profile Update Failed"] ], 400);
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
		$offer			=	Offer::find($requestData['offer_id']);
		$advertisement	=	Advertisement::find($offer->add_id);

		if($advertisement->user_id==Auth::user()->id)
		{
			//Offer status update
			$offer->status=$requestData['status'];
			$offer->save();

			$offerAction = "";
			if ($requestData['status']=="accepted")
			{
				$offerAction='Accepted';
			}
			else if ($requestData['status']=="rejected")
			{
				$offerAction='Rejected';
			}
			else
			{
				$offerAction='*INVALID*';
			}

			//Adding message
			$messageText = "Your offer of (".$offer->price.") for (".$advertisement->title.") has been ".$offerAction.".";
			//Save the message in message thread because message thread is already created at the time of offer sending
			$messageThread = MessageThread::whereIn('sender_id',		[Auth::user()->id, $offer->sender_id])
											->whereIn('receiver_id',	[Auth::user()->id, $offer->sender_id])
											->where('advertisement_id',	$advertisement->id)
											->first();
			Message::create([
								'sender_id'		=>	Auth::user()->id,
								'receiver_id'	=>	$offer->sender_id,
								'thread_id'		=>	$messageThread->id,
								'message'		=>	$messageText
							]);
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
		return view('public.listing.main', [
												'current_page'			=>	'Ad Listing',
												'secondary_page_title'	=>	'My Wishlist',
												'sort_distance_options'	=>	[
																				'price_asc'		=>	'Price - Lowest',
																				'price_desc'	=>	'Price - Highest',
																				'rating_desc'	=>	'Rating - Highest',
																				'ending_desc'	=>	'Ending - Soonest',
																				'upload_desc'	=>	'Newest - Listed'
																			],
												'input_nav_search_url'	=>	URL::route('get_suggestion'),
												'find_map_items_url'	=>	URL::route('user.find_wishlisted_map_items')
											]);
	}

	/*
		URL             -> get: /listing
		Functionality   -> Show Listing Page
		Access          -> All
		Created At      -> 14/06/2016
		Updated At      -> 14/06/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function findWishlistedMapItems()
	{
		$requestData = Request::all();

		$tempData = DB::table('advertisements')
				->join('advertisement_images', 'advertisements.id', '=', 'advertisement_images.advertisement_id')
				->join('users', 'advertisements.user_id', '=', 'users.id')
				->leftJoin('user_wishlists', function ($join)
								{
									$user_id = 1;
									if(Auth::check())
									{
										$user_id = Auth::user()->id;
									}

									$join->on('user_wishlists.advertisement_id', '=', 'advertisements.id')
										->where('user_wishlists.user_id', '=', $user_id);
								})
				->select(
							'advertisements.id as id',
							'advertisements.location_lat as lat',
							'advertisements.location_lon as lon',
							'advertisements.price as price',
							'advertisements.title as title',
							'advertisements.description as description',
							'users.profile_picture as user_image',				//Should be updated later
							'advertisement_images.image_name as advertisement_image',
							DB::raw(
										"CASE  
											WHEN ISNULL(user_wishlists.advertisement_id) THEN '".URL::asset('svg/normal.svg')."'
											ELSE '".URL::asset('svg/filled.svg')."'
										END as hearts_image"
									)
						)
				->whereBetween('advertisements.location_lat', [ $requestData['lat_min'], $requestData['lat_max'] ])
				->whereBetween('advertisements.location_lon', [ $requestData['lon_min'], $requestData['lon_max'] ])
				->where('advertisements.price', '>', $requestData['price_range_min'])
				->where('user_wishlists.user_id', '=', Auth::user()->id)
				->where(function($query) use ($requestData)
					{
						$query
							->where('advertisements.title', 'like', '%'.$requestData['search_value'].'%')
							->orWhere('advertisements.description', 'like', '%'.$requestData['search_value'].'%');
					})
				->whereIn('advertisements.sub_category_id', $requestData['sub_categories'])
				->groupBy('advertisement_images.advertisement_id');

		if($requestData['price_range_max']!=1000)
			$tempData = $tempData->where('advertisements.price', '<', $requestData['price_range_max']);

		//Should check if there is a better way than using collection in this case
		$totalElementFound = collect(
										$tempData->pluck('advertisements.id')
									)->count();

		//Ordering
		if( $requestData['sort_ordering'] == 'price_asc' )
			$tempData = $tempData->orderBy('advertisements.price', 'asc');
		else if( $requestData['sort_ordering'] == 'price_desc' )
			$tempData = $tempData->orderBy('advertisements.price', 'desc');
		/*else if( $requestData['sort_ordering'] == 'rating_desc' )
			$tempData = $tempData->orderBy('name', 'desc');
		else if( $requestData['sort_ordering'] == 'ending_desc' )
			$tempData = $tempData->orderBy('name', 'desc');*/
		else if( $requestData['sort_ordering'] == 'upload_desc' )
			$tempData = $tempData->orderBy('advertisements.created_at', 'desc');

		//return $tempData->get();

		//Paginator
		$data = $tempData->skip( $requestData['content_per_page']*($requestData['current_page_no']-1) )
							->take($requestData['content_per_page'])
							->get();

		//Formetting data for sending
		$json_data	=	array(
						"showing_start"	=>	($totalElementFound > 0 ? ($requestData['current_page_no']-1)*$requestData['content_per_page']+1 : 0),												// Records Show Start
						"showing_end"	=>	min($totalElementFound,$requestData['current_page_no']*$requestData['content_per_page']),												// Records Show End
						"total_element"	=>	$totalElementFound,												// Total number of records
						"total_page"	=>	ceil( $totalElementFound / $requestData['content_per_page'] ),	// total number of pages
						"current_page"	=>	$requestData['current_page_no']/1,								// current page number
						"data"			=>	$data															// total data array
					);
		return $json_data;
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

	/*
		URL             -> post: /auth/update_password
		Functionality   -> Change any user's password
		Access          -> Anyone who is logged in
		Created At      -> 04/10/2016
		Updated At      -> 04/10/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function updatePassword()
	{
		$requestData = Request::all();

		$user = User::find(Auth::user()->id);

		if( !Hash::check( $requestData['old_password'] , $user->password) )
			return [
					'error'		=> true,
					'detail'	=> 'Old password is Incorrect'
				];
		else if( Hash::check( $requestData['password'] , $user->password) )
			return [
					'error'		=> true,
					'detail'	=> "New password can't be same as Old Password"
				];
		else if(strlen($requestData['password'])<4)
			return [
					'error'		=> true,
					'detail'	=> 'Password length too short'
				];
		else if( $requestData['password'] != $requestData['password_confirmation'] )
			return [
					'error'		=> true,
					'detail'	=> 'Confirm Password did not match'
				];

		$user->password = bcrypt( $requestData['password'] );
		$user->save();

		return [
				'error'		=> false,
				'detail'	=> 'Password Updated'
			];
	}
}
