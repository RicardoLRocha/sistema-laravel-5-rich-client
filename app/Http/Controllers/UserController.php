<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginForm;
use App\Http\Requests\RegisterForm;
use App\Http\Requests\ProfileForm;
use Auth;
use App\Models\User;

class UserController extends Controller{

	/*
	* retrieve and display all users
	*/
	public function getAll(){
		return view("users.list")->with('users', User::with("cursosUser")->paginate(2)->setPath('all'));
	}



	public function getEdit($id){

		$user = User::find($id);
		
		if($user){
			return view("users.edit", compact("user"));
		}
		return redirect()->intended('users/profile');
	}

	public function postEdit(ProfileForm $profileForm, $id){

		$user = User::find($id);
		$user->email = \Request::input('email');
		$user->name = \Request::input('name');
		$user->save();
		\Session::flash('user_updated', \Lang::get("messages.user_updated"));
		return redirect()->back();
	}

	/*
	* display login form
	*/
	public function getLogin(Request $request){

		if ( Auth::check() ){
			return redirect()->back();
		}

		
		return view("users.login");
	}

	public function postLogin(Request $request, LoginForm $loginForm){
		// Con ID Request
		$email = $request-> input('email');
		$password = $request-> input('password');

		// $email = \Request::input('email');
		// $password = \Request::input('password');

		if (Auth::attempt(['email' => $email, 'password' => $password])){

			return redirect()->intended('dashboard');
		}else{

			/** ============================================================= 
				Mandamos mensaje de error (texto) en resources/land/es o en segun elijamos 
				en la misma vista users/login.blade.php  

				{{-- Incluimos el template que muestra errores --}}
				@include('includes/errors')
			============================================================= */
			return redirect('users/login')->withErrors(\Lang::get("messages.wrong_credentials"));
		}
	}

	/*
	* display register form
	*/
	public function getRegister(){

		if ( Auth::check() ){
			return redirect()->back();
		}
		return view("users.register");
	}

	/** RUTA http://localhost:8080/users/register
	*
	* Reglas puestas en Requests/RegisterForm.php
	*	
	**/
	public function postRegister(Request $request, RegisterForm $registerForm){

		// $email = \Request::input('email');
		// $password = \Hash::make(\Request::input('password'));
		// $name = \Request::input('name');
		
		$email = $request-> input('email');
		$password = \Hash::make(  $request-> input('password') );
		$name = $request-> input('name');

		$user = new User(array(
			'name' => $name,
			'email' => $email,
			'password' => $password
		));

		$user->save();

		/** =====================================================================	
		Revizo si existe ese usuario, creo su session y redirigo a vista dashboard
		===================================================================== */		
		if (Auth::attempt(['email' => $email, 'password' => $request-> input('password') ])){

			\Session::flash('success_register', \Lang::get("messages.success_register"));
			return redirect()->intended('dashboard');
		}
	}

	// ================================================================================
	/*
	* muestra la página de perfil del usuario
	*/
	public function getProfile(){

		return view("users.profile");
	}

	/** Suponemos ya tienes una sesion activa 
	y enviamos Session de cambio de perfil "success_profile" 
	*/
	public function postProfile(ProfileForm $profileForm){

		$id = Auth::user()->id;
		$user = User::find($id);
		$user->name = \Request::input('name');
		$user->email = \Request::input('email');
		$user->save();

		\Session::flash('success_profile', \Lang::get("messages.success_profile"));
		return redirect()->intended('users/profile');
	}


	// ================================================================================

	public function deleteDestroy($id){

		$user = User::find($id);
		
		if($user){
			$user->delete();

			if( ! Auth::user() ){
				return redirect('users/login');
			}
			\Session::flash('user_deleted', \Lang::get("messages.user_deleted"));
		}
		return redirect()->back();
	}

	/*
	* hace logout
	*/
	public function getLogout(){

		Auth::logout();
		return redirect('users/login');
	}

}
