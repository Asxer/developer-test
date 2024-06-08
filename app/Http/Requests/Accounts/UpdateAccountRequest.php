<?php

namespace App\Http\Requests\Accounts;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
{
    public function rules()
    {
        logger($this->all());

        return [
            'name' => 'string|required',
            'owner_id' => 'numeric|required|exists:users,id',
            'phone' => 'required',
            'country' => 'string|required',
            'address' => 'string|required',
            'town_city' => 'string|required',
            'post_code' => 'required',
        ];
    }
}
