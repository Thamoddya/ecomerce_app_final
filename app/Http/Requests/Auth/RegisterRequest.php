<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'=>"required|max:255",
            'last_name'=>"required|max:255",
            'email'=>"required|max:255|email|unique:users",
            'mobile'=>'required|max:11|min:10|unique:users',
            'address'=>'required',
            'password'=>'confirmed|required|max:255',
            'roles_id'=>'required|int',
            'image_url'=>'sometimes',
        ];
    }
}
