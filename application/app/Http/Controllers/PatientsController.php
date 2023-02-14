<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Inertia\Inertia;
use App\Http\Resources\PatientsIndexResource;

class PatientsController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return Inertia::render('Patients/Index', [
            'patients' => PatientsIndexResource::collection($patients)
        ]);
    }
}


