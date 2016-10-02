<?php
namespace App\Http\Controllers;
use Auth;
use Request;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\PasswordRecovery;
use Carbon\Carbon;

/*
	Functionality   -> Handel All Auth Works
	Access          -> No restriction applied in the class, applied from route if needed
	Created At      -> 05/02/2016
	Created by      -> S. M. Abrar Jahin
*/

class AuthController extends Controller
{
	/*
		URL				-> get: / , post: /login
		Functionality	-> Show Login Page
		Access			-> Anyone who is not logged in
		Created At		-> 05/02/2016
		Updated At		-> 05/02/2016
		Created by		-> S. M. Abrar Jahin
	*/
	public function userLoginProcess()
	{
		$requestData = Request::all();
		$remember = (Request::has('remember_me')) ? true : false;

		$validator = Validator::make($requestData,
												[
													'email'		=>	'required',
													'password'	=>	'required',
												]
									);
		//Validator Failed
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)
							->withInput(
											Request::except('password')
										);
		}
		if (
				Auth::attempt(
					[
						'email'			=> $requestData['email'],
						'password'		=> $requestData['password'],
						'is_enabled'	=> 'enabled'
					],$remember)
			)
		//Login Successful - Currently Testing Redirect
		{
			//return Redirect::route('user.dashboard');
			return	[
						'status'	=> 1,
						'message'	=> 'Successfully Logged In',
					];
		}
		else//Login Failed
		{
			return	[
						'status'	=> 0,
						'message'	=> 'Wrong Email or Password',
					];
			/*return Redirect::back()
				->withInput(
								Request::except('password')
							)
				->withErrors(
								[
									'Username, Password not match or user not active yet !'
								]
							);*/
		}
	}

	/*
		URL             -> post: /register_user
		Functionality   -> User Register Process
		Access          -> Anyone who is not logged in //or Admin
		Created At      -> 05/02/2016
		Updated At      -> 05/02/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function userRegisterProcess()
	{
		$requestData = Request::all();

		$validator = Validator::make(
										$requestData,
										[
											'first_name'	=> 'required',
											'last_name'		=> 'required',
											'email'			=> 'required|email|unique:users',
											'password'		=> 'required|min:3'
										],
										[
											'first_name.required'	=>'Please give your first name',
											'last_name.required'	=>'Please give your first name',
											'email.unique'			=>'Email already used, please try a different email'
										]
									);
		//Validator Failed
		if ($validator->fails())
		{
			return	[
						'status'	=> 0,
						'messages'	=> $validator->messages()
						//'prev_data'	=> Request::except(['password','_token'])
					];
			/*return Redirect::back()->withErrors($validator)
					->withInput(
									Request::except('password')
								);*/
		}

		//Add the user - Start
		$user = new User;
		$user->first_name	= $requestData['first_name'];
		$user->last_name	= $requestData['last_name'];
		$user->email		= $requestData['email'];
		$user->is_enabled	= 'enabled';
		$user->user_type	= 'normal_user';
		$user->password		= bcrypt( $requestData['password'] );
		$user->save();
		//Add the user - End

		//Log In User - Start
		Auth::attempt(
					[
						'email'			=> $requestData['email'],
						'password'		=> $requestData['password']
					]);
		//Log In User - End

		return	[
					'status'	=> 1,
					'message'	=> 'Successfully Signed Up',
				];
		/*return Redirect::back()
			->withInput(
							Request::except(['password','password_confirmation'])
						)
			->withErrors(
							[
								'User - '.$requestData['email'].' Successfully added'
							]
						);*/
	}

	/*
		URL             -> get: /logout
		Functionality   -> Log Out any user
		Access          -> Anyone who is logged in
		Created At      -> 05/02/2016
		Updated At      -> 05/02/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function userLogout()
	{
		Auth::logout();
		return Redirect::route('index');
	}

	/*
		URL             -> post: /reset_password
		Functionality   -> Recover password view
		Access          -> Anyone who is not logged in
		Created At      -> 05/09/2016
		Updated At      -> 05/09/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function resetPasswordProcess()
	{
		$requestData = Request::all();
		$user = User::where('email','=',$requestData['email'])->first();
		if ( is_null($user) )
		{
			return "No user found with that email";
		}

		$token			=	str_random(50).$user->id.sha1( time() );
		//More can be found for date-time-
		//https://scotch.io/tutorials/easier-datetime-in-laravel-and-php-with-carbon
		$currentTime	=	Carbon::now();

		//Now create the recoovery option in DB
		PasswordRecovery::Create([
					'user_id'		=>	$user->id,
					'token'			=>	$token,
					'request_ip'	=>	Request::ip(),
					'expire_time'	=>	$currentTime->addMinutes(30)
				]);

		Mail::send(
					'email.password_recovery',
					[	//Variables to access in email view
						'userName'		=>	$user->first_name." ".$user->last_name,
						'actionUrl'		=>	route('password_recover',$token)
					],
			function ($message) use ($user) //Variable to access in mail object
			{
				$message->to($user->email)
						->subject('Password Recovery - MapItem');
			});

		return "Mail sent, please check your mail";
	}

	/*
		URL             -> get: /password_recover/{token}
		Functionality   -> Set new Password
		Access          -> Anyone who is not logged in
		Created At      -> 05/09/2016
		Updated At      -> 05/09/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function recoverPassword($token)
	{
		$recoveryData = PasswordRecovery::where('token','=',$token)->first();
		//$data->delete();
		if ( is_null($recoveryData) )
		{
			return "Invalid Token";
		}

		if( Carbon::parse($recoveryData->expire_time)<Carbon::now() )
			return 'The token is Expired';

		$user = User::find($recoveryData->user_id);

		return view('public.recovery.reset_password',
						[
							'token'		=>	$token,
							'name'		=>	$user->first_name." ".$user->last_name,
							'image'		=>	$user->profile_picture
						]
					);
	}

	/*
		URL             -> post: /password_recover
		Functionality   -> Set new Password
		Access          -> Anyone who is not logged in
		Created At      -> 05/09/2016
		Updated At      -> 05/09/2016
		Created by      -> S. M. Abrar Jahin
	*/
	public function recoverPasswordProcess()
	{
		$requestData = Request::all();

		$validator = Validator::make(
                                        $requestData,
                                        [
                                            'password' => 'required|confirmed|min:3',
                                            'password_confirmation' => 'required|min:3'
                                        ]
                                    );

		$recoveryData = PasswordRecovery::where('token','=',$requestData['reset_token'])->first();

		//$data->delete();
		if ( is_null($recoveryData) )
		{
			return "Invalid Token";
		}

		if( Carbon::parse($recoveryData->expire_time)<Carbon::now() )
			return 'The token is Expired';

		//Validator Failed
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)
                            ->withInput(
                                            Request::except('password')
                                        );
        }

		$user = User::find($recoveryData->user_id);
		$user->password = bcrypt($requestData['password']);
		$user->save();

		Auth::loginUsingId($user->id);

		//Remove the token
		$recoveryData->apply_ip = Request::ip();
		$recoveryData->save();
		$recoveryData->delete();

		return redirect()->route('index');
	}
}
