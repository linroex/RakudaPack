<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Missions extends Model{
	
    protected $table = 'missions';
	protected $guarded = ['id'];
}