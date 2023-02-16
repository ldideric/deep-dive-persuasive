<?php

namespace App\Imports;

use App\Models\Result;
use App\Structs\ResultData;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ResultsImport implements ToModel, WithHeadingRow, withValidation
{
    use Importable;

    public function model(array $row): Result
    {
        $data = [
            'proteinOne' => $row['protein_one'],
            'proteinTwo' => $row['protein_two'],
            'proteinThree' => $row['protein_three'],
            'proteinFour' => $row['protein_four'],
            'controlValue' => $row['control_value'],
        ];

        return new Result([
            'patient_id' => $row['patient_id'],
            'data' => ResultData::createFromRequestData($data),
        ]);
    }

    public function rules(): array
    {
        return [
            '*.patient_id' => ['required', 'numeric', 'exists:patients,id'],
            '*.protein_one' => ['required', 'numeric', 'min:0', 'max:5'],
            '*.protein_two' => ['required', 'numeric', 'min:0', 'max:5'],
            '*.protein_three' => ['required', 'numeric', 'min:0', 'max:5'],
            '*.protein_four' => ['required', 'numeric', 'min:0', 'max:5'],
            '*.control_value' => ['required', 'numeric', 'min:1', 'max:3'],
        ];
    }
}
