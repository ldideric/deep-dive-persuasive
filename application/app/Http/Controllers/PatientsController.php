<?php

namespace App\Http\Controllers;

use App\Http\Resources\PatientsIndexResource;
use App\Models\Patient;
use Illuminate\Http\Client\Request;
use Inertia\Inertia;
use Inertia\Response;

class PatientsController extends Controller
{
    public function index(): Response
    {
        $patients = Patient::where('name', 'like', '%' . request()->search . '%')
            ->orWhere('id', 'like', '%' . request()->search . '%')
            ->get();

        return Inertia::render('Patients/Index', [
            'patients' => PatientsIndexResource::collection($patients),
            'search' => request()->search,
        ]);
    }
}
