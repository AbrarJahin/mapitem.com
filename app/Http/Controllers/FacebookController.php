<?php
namespace App\Http\Controllers;
use Auth;
use Request;
use Validator;
use App\User;
use App\FbLogin;
use Socialite;
use Illuminate\Support\Facades\Redirect;

/*
	Functionality   -> Handel All Auth Works
	Access          -> No restriction applied in the class, applied from route if needed
	Created At      -> 25/09/2016
	Created by      -> S. M. Abrar Jahin
*/

class FacebookController extends Controller
{
	/*
		URL             -> get: /fb_login
		Functionality   -> User Login FB - Link
		Access          -> Anyone who is not logged in
		Created At      -> 25/09/2016
		Updated At      -> 25/09/2016
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
	}

	/**
	 * Obtain the user information from Facebook.
	 *
	 * @return Response
	 */
	public function handleProviderCallback()
	{
		try
		{
			$user = Socialite::driver('facebook')->user();
		}
		catch (\Exception $e)
		{
			return $e;
			return redirect()->route('index');
		}

		//Check if the user is logged in or not
		if (!Auth::check())
		{
			/*
			 *	If user is not logged in,
			 *	 then try if the user exists so that he can be logged in
			 */
			//Log in the user if exists with that email
			if ( User::where('email', '=', $user->email)->count()==1 )
			{
				Auth::loginUsingId(
										User::where('email', '=', $user->email)
											->first()->id
									);
			}
			else	//Not already registered with that email, so check if he already logged in with FB email previously
			{
				if(FbLogin::where('email', '=', $user->email)->count()==1)
				{
					// Yes, so log in with that Account - 'fb_login->user_id' is the same value of 'user->id'
					Auth::loginUsingId(
											FbLogin::where('email', '=', $user->email)
												->first()->user_id
										);
				}
				else
				{
					// No, so he is a brand new user - this part is handled later - in next code's else part
				}
			}
		}
		/*
		 *	User Not Logged In
		 */

		//Check if user is signed with social mail previously
		if(Auth::check())
		{	/*
			 *	The user is logged in...
			 *	So, Facebook account should be
			 *	 linked with current logged in account
			 *	  (if there is no image uploaded,
			 *	   then will be updated with social profile image))
			 */
			$dbUser = User::find(Auth::user()->id);
			//Check if there is profile image upoaded
			if( strlen( Auth::user()->profile_picture )<5 )	//User image uploaded previously
			{
				//Update the user Image
				$dbUser->profile_picture = $this->uploadFile($user->avatar);
			}
			$dbUser->is_fb_verified = 'verified';	//Update user FB Verified Status - Will update if he already logged in or not, it will update always - based on requirements
			$dbUser->save();
		}
		else
		{	//No user exists with that email - so sign up and upload image
			//Add the user - Start
			$name = $user->name;
			$parts = explode(" ", $name);
			$lastname = array_pop($parts);
			$firstname = implode(" ", $parts);

			$dbUser = new User;
			$dbUser->profile_picture	=	$this->uploadFile($user->avatar);
			$dbUser->first_name			=	$firstname;
			$dbUser->last_name			=	$lastname;
			$dbUser->email				=	$user->email;
			$dbUser->user_type			=	'normal_user';
			$dbUser->password			=	bcrypt( $user->token );
			$user->is_fb_verified = 'verified';	//Update user FB Verified Status - Will update if he already logged in or not, it will update always - based on requirements
			$dbUser->save();
			//Add the user - End

			//Now log in the user
			Auth::loginUsingId($dbUser->id);
		}

		FbLogin::updateOrCreate(
			[
				'user_id'	=>	Auth::user()->id,
				'email'		=>	Auth::user()->email
			],
			[
				'token'					=> $user->token,
				'id'					=> $user->id,
				'name'					=> $user->name,
				'avatar_url'			=> $user->avatar,
				'avatar_original_url'	=> $user->avatar_original
			]
		);
		return Socialite::driver('facebook')->user();
		return Redirect::route('index');
	}

	private function uploadFile($fileUrl)
	{
		// Get the file to get existing content
		$data = file_get_contents($fileUrl);

		// New file Location in server
		$destinationPath = 'uploads'; // upload path
		$fileName = rand(0, 99999)."f".rand(11111, 99999) . '.jpg';
		$newFile = $destinationPath."/".$fileName;

		// Write the contents back to a new file
		file_put_contents($newFile, $data);
		return $fileName;
	}
}
