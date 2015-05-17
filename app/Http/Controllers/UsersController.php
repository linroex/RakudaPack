<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Tokens;
use Hash;
use Session;
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
				'school_id'=>'required|exists:schools,id'
			]
		);
		if ($validator->fails()){
			$result = array('message' => 'failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		}
		else{
			$post = Users::create([
				'name' => $request->get('name'),
				'username' => $request->get('username'),
				'password' => Hash::make($request->get('password')),
				'mail' => $request->get('mail'),
				'school_id' => $request->get('school_id'),
				'point' => 0,
				'type' => 'unofficial'
			]);

			$result = array('message' => 'success', 'code' => 1, 'data' => $validator->messages());
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
				'username'=>'required|max:100|exists:users,username',
				'password'=>'required|min:8|max:100'
			]
		);
		
		if($validator->fails()){
			//$result = $validator->errors()->all();
			$result = array('message' => 'vali_failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		}else{
			$password = Users::where('username', '=', $request->get('username'))->first()->password;
			
			if(Hash::check($request->get('password'), $password)){
				
				$token = Hash::make(
					Users::where('username', '=', $request->get('username'))->first()->username . time()
				);
				
				if (!empty($_SERVER["HTTP_CLIENT_IP"])){//get ip address
    				$ip = $_SERVER["HTTP_CLIENT_IP"];
				}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
    				$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
				}else{
    				$ip = $_SERVER["REMOTE_ADDR"];
				}

				$get = Tokens::create([//先存基本資料
					'user_id' => Users::where('username', '=', $request->get('username'))->first()->id,
					'token' => $token,
					'ip' => $ip,
					'expiretime' => date('Y-m-d H:i:s',time()+6*60*60)
				]);
				// $expiretime = strtotime(Tokens::where('token', '=', $token)->first()->created_at) + 6*60*60;
				// //補上expiretime
				// $get = Tokens::find($token)->update(['expiretime' => date("Y-m-d H:i:s", $expiretime)]);
				$result = array('message' => 'success', 'code' => 1, 'token' => $token);
				return response()->json($result);
			}
			else{
				//$result = $validator->errors()->all();
				$result = array('message' => 'failed', 'code' => 0, 'data' => 'password_error');
				return response()->json($result);
			}
			
		}
	}

	public function getLogout(Request $request){

		$get = Tokens::find($request->get('token'))->delete();
		$result = array('message' => 'success', 'code' => 1, 'data' => $validator->messages());
		Session::flush();
		return response()->json($result);
	}

	public function getData(Request $request){

		$result = Users::where('id', '=', Session::get('uid'))->first();
		$result = array(
			'name' => $result->name, 
			'username' => $result->username,
			'school_name' => $result->schools->name,
			'mail' => $result->mail,
			'point' => $result->point
		);
		return response()->json(array('message' => 'success', 'code' => 1, 'data' => $result));

	}

	public function putData(Request $request){
		//$this->middleware('check');
		if($request->mail === Users::where('id', '=', Session::get('uid'))->first()->mail){

			$validator = Validator::make(
			[
				'name' => $request->get('name'),
				'school_id' => $request->get('school_id')
			],
			[
				'name'=>'required',
				'school_id'=>'required|exists:schools,id'
			]
			);
		}
		else{
			$validator = Validator::make(
			[
				'name' => $request->get('name'),
				'mail' => $request->get('mail'),
				'school_id' => $request->get('school_id')
			],
			[
				'name'=>'required',
				'mail'=>'required|email|unique:users,mail',
				'school_id'=>'required|exists:schools,id'
			]
			);
		}
		
		if ($validator->fails()){
			$result = array('message' => 'vali_failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		}
		else{
			$put = Users::where('id', '=', Session::get('uid'))->first()
			->update([
				'name' => $request->name,
				'mail' => $request->mail,
				'school_id' => $request->school_id
			]);
			$result = array('message' => 'success', 'code' => 1, 'data' => $validator->messages());
			return response()->json($result);
		}
	}

	public function putPassword(Request $request){
		$validator = Validator::make(
			[
				'old_password' => $request->get('old_password'),
				'new_password'=>$request->get('new_password'),
				'new_password_confirmation'=>$request->get('new_password_confirmation')
			],
			[
				'old_password' => 'required|min:8|max:100',
				'new_password' => 'required|min:8|max:100|confirmed',
				'new_password_confirmation' => 'required'
			]
		);//驗證輸入
		if ($validator->fails()){
			$result = array('message' => 'vali_failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		}//驗證輸入格式
		else{
			$password = Users::where('id', '=', Session::get('uid'))->first()->password;
			if(Hash::check($request->get('old_password'), $password)){//驗證密碼
				$put = Users::where('id', '=', Session::get('uid'))->first()->update([
					'password' => Hash::make($request->get('new_password'))
				]);
				$result = array('message' => 'success', 'code' => 1, 'data' => $validator->messages());
				return response()->json($result);
			}
			else{
				$result = array('message' => 'failed', 'code' => 0, 'data' => 'password_error');
				return response()->json($result);
			}

		}
	}
}