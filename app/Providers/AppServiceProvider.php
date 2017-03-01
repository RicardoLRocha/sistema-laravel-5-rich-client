<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use Validator;
use DB;

class AppServiceProvider extends ServiceProvider{

	/**
	 * Como VARIABLES GLOBALES
		view()->share('key', 'value');
	 *
		y Validaciones

	 * @return void
	 */
	public function boot(){

		Validator::extend('field_in_use', function($attribute, $value, $parameters){

			/** 
			Segmento de la URL
			*/
			$id = \Request::segment(3) ? \Request::segment(3) : Auth::user()->id;
			$attr = Db::table($parameters[0])
				->where($parameters[1], "!=", $id)
				->where($attribute, "=", $value)
				->get();

			if ( sizeof( $attr ) == 0 ){
				 return true;
			}
			return false;
		});

	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register(){
		
		
	}
}
