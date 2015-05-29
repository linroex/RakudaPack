<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Missions;
use Session;

class MissionsController extends Controller{
	
	public function getAll(Request $request){//查詢所有“可接任務”
		
		$gets = Missions::where('status', '=', 'unreceived')->get();
		$a = array();
		foreach($gets as $get){
			array_push($a, $get);
		}
		$result = array('message' => 'success', 'code' => 1, 'data' => $a);
		return response()->json($result);
	}

	public function getRecNow(Request $request){//查詢正接任務
		
		$gets = Missions::where('receiver', '=', Session::get('uid'))->where('status', '=', 'unreceived')->get();
		$a = array();
		foreach($gets as $get){
			array_push($a, $get);
		}
		$result = array('message' => 'success', 'code' => 1, 'data' => $a);
		return response()->json($result);
	}

	public function getCreNow(Request $request){//查詢正發任務
		$gets = Missions::where('creator', '=', Session::get('uid'))->where('status', '=', 'unreceived')->get();
		$a = array();
		foreach($gets as $get){
			array_push($a, $get);
		}
		$result = array('message' => 'success', 'code' => 1, 'data' => $a);
		return response()->json($result);
	}

	public function getRecHis(Request $request){//查詢接任記錄
		$gets = Missions::where('receiver', '=', Session::get('uid'))->get();
		$a = array();
		foreach($gets as $get){
			array_push($a, $get);
		}
		$result = array('message' => 'success', 'code' => 1, 'data' => $a);
		return response()->json($result);
	}

	public function getCreHis(Request $request){//查詢發任記錄
		$gets = Missions::where('creator', '=', Session::get('uid'))->get();
		$a = array();
		foreach($gets as $get){
			array_push($a, $get);
		}
		$result = array('message' => 'success', 'code' => 1, 'data' => $a);
		return response()->json($result);
	}

	public function getId(Request $request){//ID查詢(顯示"可接"詳細時用)
		
		$validator = Validator::make(
			['id' => $request->get('id')],
			['id' => 'required']
		);
		if($validator->fails()){
			
			$result = array('message' => 'failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);

		}else{
			$gets = Missions::where('id', '=', $request->id)->where('status', '=', 'unreceived')->get();
			$a = array();
			foreach($gets as $get){
				array_push($a, $get);
			}
			$result = array('message' => 'success', 'code' => 1, 'data' => $a);
			return response()->json($result);
		}
		
	}

	public function getCoor(Request $request){//定位查詢(顯示"可接"詳細時用)
		
		$validator = Validator::make(
			['latitude'=>$request->get('latitude'),
			 'longitude'=>$request->get('longitude')],
			['latitude'=>'required',
			 'longitude'=>'required']
		);
		if ($validator->fails()){
			
			$result = array('message' => 'failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);

		}else{
			$gets = Missions::where('latitude', '=', $request->latitude)->where('longitude', '=', $request->longitude)->where('status', '=', 'unreceived')->get();
			$a = array();
			foreach($gets as $get){
				array_push($a, $get);
			}
		
			$result = array('message' => 'success', 'code' => 1, 'data' => $a);
			return response()->json($result);
		}
	}

	public function postMission(Request $request){
		$validator = Validator::make(
			[
				'name' => $request->get('name'),
				'appointime' => $request->get('appointime'),
				'point' => $request->get('point'),
				'period' => $request->get('period'),
				'latitude' => $request->get('latitude'),
				'longitude' => $request->get('longitude'),
				'location' => $request->get('location'),
				'note' => $request->get('note')
			],
			[
				'name' => 'required',
				'appointime' => 'required|date',
				'point' => 'required',
				'period' =>'required',
				'latitude' => 'required',
				'longitude' => 'required',
				'location' => 'required',
				'note' => 'required'
			]
		);
		if ($validator->fails()){
			$result = array('message' => 'failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		}else{
			$post = Missions::create([
				'name' => $request->get('name'),
				'appointime' => $request->get('appointime'),
				'point' => $request->get('point'),
				'period' => $request->get('period'),
				'latitude' => $request->get('latitude'),
				'longitude' => $request->get('longitude'),
				'location' => $request->get('location'),
				'note' => $request->get('note'),
				'status' => 'unreceived',
				'expiretime' => date('Y-m-d H:i:s',time() + $request->get('period')*60),
				'creator' => Session::get('uid')
			]);

			$result = array('message' => 'success', 'code' => 1, 'data' => $validator->messages());
			return response()->json($result);
		}
	}

	public function putMission(Request $request){
		$validator = Validator::make(
			[
				'id' => $request->get('id'),
				'name' => $request->get('name'),
				'appointime' => $request->get('appointime'),
				'point' => $request->get('point'),
				'latitude' => $request->get('latitude'),
				'longitude' => $request->get('longitude'),
				'location' => $request->get('location'),
				'note' => $request->get('note')
			],
			[
				'id' => 'required|exists:missions,id',
				'name' => 'required',
				'appointime' => 'required|date',
				'point' => 'required',
				'latitude' => 'required',
				'longitude' => 'required',
				'location' => 'required',
				'note' => 'required'
			]
		);
		if ($validator->fails()){
			$result = array('message' => 'failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		}else{
			$put = Missions::where('id', '=', $request->get('id'))->first()->update([
				'name' => $request->get('name'),
				'appointime' => $request->get('appointime'),
				'point' => $request->get('point'),
				'latitude' => $request->get('latitude'),
				'longitude' => $request->get('longitude'),
				'location' => $request->get('location'),
				'note' => $request->get('note')
			]);

			$result = array('message' => 'success', 'code' => 1, 'data' => $validator->messages());
			return response()->json($result);
		}
	}

	public function putMissCan(Request $request){
		$validator = Validator::make(
			['id' => $request->get('id')],
			['id' => 'required|exists:missions,id']
		);
		if ($validator->fails()){
			$result = array('message' => 'failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		}else{
			$put = Missions::where('id', '=', $request->get('id'))->first()->update([
				'status' => 'cancel'
			]);
			$result = array('message' => 'success', 'code' => 1, 'data' => $validator->messages());
			return response()->json($result);
		}
	}

	public function putMissFin(Request $request){
		$validator = Validator::make(
			['id' => $request->get('id')],
			['id' => 'required|exists:missions,id']
		);
		if ($validator->fails()){
			$result = array('message' => 'failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		}else{
			$put = Missions::where('id', '=', $request->get('id'))->first()->update([
				'status' => 'finish'
			]);
			$result = array('message' => 'success', 'code' => 1, 'data' => $validator->messages());
			return response()->json($result);
		}
	}

	public function putMissAcc(Request $request){
		$validator = Validator::make(
			['id' => $request->get('id')],
			['id' => 'required|exists:missions,id']
		);
		if ($validator->fails()){
			$result = array('message' => 'failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		}else{
			//dd(Missions::where('id', '=', $request->get('id'))->first()->creator . Session::get('uid'));
			if(Session::get('uid') === Missions::where('id', '=', $request->get('id'))->first()->creator){
				$result = array('message' => 'failed', 'code' => 0, 'data' => '不能接自己的任務');
				return response()->json($result);
			}else{
				$put = Missions::where('id', '=', $request->get('id'))->first()->update([
					'status' => 'received',
					'receiver' => Session::get('uid')
				]);
				$result = array('message' => 'success', 'code' => 1, 'data' => $validator->messages());
				return response()->json($result);
			}
			
		}
	}

}