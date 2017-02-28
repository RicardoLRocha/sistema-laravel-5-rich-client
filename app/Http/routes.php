<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return view('welcome');
});


// Ruta para genera un usuario
/*
Route::get('/user_richi_orm', function () {
	$user = new \App\Models\User;
	$user -> name = "richi";
	$user -> email = "richi@gmail.com";
	$user -> password = Hash::make("richi");
	$user -> save();

});
*/


//seteamos el idioma seleccionado por el usuario
/*
Route::get("language/{locale}", function($locale){

	Session::set('locale', $locale);
	return redirect()->back();
});
*/

/* ===========================================
	Ejemplo de rutas

http://localhost:8080/users/login
=========================================== */

//mapeamos el controlador UserController
Route::controller('users', 'UserController');

Route::group(array('middleware' => ['auth']), function($group){

	Route::controller('dashboard', 'DashboardController');
	Route::controller('posts', 'PostsController');
	Route::controller('cursos', 'CoursesController');
});


