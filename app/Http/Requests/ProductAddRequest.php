<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
        return [
            'name' => 'required|unique:products|string',
            'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The Name field is required',
            'name.string' => 'The Name field`s data type is string',
            'name.unique' => 'The Name field`s data must be unique',
            'price.numeric' => 'The Price field`s data type is string',
            'price.required' => 'The Price field is required',
        ];
    }
}
