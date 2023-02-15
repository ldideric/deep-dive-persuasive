<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class isScientist
{
    public function handle(Request $request, Closure $next): RedirectResponse|Response
    {
        if (!auth()->user()->isScientist()) {
            return abort(404);
        }

        return $next($request);
    }
}
