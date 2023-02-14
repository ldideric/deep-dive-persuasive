<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreTwoFactorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'two_factor_code' => ['required', 'integer', 'digits:6'],
        ];
    }
}
