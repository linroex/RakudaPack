<?php namespace App\Http\Middleware;

use Closure;
use Session;
use App\Tokens;

class CheckMiddleware{
	public function handle($request, Closure $next){
		if(Tokens::find($request->token)){
			$uid = Tokens::find($request->token)->first()->user_id;
			Session::put('uid', $uid);
			return $next($request);
		}
		else{
			$result = array('message' => 'failed', 'code' => 0, 'data'=>'token wrong!');
			return response()->json($result);
		}	
	}
}