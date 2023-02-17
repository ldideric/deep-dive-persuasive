<?php

namespace App\Services;

use App\Enums\Risk;
use App\Models\Patient;
use App\Models\Result;
use App\Structs\ResultData;

class ResultsService
{
    public function createFromPatientData(Patient $patient): array
    {
        $patientWithResults = $patient->load('results');

        return $patientWithResults->results->map(function ($result) use ($patient) {
            $risk = $this->calculateRisk($result->data, $patient);

            return [
                'id' => $result->id,
                'date' => $result->created_at,
                'value' => $risk,
                'risk' => $this->getRiskValue($risk),
            ];
        })->toArray();
    }

    public function createFromResult(Patient $patient, int $id): array
    {
        $result = $patient->results()->where('id', $id)->first();

        $risk = $this->calculateRisk($result->data, $patient);

        return [
            'id' => $result->id,
            'date' => $result->created_at,
            'value' => $risk,
            'risk' => $this->getRiskValue($risk),
            'data' => $result->data,
        ];
    }

    public function calculateRisk(array $data, Patient $patient): string
    {
        return round((($data['protein_one'] * config('persuasive.algorithm.proteinOne')) + ($data['protein_two'] * config('persuasive.algorithm.proteinTwo')) + ($data['protein_three'] * config('persuasive.algorithm.proteinThree')) + ($data['protein_four'] * config('persuasive.algorithm.proteinFour')) + ($patient->age * config('persuasive.algorithm.age'))) * 
        config('persuasive.algorithm.'.$patient->gender->value), 1);
    }

    public function getRiskValue(float $value)
    {
        if ($value <= config('persuasive.risk.low')) {
            return Risk::Low->value;
        } elseif ($value > config('persuasive.risk.low') && $value <= config('persuasive.risk.medium')) {
            return Risk::Medium->value;
        }

        return Risk::High->value;
    }

    public function create(Patient $patient, array $data): Result
    {
        $result = $patient->results()->create([
            'patient_id' => $patient->id,
            'data' => ResultData::createFromRequestData($data),
        ]);

        return $result;
    }
}
