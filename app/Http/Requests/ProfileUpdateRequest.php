<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'profile_photo' => 'nullable|bail|file|image|mimes:jpg,png,jpeg,webp|max:2048',
            'cover_photo' => 'nullable|bail|file|image|mimes:jpg,png,jpeg,webp|max:2048',
            'bio' => 'nullable|min:3|max:99'
            //
        ];
    }

    public function messages()
    {
        return [
            'profile_photo.mimes' => 'Iltimos rasm formatdagi fayllarni tanlang.',
            'cover_photo.mimes' => 'Iltimos rasm formatdagi fayllarni tanlang.',

            'bio.min' => 'Siz kiritayotgan so`z :min ta belgidan kam.',
            'bio.max' => 'Siz kiritayotgan so`z :max ta belgidan ko`p.'
        ];
    }
}
