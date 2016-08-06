<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class OnlyAdminMiddleware
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
		if ( !Auth::check() )											//Not Logged In
		{
			return redirect()->route('index');
		}
		else if( strcmp("admin",Auth::user()->user_type)!=0 )			//Not admin, then redirect to default page
		{
			return redirect()->route('index');
		}
		//End checking
		return $next($request);
    }
}
