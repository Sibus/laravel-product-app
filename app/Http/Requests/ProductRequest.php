<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:10', 'max:255'],
            'art' => [
                'required',
                'string',
                'regex:/^[A-Za-z0-9]+$/i',
                Rule::unique('products')->ignore($this->input('id')),
            ],
        ];
    }
}
