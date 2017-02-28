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
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(\Request::segment(3))
        {
            return [
               "curso"      =>    "required|field_in_use:cursos,id",
           ];
        }
        else
        {
            return [
               "curso"      =>    "required|unique:cursos",
           ];
        }
    }
}
