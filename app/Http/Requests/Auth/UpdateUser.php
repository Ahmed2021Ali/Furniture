<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUser extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'min:3', 'max:100'],
            'address' => ['nullable', 'string', 'min:2', 'max:200'],
            'phone' => ['nullable', 'string', 'min:3', 'max:50'],
            'email' => ['nullable', 'email', 'min:5', 'max:55'],
            'images.*' => ['nullable', 'mimes:png,jpg,jpeg,webp'],
            'password' => ['nullable', 'min:8', 'max:500', 'confirmed'],
        ];
    }

/*    public function messages(): array
    {
        return [
            'name.required' => 'حقل  الاسم مطلوب.',
            'string.required' => 'حقل الاسم لابد ان يكون احرف .',
            'min.required' => 'حقل الاسم لا يقل عن 3 حرف ',
            'max.required' => 'حقل الاسم لا يزيد عن 100 حرفًا ',

            'email.required' => 'حقل البريد الإلكتروني مطلوب.',
            'email.email' => 'يرجى إدخال عنوان بريد إلكتروني صالح.',
            'email.max' => 'يجب ألا يتجاوز طول البريد الإلكتروني 55 حرفًا.',
            'email.min' => 'يجب أن يكون طول البريد الإلكتروني على الأقل 5 أحرف.',

            'password.required' => 'حقل كلمة المرور مطلوب.',
            'password.confirmed' => 'حقل كلمة المرور لابد عن يكون متطابق.',
            'password.min' => 'يجب أن تحتوي كلمة المرور على الأقل 8 أحرف.',
            'password.max' => 'يجب ألا تتجاوز كلمة المرور 50 حرفًا.',
        ];
    }*/

}
