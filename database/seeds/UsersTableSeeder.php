<?php
	
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Users;

class UsersTableSeeder extends Seeder {
	public function run(){
		DB::table('users')->delete();
		Users::create([
			'name'=>'徐聖翔',
			'username' => 'seisyo1234',
			'password' => Hash::make('12345678'),
			'school_id' => 1,
			'mail' => 'seisyo1234@gmail.com',
			'point' => 10000,
			'type' => 'official'

		]);
	}
}