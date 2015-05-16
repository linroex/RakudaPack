<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Missions;

class MissionsTableSeeder extends Seeder{
	public function run(){
		DB::table('missions')->delete();
		Missions::create([
			'name' => '幫我買便當',
			'creator' => 1,
			'receiver' => 2,
			'appointime' => '2015-05-16 23:59:59',
			'coordinate' => '40° 26′ 46″ N 79° 58′ 56″ W',
			'location' => '國際大樓504',
			'point' => 10,
			'period' => 30,
			'status' => 'unreceived',
			'note' => '快點我要餓死了',
			'expiretime' => date('Y-m-d h:i:s',time()+30*60)
		]);
	}
}