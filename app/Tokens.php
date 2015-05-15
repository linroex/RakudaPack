<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tokens extends Model{
	protected $table = 'tokens';
	protected $guarded = ['deleted_at'];
	protected $primaryKey = 'token';

	public function getDates() {
		return [];
	}
}