<?php
namespace App\Http\Controllers;
use Auth;
use Request;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;

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
					])
			)
		//Login Successful - Currently Testing Redirect
		{
			return Redirect::route('user.dashboard');
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
						'messages'	=> $validator->messages(),
						'prev_data'	=> Request::except(['password','_token'])
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

		return	[
					'status'	=> 1,
					'message'	=> 'Successfully registered',
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
}