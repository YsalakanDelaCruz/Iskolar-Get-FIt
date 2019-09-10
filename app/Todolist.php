<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{

    protected $fillable = [
    'user_id', 'content'
	];

	function scopeGetToDoList($query,$user_id){
		return $query->where('user_id',$user_id)->get();
	}

}
