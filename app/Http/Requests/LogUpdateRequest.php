<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dataBefore' => ['nullable', 'json'],
            'dataAfter' => ['nullable', 'json'],
            'message' => ['require', 'string'],
            'comment' => ['nullable', 'string'],
            'severity' => ['require', 'enum'],
        ];
    }

    public function messages(): array
    {
        return [
            'dataBefore.nullable' => 'You can leave this empty if there’s nothing to add here.',
            'dataBefore.json' => 'The information before must be in the correct format. Please check and try again.',
            'dataAfter.nullable' => 'Feel free to leave this blank if you don’t have anything new to add.',
            'dataAfter.json' => 'The information after must be in the correct format. Please double-check it.',
            'message.require' => 'Please write a message — it helps us understand what happened.',
            'message.string' => 'The message should be text you can read. Please try again.',
            'comment.nullable' => 'Comments are optional — add anything extra if you want.',
            'comment.string' => 'The comment should be readable text. Please check and fix it.',
            'severity.require' => 'Please select how serious this is — it helps us prioritize.',
            'severity.enum' => 'That choice isn’t valid. Please select from the options provided.',
        ];
    }
}
