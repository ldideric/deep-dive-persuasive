<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultsRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use App\Services\ResultsService;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function __construct(
        private ResultsService $results
    ) {
    }

    public function show(Patient $patient): Response
    {
        $results = $this->results->createFromPatientData($patient);

        return Inertia::render('Results/Show', [
            'patient' => (new PatientResource($patient)),
            'results' => $results,
        ]);
    }

    public function create(Patient $patient): Response
    {
        return Inertia::render('Results/Create', [
            'patient' => (new PatientResource($patient)),
        ]);
    }

    public function store(StoreResultsRequest $request, Patient $patient): Response
    {
        $result = $this->results->create($patient, $request->validated());

        dd($result);
    }
}
