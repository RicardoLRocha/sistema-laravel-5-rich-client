<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostForm extends Request
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
               "title"      =>    "required|field_in_use:posts,id",
               "content"	=>	  "required|min:5"
           ];
        }
        else
        {
            return [
               "title"      =>    "required|unique:posts",
               "content"	=>	  "required|min:5"
           ];
        }
    }
}
