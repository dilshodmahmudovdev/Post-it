<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => 'nullable|image|file|mimes:jpeg,jpg,png,webp|max:2048',
            'title' => 'required|min:3',
            'body' =>'required|min:10'
            //
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Post uchun sarlavha berishingiz shart!',
            'title.min' => 'Sarlavha kamida :min ta harf yoki belgidan iborat bo`lishi kerak!',

            'body.required' => 'Post matnini kiritishingiz shart!',
            'body.min' => 'Post matnida kamida :min ta harf yoki belgi bo`lishi kerak!',

            'image.image' => 'Faqat rasm yuklash mumkin!',
            'image.mimes' => 'Siz rasm formatidagi fayl yuklamadingiz!',
            'image.max' => 'Rasm 2mb dan oshmasligi kerak!'
        ];
    }
}
