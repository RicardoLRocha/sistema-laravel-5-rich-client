<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model{


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'course'
	];


	
	public function user(){
		return $this->belongsToMany->('App\Models\User');
	}

	public function post(){
		return $this->hasMany->('App\Models\Post');
	}
    
}
