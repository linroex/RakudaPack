<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TradesTableSeeder extends Seeder {
	DB::table('trades')->delete();
		Users::create([
			'from' => 1,
			'to' => 2,
			'type' => 'mission',
			'type_id' => 1