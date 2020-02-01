<?php

namespace App\Http\Validations;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class ValidMessage extends FormRequest
{
    public function authorize()
    {
        return true;
    }
		
    public function rules()
    {
		return [
			'name' => 'required|between:5,60',
			'phone' => 'required',
			'email' => 'required|email',
			'text' => 'required|between:10,6400',
		];
    }
}
