<?php
	
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\schools;

class SchoolsTableSeeder extends Seeder {
	public function run(){
		DB::table('schools')->delete();
		Schools::create([
			'name' => '國立台灣大學',
			'domain' => 'ntu.edu.tw'
		]);
		Schools::create([
			'name' => '國立台灣科技大學',
			'domain' => 'mail.ntust.edu.tw'
		]);
		Schools::create([
			'name' => '國立政治大學',
			'domain' => 'nccu.edu.tw'
		]);
	}
}