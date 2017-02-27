<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    


   	protected $table = 'comments';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id', '´post_id', 'subject', 'comment'
	];


	
	public function user(){
		return $this->belongsTo->('App\Models\User');
	}

	public function post(){
		return $this->hasMany->('App\Models\Post');
	}

}
