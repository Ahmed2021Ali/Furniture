<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubCategory extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:250'],
            'description' => ['required', 'string', 'max:256', 'min:2'],
            'images.*' => ['required', 'mimes:png,jpg,jpeg,webp'],
            'category_id' => ['required', 'string', 'exists:categories,id'],

        ];
    }
}
