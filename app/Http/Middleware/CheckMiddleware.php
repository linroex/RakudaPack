<?php namespace App\Http\Middleware;

use Closure;

use Session;

use App\Tokens;

class CheckMiddleware{
	public function handle($request, Closure $next){
		
		if(Tokens::find($request->token)){
			
			if(Tokens::where('token', '=', $request->token)->first()->expiretime < time()){
				
				Session::flush();
				$uid = Tokens::find($request->token)->user_id;
				Session::put('uid', $uid);
				return $next($request);
			}else{
				
				$get = Tokens::find($request->get('token'))->delete();
				$result = ['message' => 'failed', 'code' => 0, 'data' => ['msg' => 'Token已過期！']];
				return response()->json($result);
			}
		}else{
			$result = ['message' => 'failed', 'code' => 0, 'data' => ['msg' => 'Token錯誤!']];
			return response()->json($result);
		}	
	}
}