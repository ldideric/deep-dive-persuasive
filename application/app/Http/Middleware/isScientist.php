<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class isScientist
{
    public function handle(Request $request, Closure $next): RedirectResponse|JsonResponse
    {
        if (! auth()->user()->isScientist()) {
            return abort(404);
        }

        return $next($request);
    }
}
