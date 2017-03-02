<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use Validator;
use DB;

class AppServiceProvider extends ServiceProvider{

	/**
	* Revizar: Custom Validation Rules
	*	Extends de los Requests en function rules(){ ... }
	*
	*	Comprobar la Regla "field_in_use" para que no sean iguales
	*
	* @return True si falla y existe uno igual, False si es unico
	*/
	public function boot(){

		/** Como VARIABLES GLOBALES
		view()->share('key', 'value');
	 	*/

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
