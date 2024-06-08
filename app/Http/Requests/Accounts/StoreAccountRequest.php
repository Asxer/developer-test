<?php

namespace App\Http\Requests\Accounts;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'owner_id' => 'required|numeric|exists:users,id',
            'phone' => 'required',
            'country' => 'required|string',
            'address' => 'required|string',
            'town_city' => 'required|string',
            'post_code' => 'required',
        ];
    }
}
