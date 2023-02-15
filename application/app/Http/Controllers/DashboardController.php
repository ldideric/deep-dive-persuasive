<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function show(): Response
    {
        $results = Result::all()->load('patient')->take(5);

        return Inertia::render('Dashboard', [
            'results' => $results,
        ]);
    }
}