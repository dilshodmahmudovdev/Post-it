<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => 'required|string|max:255|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed'
        ];
    }

    public function messages()
    {
        return [

            //name
            'full_name.required' => 'Ism kiritish majburiy!',
            'full_name.max' => 'Ism juda uzun!',
            'full_name.min' => 'Ism kamida :min ta belgidan iborat bo`lishi kerak!',

            //email
            'email.required' => 'Email kiritish majburiy!',
            'email.unique' => 'Bu email allaqachon ro`yxatdan o`tqazilgan!',
            'email.email' => 'Emailingiz formato to`g`ri emas!',

            //password
            'password.required' => 'Parol kiritish majburiy!',
            'password.min' => 'Parol kamida :min ta belgidan iborat bo`lishi shart',
            'password.confirmed' => 'Parollar mos emas!'
        ];
    }
}
