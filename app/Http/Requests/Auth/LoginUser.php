<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginUser extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'=>['required','email','min:5','max:60'],
            'password' => ['required','min:8','max:60'],
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => __('val/messages.required'),
            'email.email' => __('val/messages.email'),
            'email.max' => __('val/messages.max', ['n' => 60]),
            'email.min' => __('val/messages.min', ['n' => 5]),

            'password.required' => __('val/messages.required'),
            'password.min' => __('val/messages.min', ['n' => 8]),
            'password.max' => __('val/messages.max', ['n' => 60]),
        ];
    }
}
