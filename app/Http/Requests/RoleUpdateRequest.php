<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['require', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.require' => 'Please add a title — we can’t save this without one.',
            'title.string' => 'That title doesn’t look right. Try using words or a short sentence.',
        ];
    }
}
