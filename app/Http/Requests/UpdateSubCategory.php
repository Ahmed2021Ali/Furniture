<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubCategory extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'min:2', 'max:250'],
            'description' => ['nullable', 'string', 'max:256', 'min:2'],
            'images.*' => ['nullable', 'mimes:png,jpg,jpeg,webp'],
            'category_id' => ['nullable', 'string'],
        ];
    }
}
