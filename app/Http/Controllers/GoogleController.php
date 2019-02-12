<?php
namespace App\Http\Controllers;
use Auth;
use Request;
use Validator;
use App\User;
use App\GoogleLogin;
use Socialite;
use Illuminate\Support\Facades\Redirect;

/*
	Functionality   -> Handel All Auth Works
	Access          -> No restriction applied in the class, applied from route if needed
	Created At      -> 30/08/2016
	Created by      -> S. M. Abrar Jahin
*/

class GoogleController extends Controller
{

	/*
	//	URL             -> get: /auth/google
	//	Functionality   -> User Login FB - Link
	//	Access          -> Anyone who is not logged in
	//	Created At      -> 30/08/2016
	//	Updated At      -> 30/08/2016
	//	Created by      -> S. M. Abrar Jahin

	//	Redirect the user to the Facebook authentication page.
	//	@return Response
	public function redirectToProvider()
	{
		return Socialite::driver('google')->redirect();
	}

	//	Obtain the user information from Google.
	//	@return Response
	*/


	public function loginWithAjax()
	{
		$requestData = Request::all();

		//Check if the user is logged in or not
		if (!Auth::check())
		{
			//	If user is not logged in,
			//	then try if the user exists so that he can be logged in
			//Log in the user if exists
			if ( User::where('email', '=', $requestData['email'])->count()==1 )
			{
				Auth::loginUsingId(
										User::where('email', '=', $requestData['email'])
											->first()->id
									);
			}
		}

		//	User Not Logged In

		//Check if user is signed with social mail previously
		if(Auth::check())
		{
			//	The user is logged in...
			//	So, Facebook account should be
			//	 linked with current logged in account
			//	  (if there is no image uploaded,
			//	   then will be updated with social profile image))

			//Check if there is profile image upoaded
			if( strlen( Auth::user()->profile_picture )<5 )	//User image uploaded previously
			{
				//Update the user Image
				$dbUser = User::find(Auth::user()->id);
				$dbUser->profile_picture = $this->uploadFile($requestData['profile_image']);
				$dbUser->save();
			}
		}
		else
		{	//No user exists with that email - so sign up and upload image
			//Add the user - Start

			$name = $requestData['name'];
			$parts = explode(" ", $name);
			$lastname = array_pop($parts);
			$firstname = implode(" ", $parts);

			$dbUser = new User;
			$dbUser->profile_picture	=	$this->uploadFile($requestData['profile_image']);
			$dbUser->first_name			=	$firstname;
			$dbUser->last_name			=	$lastname;
			$dbUser->email				=	$requestData['email'];
			$dbUser->user_type			=	'normal_user';
			$dbUser->password			=	bcrypt( $requestData['id'] );
			$dbUser->save();
			//Add the user - End

			//Now log in the user
			Auth::loginUsingId($dbUser->id);
		}

		GoogleLogin::updateOrCreate(
			[
				'user_id'	=> Auth::user()->id,
				'email'		=> $requestData['email']
			],
			[
				'token'			=> $requestData['id'],
				'name'			=> $requestData['name'],
				'avatar_url'	=> $requestData['profile_image']
			]
		);

		return Auth::user();
	}

	private function uploadFile($fileUrl)
	{
		// Get the file to get existing content
		$data = file_get_contents($fileUrl);

		// New file Location in server
		$destinationPath = 'uploads'; // upload path
		$fileName = rand(0, 99999)."g".rand(11111, 99999) . '.jpg';
		$newFile = $destinationPath."/".$fileName;

		// Write the contents back to a new file
		file_put_contents($newFile, $data);
		return $fileName;
	}
}