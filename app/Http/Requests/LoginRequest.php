<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email kiritish shart!',
            'email.email' => 'Email formati noto`g`ri!',

            'password.required' => 'Parol kiritish shart!',
            'password.min' => 'Parol kamida :min ta belgidan iborat bo`lishi shart!'
        ];
    }
}
