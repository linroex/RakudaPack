<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
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

	public function postLogin(Request $request){
		$validator = Validator::make(
			[
				'username'=>$request->get('username'),
				'password'=>$request->get('password')
			],
			[
				'username'=>'required|unique:users,username|max:100',
				'password'=>'required|min:8|max:100|confirmed'
			]
		);


		if ($validator->fails()){
			$result = array('message' => 'failed', 'code' => 0, 'token' => null);
			return response()->json($result);
		}
		else{
			dd(123);
		}
	}
}