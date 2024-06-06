<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUser extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function ruleds(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:200'],
            'email' => ['required', 'email', 'unique:users,email', 'min:5', 'max:60'],
            'password' => ['required', 'min:8', 'max:60', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('val/messages.required'),
            'name.string' => __('val/messages.string'),
            'name.min' => __('val/messages.min', ['n' => 2]),
            'name.max' => __('val/messages.max', ['n' => 200]),

            'email.required' => __('val/messages.required'),
            'email.email' => __('val/messages.email'),
            'email.max' => __('val/messages.max', ['n' => 60]),
            'email.min' => __('val/messages.min', ['n' => 5]),

            'password.required' => __('val/messages.required'),
            'password.confirmed' => __('val/messages.confirmed'),
            'password.min' => __('val/messages.min', ['n' => 8]),
            'password.max' => __('val/messages.max', ['n' => 60]),
        ];
    }
}
