<?php

namespace App\Http\Validations;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

class ValidOrder extends FormRequest
{
    public function authorize()
    {
        return true;
    }
		
    public function rules()
    {
		$rules = [
			'company' => 'required|between:3,60',
			'name' => 'required|between:5,60',
			'email' => 'required|email',
			'phone' => 'required',
			'adress' => 'required|between:10,500',
			'details' => 'required|between:10,6400',
		];

		return $rules;
    }
}