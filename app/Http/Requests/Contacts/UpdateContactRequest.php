<?php

namespace App\Http\Requests\Contacts;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => 'string',
            'last_name' => 'string',
            'email' => 'string|email',
            'phone' => 'string',
            'position' => 'string',
            'account_id' => 'numeric|exists:accounts,id',
        ];
    }
}
