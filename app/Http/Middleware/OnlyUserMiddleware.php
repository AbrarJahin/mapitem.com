<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class OnlyUserMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//Checking if he is normal user
		if ( !Auth::check() )											//Not Logged In
		{
			//redirect()->route('index');
			return redirect(route('index'));
		}
		else if( strcmp("normal_user",Auth::user()->user_type)!=0 )		//Not normal_user, then redirect to default page
		{
			//redirect()->route('index');
			return redirect(route('index'));
		}
		//End checking
		return $next($request);
	}
}
