<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultsRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use App\Services\ResultsService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

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

    public function store(StoreResultsRequest $request, Patient $patient): RedirectResponse
    {
        $this->results->create($patient, $request->validated());

        return redirect()->route('dashboard', ['patientId' => $patient->id])->with('success', 'Results successfully submitted!');
    }
}
