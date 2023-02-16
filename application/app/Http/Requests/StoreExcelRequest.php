<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExcelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'file' => 'required|file|mimes:xlsx,xls,csv',
            'patientId' => 'required|numeric|exists:patients,id',
        ];
    }
}
