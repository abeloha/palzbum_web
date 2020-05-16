<?php namespace App\Http\Middleware;

use Closure;

class UserGroup {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
         
            if (!get_member_id()) {
                return redirect('/group');
            }
            return $next($request);
            
	}

}
