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


    //un comentario pertenece a un usuario
	public function user(){
		return $this->belongsTo('App\Models\User');
	}

    //un comentario pertenece a un post --> belongsTo
	public function post(){
		return $this->hasMany('App\Models\Post');
	}

}
