<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Tokens;
use Hash;
use Validator;

class UsersController extends Controller{

	public function postRegister(Request $request){
		$validator = Validator::make(
			[
				'name'=>$request->get('name'),
				'username'=>$request->get('username'),
				'password'=>$request->get('password'),
				'password_confirmation'=>$request->get('password_confirmation'),
				'mail'=>$request->get('mail'),
				'school_id'=>$request->get('school_id')
			],
			[
				'name'=>'required',
				'username'=>'required|unique:users,username|max:100',
				'password'=>'required|min:8|max:100|confirmed',
				'password_confirmation'=>'required',
				'mail'=>'required|email|unique:users,mail',
				'school_id'=>'required'
			]
		);
		
		if ($validator->fails()){
			$result = array('message' => 'failed', 'code' => 0);
			return response()->json($result);
		}
		else{
			$post = Users::create([
			'name' => $request->get('name'),
			'username' => $request->get('username'),
			'password' => Hash::make($request->get('password')),
			'mail' => $request->get('mail'),
			'school_id' => $request->get('school_id')
			]);

			$result = array('message' => 'success', 'code' => 1);
			return response()->json($result);
		}
	}

	public function getLogin(Request $request){
		$validator = Validator::make(
			[
				'username'=>$request->get('username'),
				'password'=>$request->get('password')
			],
			[
				'username'=>'required|max:100',
				'password'=>'required|min:8|max:100'
			]
		);

		if ($validator->fails()){
			//$result = $validator->errors()->all();
			$result = array('message' => 'vali_failed', 'code' => 0, 'token' => null);
			return response()->json($result);
		}
		else{
			$password = Users::where('username', '=', $request->get('username'))->first()->password;
			if(Hash::check($request->get('password'), $password)){
				$token = Hash::make(
					Users::where('username', '=', $request->get('username'))->first()->password.
					time()
				);

				if (!empty($_SERVER["HTTP_CLIENT_IP"])){//get ip address
    				$ip = $_SERVER["HTTP_CLIENT_IP"];
				}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
    				$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
				}else{
    				$ip = $_SERVER["REMOTE_ADDR"];
				}
				
				$get = Tokens::create([
					'user_id' => Users::where('username', '=', $request->get('username'))->first()->id,
					'token' => $token,
					'ip' => $ip
				]);
				$expiretime = strtotime(Tokens::where('token', '=', $token)->first()->created_at) + 6*60*60;

				$get = Tokens::find($token)->update(['expiretime' => date("Y-m-d H:i:s", $expiretime)]);
				$result = array('message' => 'success', 'code' => 1, 'token' => $token);
				return response()->json($result);
			}
			else{
				//$result = $validator->errors()->all();
				$result = array('message' => 'failed', 'code' => 0, 'token' => null);
				return response()->json($result);
			}
			
		}
	}
}