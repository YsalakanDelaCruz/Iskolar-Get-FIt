<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weightcal extends Model
{
    protected $fillable = [
    'user_id', 'weight'
	];

	function scopeGetWeight($query,$user_id){
		return $query->where('user_id',$user_id)->get();
	}
	
}
