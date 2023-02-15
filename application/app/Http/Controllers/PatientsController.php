<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientsIndexResource;
use App\Models\Patient;
use Inertia\Inertia;

class PatientsController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        return Inertia::render('Patients/Index', [
            'patients' => PatientsIndexResource::collection($patients),
        ]);
    }
}
