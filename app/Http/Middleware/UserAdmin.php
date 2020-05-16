<?php namespace App\Http\Middleware;
use Auth;
use Closure;

class UserAdmin {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
         
            $rank = Auth::user()->rank;
            if ($rank != 7){
                return redirect('/palz');
            }
            return $next($request);
	}

}
