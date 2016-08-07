<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class NotLoggedInMiddleware
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
		//Checking if he is admin
		if ( Auth::check() )	//Logged In
		{
			response('You are not allowed because you are already Logged In', 403);
		}
		else			//Not admin, then OK
		{
			return $next($request);
		}
    }
}
