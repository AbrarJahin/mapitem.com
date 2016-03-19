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

class LoginController extends Controller
{
    /*
        URL             -> get: / , get: /login
        Functionality   -> Show Login Page
        Access          -> Anyone who is not logged in
        Created At      -> 05/02/2016
        Updated At      -> 05/02/2016
        Created by      -> S. M. Abrar Jahin
    */
    public function userLoginProcess()
    {
    	$requestData = Request::all();

		$validator = Validator::make($requestData,
												[
													'user_name' => 'required',
													'password' => 'required',
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
						'user_name' => $requestData['user_name'],
						'password' 	=> $requestData['password'],
						'is_enabled'=> 'enabled'
					])
			)
		//Login Successful - Currently Testing Redirect
		{
            return Redirect::to('dashboard');
        }
        else//Login Failed
        {
        	return Redirect::back()
        					->withInput(
											Request::except('password')
										)
        					->withErrors(
        									[
        										'Username, Password not match or user not active yet !'
        									]
        								);
        }
    }

    /*
        URL             -> post: /register
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
                                            'full_name' => 'required',
                                            'user_name' => 'required|unique:users',
                                            'email'     => 'required|email|unique:users',
                                            'password' => 'required|confirmed|min:3',
                                            'password_confirmation' => 'required|min:3'
                                        ],
                                        [
                                            'full_name.required'=>'Please give user name',
                                            'user_name.unique'  =>'Username Already Taken, please try a different Username',
                                            'email.unique'      =>'Email already used, please try a different email'
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

        //Add the user - Start
        $user = new User;
        $user->full_name    = $requestData['full_name'];
        $user->user_name    = $requestData['user_name'];
        $user->email        = $requestData['email'];
        $user->is_enabled   = 'enabled';
        $user->password     = bcrypt( $requestData['password'] );
        $user->save();
        //Add the user - End

        return Redirect::back()
                    ->withInput(
                                    Request::except(['password','password_confirmation'])
                                )
                    ->withErrors(
                                    [
                                        'User - '.$requestData['full_name'].' Successfully added'
                                    ]
                                );
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
        return redirect('login');
    }
}