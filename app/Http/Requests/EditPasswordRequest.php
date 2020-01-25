<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'password.required' => 'El campo Usuario es obligatorio',
            //'username.min' => 'El campo Usuario necesita minimo 4 caracteres    ',
        ];
    }
}
