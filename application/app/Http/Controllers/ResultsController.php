<?php

namespace App\Http\Controllers;

use App\Services\ResultsService;
use Illuminate\Http\Request;
use App\Models\Patient;
use Inertia\Inertia;

class ResultsController extends Controller
{
    public function __construct(
        private ResultsService $results
    ) {
    }

    public function show(Patient $patient)
    {
        $results = $this->results->createFromPatientData($patient);

        return Inertia::render('Results/Show', [
            'patient' => $patient,
            'results' => $results
        ]);
    }
}
