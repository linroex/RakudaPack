<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Validator;
use App\Trades;
use App\Missions;
use App\Users;

class PointController extends Controller{
	
	public function getFromMe(Request $request){
		
	}

	public function getToMe(Request $request){
	}

	public function postTrade(Request $request){
		$validator = Validator::make(
			[
				'id'=>$request->get('id'),
				'note'=>$request->get('note')
			],
			[
				'id'=>'required|exists:missions,id',
				'note'=>'required'
			]
		);
		if($validator->fails()){
			$result = array('message' => 'failed', 'code' => 0, 'data' => $validator->messages());
			return response()->json($result);
		}
		else{
			$res = Missions::where('id', '=', $request->get('id'))->first();
			
			if(Session::get('uid') === $res->creator){
				$creatorpoint = Users::where('id', '=', $res->creator)->first()->point;
				if($creatorpoint >= $res->point){
					$trade1 = Users::where('id', '=', $res->creator)
					->update(['point' => Users::where('id', '=', $res->creator)->first()->point - $res->point]);
					$trade2 = Users::where('id', '=', $res->receiver)
					->update(['point' => Users::where('id', '=', $res->receiver)->first()->point + $res->point]);

					$post = Trades::create([
						'from' => $res->creator,
						'to' => $res->receiver,
						'type' => 'mission',
						'type_id' => $request->get('id'),
						'amount' => $res->point,
						'note' => $request->get('note')
					]);
					$result = array('message' => 'success', 'code' => 1, 'data' => $validator->messages());
					return response()->json($result);

				}else{
					$result = array('message' => 'failed', 'code' => 0, 'data' => '點數餘額不足');
					return response()->json($result);
				}

			}else{
				$result = array('message' => 'failed', 'code' => 0, 'data' => '這不是你發的任務，所以不能送點喔');
				return response()->json($result);
			}
		}
	}
}