<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['require', 'string'],
            'description' => ['require', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.require' => 'Please add a title — it helps people understand what this is about.',
            'title.string' => 'The title should be made of words or a short phrase. Try again.',
            'description.require' => 'Don’t forget the description — it tells the full story.',
            'description.string' => 'That doesn’t look like a proper description. Try writing it out clearly.',
        ];
    }
}
