<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];


    //relación uno a muchos entre users y posts
    public function posts(){
        return $this->hasMany('App\Models\Post');
    }

    //relación muchos a muchos entre usuarios y cursos
    public function cursosUser(){
        return $this->belongsToMany("App\Models\Curso");
    }

    //relación uno a muchos entre usuarios y comments
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

}
