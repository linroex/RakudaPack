<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Missions;
use Session;

class MissionsController extends Controller{
	
	public function getAll(Request $request){//查詢所有“可接任務”
		
		$gets = Missions::where('status', '=', 'unreceived') -> get();
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

	public function getId(Request $request){//ID查詢
		$gets = Missions::where('id', '=', $request->mission_id)->get();
		$a = array();
		foreach($gets as $get){
			array_push($a, $get);
		}
		
		$result = array('message' => 'success', 'code' => 1, 'data' => $a);
		return response()->json($result);
	}

	public function getCoor(Request $request){//定位查詢
		$gets = Missions::where('coordinate', '=', $request->coordinate)->where('status', '=', 'unreceived')->get();
		$a = array();
		foreach($gets as $get){
			array_push($a, $get);
		}
		
		$result = array('message' => 'success', 'code' => 1, 'data' => $a);
		return response()->json($result);
	}

	public function postMission(Request $request){
		
	}

}