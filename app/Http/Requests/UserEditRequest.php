<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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

   public function rules()
    {
        return [
            'username' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            //'password' => 'required',
            'role_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'El campo Usuario es obligatorio',
            //'username.min' => 'El campo Usuario necesita minimo 4 caracteres    ',
        ];
    }
}
