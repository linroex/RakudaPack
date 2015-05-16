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
			'expiretime' => date('Y-m-d H:i:s',time()+30*60)
		]);
		Missions::create([
			'name' => '幫我買早餐',
			'creator' => 1,
			'receiver' => 2,
			'appointime' => '2015-05-16 23:12:59',
			'coordinate' => '40° 26′ 46″ N 79° 58′ 56″ W',
			'location' => '國際大樓506',
			'point' => 10,
			'period' => 30,
			'status' => 'unreceived',
			'note' => '快點我要餓死了',
			'expiretime' => date('Y-m-d H:i:s',time()+30*60)
		]);
		Missions::create([
			'name' => '幫我買晏辰',
			'creator' => 1,
			'receiver' => 2,
			'appointime' => '2015-05-09 23:12:59',
			'coordinate' => '40° 26′ 46″ N 79° 58′ 56″ W',
			'location' => '國際大樓709',
			'point' => 10,
			'period' => 30,
			'status' => 'received',
			'note' => '快點我要餓死了',
			'expiretime' => date('Y-m-d H:i:s',time()+30*60)
		]);
		Missions::create([
			'name' => '幫我買晏辰',
			'creator' => 1,
			'receiver' => 2,
			'appointime' => '2015-05-09 23:12:59',
			'coordinate' => '40° 26′ 46″ N 79° 58′ 56″ W',
			'location' => '國際大樓709',
			'point' => 10,
			'period' => 30,
			'status' => 'finish',
			'note' => '快點我要餓死了',
			'expiretime' => date('Y-m-d H:i:s',time()+30*60)
		]);
	}
}