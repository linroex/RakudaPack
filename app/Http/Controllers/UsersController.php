<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Tokens;
use App\Schools;
use App\Vertify_codes;
use Hash;
use Session;
use Validator;
use Mail;

class UsersController extends Controller{

	public function postRegister(Request $request){
		
		$validator = Validator::make(
			[
				'name' => $request->get('name'),
				'username' => $request->get('username'),
				'password' => $request->get('password'),
				'password_confirmation' => $request->get('password_confirmation'),
				'mail' => $request->get('mail'),
				'school_id' => $request->get('school_id')
			],
			[
				'name' => 'required',
				'username' => 'required|unique:users,username|max:100',
				'password' => 'required|min:8|max:100|confirmed',
				'password_confirmation' => 'required',
				'mail' => 'required|email|unique:users,mail',
				'school_id' => 'required|exists:schools,id'
			]
		);
		if($validator->fails()){
			
			$result = array('message' => 'failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		
		}else{
			
			$domain = explode('@', $request->mail)[1];
			//驗證是否為已登記學校信箱格式
			if(Schools::where('domain', '=', $domain)->first()){
				//判斷信箱和學校編號是否符合
				if(Schools::where('domain', '=', $domain)->first()->id === (int)$request->school_id){
					//暫存會員資料到users table內
					$post = Users::create([
						'name' => $request->get('name'),
						'username' => $request->get('username'),
						'password' => Hash::make($request->get('password')),
						'mail' => $request->get('mail'),
						'school_id' => $request->get('school_id'),
						'point' => 0,
						'type' => 'unofficial'
					]);
				
					//產生信箱驗證碼
					$vcode = Hash::make('This is vertify_code' . $request->username . $request->mail . time());
					//存取現在的user的id
					$user_id = Users::where('username', '=', $request->username)->first()->id;
					//清理此id的舊vertify_codes
					$old_vcodes = Vertify_codes::where('user_id', '=', $user_id)->get();
					foreach($old_vcodes as $old_vcode){
						$old_vcode->update(['status' => 'unuseful']);
					}
					//把產生的驗證碼存入vertify_codes table
					$vpost = Vertify_codes::create([
						'user_id' => $user_id,
						'vertify_code' => $vcode,
						'status' => 'useful'
					]);
					$mail = $request->mail;
					//寄出驗證信
					Mail::send('confirm_mail', ['vcode' => $vcode], function($message) use ($mail){
				    	$message->from('postmaster@sandbox47fc1f7d853f4fcfbfddf91e281fa6d1.mailgun.org', 'RakudaPack');
				    	$message->to($mail)->subject('RakudaPack Member Confirm');
					});
	
					$result = array('message' => 'success', 'code' => 1, 'data' => ['msg' => '已發送驗證信至 ' . $request->mail]);
					return response()->json($result);
				
				}else{
					
					$result = array('message' => 'failed', 'code' => 0, 'data' => ['msg' => '此信箱非為其學校的網域']);
					return response()->json($result);
				}
				
			}else{
				
				$result = array('message' => 'failed', 'code' => 0, 'data' => ['msg' => '信箱非為已登記學校網域']);
				return response()->json($result);
			}
				
		}
	}
	public function getConfirm(Request $request){
		//dd(Vertify_codes::find($request->vcode)->status === 'useful');
		if(Vertify_codes::find($request->vcode)->status === 'useful'){
			$get = Users::where('id', '=', Vertify_codes::find($request->vcode)->user_id)->first()->update(['type' => 'official']);
			$result = array('message' => 'success', 'code' => 1, 'data' => ['msg' => '帳號啟用成功']);
			return response()->json($result);
		}else{
			$result = array('message' => 'failed', 'code' => 0, 'data' => ['msg' => 'vertify_code unuseful']);
			return response()->json($result);
		}
	}
	
	public function getLogin(Request $request){
		
		$validator = Validator::make(
			[
				'username' => $request->get('username'),
				'password' => $request->get('password')
			],
			[
				'username' => 'required|max:100|exists:users,username',
				'password' => 'required|min:8|max:100'
			]
		);

		if ($validator->fails()){
			//$result = $validator->errors()->all();
			$result = array('message' => 'failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		}else{
			
			$password = Users::where('username', '=', $request->get('username'))->first()->password;
			
			if(Hash::check($request->get('password'), $password)){
				$token = Hash::make(
					Users::where('username', '=', $request->get('username'))->first()->username . time());

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
				$result = array('message' => 'success', 'code' => 1, 'data' => ['token' => $token]);
				return response()->json($result);
			}else{
				//$result = $validator->errors()->all();
				$result = array('message' => 'failed', 'code' => 0, 'data' => ['msg' => 'password_error']);
				return response()->json($result);
			}
			
		}
	}

	public function getLogout(Request $request){

		$get = Tokens::find($request->get('token'))->delete();
		$result = array('message' => 'success', 'code' => 1, 'data' => ['msg' => 'Logout Success!']);
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
				'school_id' => 'required|exists:schools,id'
			]
			);
		}else{
			$validator = Validator::make(
			[
				'name' => $request->get('name'),
				'mail' => $request->get('mail'),
				'school_id' => $request->get('school_id')
			],
			[
				'name' => 'required',
				'mail' => 'required|email|unique:users,mail',
				'school_id' => 'required|exists:schools,id'
			] 
			);
		}
		
		if ($validator->fails()){
			
			$result = array('message' => 'failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		}else{
			
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
				'new_password' => $request->get('new_password'),
				'new_password_confirmation' => $request->get('new_password_confirmation')
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

		}else{//驗證輸入格式
			
			$password = Users::where('id', '=', Session::get('uid'))->first()->password;
			if(Hash::check($request->get('old_password'), $password)){//驗證密碼
				$put = Users::where('id', '=', Session::get('uid'))->first()->update([
					'password' => Hash::make($request->get('new_password'))
				]);
				$result = array('message' => 'success', 'code' => 1, 'data' => $validator->messages());
				return response()->json($result);
			}else{
				$result = array('message' => 'failed', 'code' => 0, 'data' => ['msg' => 'password_error']);
				return response()->json($result);
			}

		}
	}
}