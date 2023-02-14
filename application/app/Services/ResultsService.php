<?php

namespace App\Services;

use App\Enums\Gender;
use App\Enums\Risk;
use App\Models\Patient;
use Carbon\Carbon;

class ResultsService{

    public function createFromPatientData(Patient $patient): array
    {
        $patientWithResults = $patient->load('results');

        $age = Carbon::parse($patient->date_of_birth)->age;
        $gender = $patient->gender;

        $ResultsData = $patientWithResults->results->map(function ($result) use ($age, $gender) {
            $risk = $this->calculateRisk($result->data['protein_one'], $result->data['protein_two'], $result->data['protein_three'], 
            $result->data['protein_four'], $age, $gender);

            return $risk;
        })->toArray();

        return $ResultsData;
    }

    public function calculateRisk(float $proteinOne, float $proteinTwo, float $proteinThree, float $proteinFour, int $age, Gender $gender): string
    {
        $value = (($proteinOne * config('persuasive.algorithm.proteinOne'))+($proteinTwo * config('persuasive.algorithm.proteinTwo'))+($proteinThree * config('persuasive.algorithm.proteinThree'))+($proteinFour * config('persuasive.algorithm.proteinFour'))+($age * config('persuasive.algorithm.age'))) * config('persuasive.algorithm.' . $gender->value);

        if($value < config('persuasive.risk.low')) {
            return Risk::Low->value;
        } elseif( $value > config('persuasive.risk.low') && $value < config('persuasive.risk.medium')) {
            return Risk::Medium->value;
        }

        return Risk::High->value;
    }
}