<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function show(): Response
    {
        $results = Result::all()->sortByDesc('created_at')->load('patient');

        return Inertia::render('Dashboard', [
            'results' => $results,
        ]);
    }
}
