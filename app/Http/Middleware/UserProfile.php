<?php namespace App\Http\Middleware;

use Closure;

class UserProfile {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
         
            if (!get_profile_id()){
                return redirect('/me/create');
            }
            return $next($request);
	}

}
