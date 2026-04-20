<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'body' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'body.required' => 'Avval izoh yozing va keyin yuboring.',
            'body.max' => 'Kamida 3 ta belgi kiritib keyin yuboring.'
        ];
    }
}
