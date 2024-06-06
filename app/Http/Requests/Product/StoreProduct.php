<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:256', 'min:2'],
            'description' => ['required', 'string', 'min:2'],
            'price' => ['required', 'numeric', 'max:999999', 'min:1'],
            'offer' => ['nullable', 'integer', 'max:99', 'min:1'],
            'sub_category_id' => ['required', 'string', 'exists:subcategories,id'],
            'images.*' => ['required', 'mimes:png,jpg,jpeg,webp'],
            'colors_id.*' => ['nullable', 'numeric', 'exists:colors,id'],
            'sizes_id.*' => ['nullable', 'numeric', 'exists:categories,id'],

        ];
    }
}
