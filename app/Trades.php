<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Trades extends Model{
	protected $table = 'trades';
	protected $guarded = ['id'];

	public function missions(){
		return $this->hasOne('App\Missions', 'id', 'type_id');
	}
}