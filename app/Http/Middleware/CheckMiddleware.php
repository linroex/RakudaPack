<?php namespace App\Http\Middleware;

use Closure;
use Session;
use App\Tokens;

class CheckMiddleware{
	public function handle($request, Closure $next){
		//dd(Tokens::find($request->token));
		if(Tokens::find($request->token)){
			//dd(Tokens::where('token', '=', $request->token)->first()->expiretime);
			if(Tokens::where('token', '=', $request->token)->first()->expiretime < time()){
				//dd('未過期！');
				Session::flush();
				$uid = Tokens::find($request->token)->user_id;
				Session::put('uid', $uid);
				return $next($request);
			}else{
				//dd('過期！');
				$get = Tokens::find($request->get('token'))->delete();
				$result = array('message' => 'failed', 'code' => 0, 'data' => ['msg' => 'Token已過期！']);
				return response()->json($result);
			}
		}else{
			$result = array('message' => 'failed', 'code' => 0, 'data' => ['msg' => 'Token錯誤!']);
			return response()->json($result);
		}	
	}
}