<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CursoForm extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(){

		return true; // activa autorizacion
	}

	/**
	 * 
	 *
	 * @return rules
	 */
	public function rules(){

		/** ================================================== 
		Si existe un id de ese curso por (URL 3er segmento), 
		reviza que no haya otro igual.
		sino "else" estamos EDITANDO update
		================================================== */
		if(\Request::segment(3)){
		
			return [
			   "course"      =>    "required|field_in_use:courses,id",
		   ];
		}else{

			return [
			   "course"      =>    "required|unique:courses",
		   ];
		}
	}


}
