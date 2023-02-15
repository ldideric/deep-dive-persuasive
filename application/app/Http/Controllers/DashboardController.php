<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show()
    {
        $recentresults = Patient::join('results', 'patients.id', '=', 'results.patient_id')
            ->where('patients.user_id', auth()->user()->id)
            ->select('patients.*', 'results.*')
            ->orderBy('results.created_at', 'desc')
            ->take(5)
            ->get();
        return Inertia::render('Dashboard', [
            'user' => auth()->user(),
            'recentresults' => $recentresults,
        ]);
    }
}
