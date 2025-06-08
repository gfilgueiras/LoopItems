<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'path' => ['require', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'path.require' => 'We need a path to continue — please fill it in.',
            'path.string' => 'The path should be written using text. Please check and try again.',
        ];
    }
}
