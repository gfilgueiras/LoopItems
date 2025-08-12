
/**
 * Copyright (c) 2025 Sua Empresa. Todos os direitos reservados.
 */
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatusStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Plase add a title — we can’t save this without one.',
            'title.string' => 'That title doesn’t look right. Try using words or a short sentence.',
        ];
    }
}
