<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vertify_codes extends Model {

	protected $table = 'vertify_codes';
    protected $guarded = ['deleted_at'];
    protected $primaryKey = 'vertify_code';

}
