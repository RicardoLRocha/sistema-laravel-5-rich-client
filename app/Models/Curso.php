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


	//un curso puede pertenecer a muchos usuarios, muchos a muchos con users
	public function users(){
		return $this->belongsToMany("App\Models\User");
	}
    
}
