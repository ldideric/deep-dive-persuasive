<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Result;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function show(): Response
    {
        if (! auth()->user()->isScientist()) {
            $results = Result::all()->load('patient')->take(5);

            return Inertia::render('Dashboard', [
                'results' => $results,
            ]);
        }

        request()->validate([
            'patientId' => 'nullable|exists:patients,id',
        ]);

        $patient = Patient::find(request()->patientId);

        return Inertia::render('Dashboard', [
            'patient' => $patient ?? null,
        ]);
    }
}
