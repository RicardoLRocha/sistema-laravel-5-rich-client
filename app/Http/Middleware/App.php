<?php

namespace App\Http\Middleware;

// agrego
use Closure, Session;


/** Registrar este middleware como GLOBAL 
en

Kernel.php

protected $middlewareGroups = [
	'web' => [
		...
		\App\Http\Middleware\App::class,


*/

class App{

	protected $languages = ['en', 'es'];

		/**
		 * Handle an incoming request.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \Closure  $next
		 * @return mixed
		 */
	public function handle($request, Closure $next){

		if( !Session::has('locale')){
			Session::put('locale', $request->getPreferredLanguage($this->languages));
		}

		app()->setLocale( Session::get('locale') );

		return $next($request);
	}


}
