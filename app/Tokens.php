<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tokens extends Model{
	use SoftDeletes;

	protected $table = 'tokens';
	protected $guarded = ['deleted_at'];
	protected $primaryKey = 'token';


	public function getDates() {
		return [];
	}
}