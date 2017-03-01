<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileForm extends Request
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
     * tenemos Validacion field_in_use para que tambien sea unico 
     * y si lo cambian y existe regrese un error True
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email"      =>    "required|field_in_use:users,id",
            "name"	     =>	   "required|min:2|max:255"
        ];
    }
}
