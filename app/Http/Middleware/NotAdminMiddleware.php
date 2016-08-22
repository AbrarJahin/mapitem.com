<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class NotAdminMiddleware
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
			return $next($request);
		}
		else if( strcmp("admin",Auth::user()->user_type)!=0 )			//Not admin, then redirect to default page
		{
			return $next($request);
		}
		//End checking
		return redirect(route('admin.category'));
		//return redirect()->route('admin.category');
    }
}
