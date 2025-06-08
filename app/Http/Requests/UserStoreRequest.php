<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'statusId' => ['require', 'integer'],
            'roleId' => ['require', 'integer'],
            'firstName' => ['require', 'string'],
            'surename' => ['require', 'string'],
            'email' => ['require', 'string', 'email'],
            'emailVerifiedAt' => ['nullable', 'timestamp'],
            'phoneNumber' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'statusId.require' => 'Oops! You need to select a status.',
            'statusId.integer' => 'Hmm... that doesn’t look like a valid option. Please choose a number.',
            'roleId.require' => 'Please select a role to continue.',
            'roleId.integer' => 'This role doesn’t seem valid. Try selecting from the list.',
            'firstName.require' => 'We’d love to know your first name!',
            'firstName.string' => 'Please enter a valid name — letters only, no funny stuff.',
            'surename.require' => 'Don’t forget your last name!',
            'surename.string' => 'That doesn’t look like a real last name. Please try again.',
            'email.require' => 'We need your email to stay in touch.',
            'email.string' => 'This email looks a bit off — check for typos.',
            'email.email' => 'Hmm... that doesn’t look like a real email address.',
            'emailVerifiedAt.nullable' => 'You can skip this — we’ll handle it later.',
            'emailVerifiedAt.timestamp' => 'This date looks strange. Can you double-check it?',
            'phoneNumber.nullable' => 'Phone number is optional — feel free to skip.',
            'phoneNumber.string' => 'That doesn’t look like a phone number we recognize. Try again.',
        ];
    }
}
