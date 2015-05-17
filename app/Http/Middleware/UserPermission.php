<?php namespace App\Http\Middleware;

use Closure;
use Cookie;
use App\Tokens;

class UserPermission {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if(!isset($_COOKIE['token'])){
			return redirect("/login");
		}
		
		if(Tokens::find($_COOKIE['token']) === null){
			return redirect("/login");
		}

		return $next($request);
	}

}
