<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakeOrderRequest extends FormRequest
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
            'email' => 'required|string',
            'phone' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'The Email field is required',
            'email.string' => 'The Email field`s data type is string',
            'phone.required' => 'The Phone field is required',
            'phone.string' => 'The Phone field`s data type is string',
        ];
    }
}
