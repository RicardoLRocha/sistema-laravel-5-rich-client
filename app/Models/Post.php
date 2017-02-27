<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{

	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id', 'title', 'foto', 'content'
	];


	
	public function user(){
		return $this->belongsTo->('App\Models\User');
	}

	public function comments(){
		return $this->hasMany->('App\Models\Comment');
	}


}

