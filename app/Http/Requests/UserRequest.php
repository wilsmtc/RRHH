<?php
 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|unique:users',
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'role_id' => 'required'
            // 'add' => 'required',
            // 'edit' => 'required',
            // 'remove' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'El campo Usuario es obligatorio',
            'username.unique' => 'Ya Existe el Usuario',
            'email.unique' => 'Ya Existe el Email',
            //'username.min' => 'El campo Usuario necesita minimo 4 caracteres    ',
        ];
    }
}
