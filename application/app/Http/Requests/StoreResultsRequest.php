<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResultsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'proteinOne' => 
                $this->isPrecognitive()
                    ? ['required', 'numeric', 'min:0', 'max:5']
                    : ['required', 'numeric', 'min:0', 'max:5'],
            'proteinTwo' => 
                $this->isPrecognitive()
                    ? ['required', 'numeric', 'min:0', 'max:5']
                    : ['required', 'numeric', 'min:0', 'max:5'],
            'proteinThree' =>
                $this->isPrecognitive()
                    ? ['required', 'numeric', 'min:0', 'max:5']
                    : ['required', 'numeric', 'min:0', 'max:5'],
            'proteinFour' =>
                $this->isPrecognitive()
                    ? ['required', 'numeric', 'min:0', 'max:5']
                    : ['required', 'numeric', 'min:0', 'max:5'],
            'signalValue' => 
                $this->isPrecognitive()
                    ? ['required', 'numeric', 'min:1', 'max:3']
                    : ['required', 'numeric', 'min:1', 'max:3'],
        ];
    }
}
