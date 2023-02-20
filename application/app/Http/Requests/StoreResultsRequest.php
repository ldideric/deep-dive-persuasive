<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResultsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'proteinOne' => $this->isPrecognitive()
                    ? ['nullable', 'numeric', 'min:0', 'max:5']
                    : ['required', 'numeric', 'min:0', 'max:5'],
            'proteinTwo' => $this->isPrecognitive()
                    ? ['nullable', 'numeric', 'min:0', 'max:5']
                    : ['required', 'numeric', 'min:0', 'max:5'],
            'proteinThree' => $this->isPrecognitive()
                    ? ['nullable', 'numeric', 'min:0', 'max:5']
                    : ['required', 'numeric', 'min:0', 'max:5'],
            'proteinFour' => $this->isPrecognitive()
                    ? ['nullable', 'numeric', 'min:0', 'max:5']
                    : ['required', 'numeric', 'min:0', 'max:5'],
            'controlValue' => $this->isPrecognitive()
                    ? ['nullable', 'numeric', 'min:1', 'max:3']
                    : ['required', 'numeric', 'min:1', 'max:3'],
        ];
    }
}
