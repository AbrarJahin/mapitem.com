<?php
namespace App\Http\Controllers;
use Auth;
use Request;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Socialite;

/*
	Functionality   -> Handel All Auth Works
	Access          -> No restriction applied in the class, applied from route if needed
	Created At      -> 30/08/2016
	Created by      -> S. M. Abrar Jahin
*/

class FacebookController extends Controller
{
	/*
		URL             -> get: /fb_login
		Functionality   -> User Login FB - Link
		Access          -> Anyone who is not logged in
		Created At      -> 30/08/2016
		Updated At      -> 30/08/2016
		Created by      -> S. M. Abrar Jahin
	*/
	/**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
        // return Socialite::driver('github')
        //     ->scopes(['scope1', 'scope2'])->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // $user->token;
        var_dump($user);
    }
}