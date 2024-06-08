<?php

namespace App\Http\Requests\Accounts;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'string',
            'owner_id' => 'numeric|exists:users,id',
            'phone' => 'string',
            'country' => 'string',
            'address' => 'string',
            'town_city' => 'string',
            'post_code' => 'string',
        ];
    }
}
