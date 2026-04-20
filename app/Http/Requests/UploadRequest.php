<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => 'bail|required|file|image|mimes:jpeg,jpg,png|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Iltimos rasm ham uyklang!',
            'image.image' => 'Faqat rasm yuklash mumkin!',
            'image.mimes' => 'Siz rasm formatidagi fayl yuklamadingiz!',
            'image.max' => 'Rasm 2mb dan oshmasligi kerak!'
        ];
    }
}
