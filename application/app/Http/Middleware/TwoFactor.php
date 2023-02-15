<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TwoFactor
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();

        if (auth()->check() && $user->two_factor_secret) {
            if ($user->two_factor_expires_at->isPast()) {
                $user->resetTwoFactorCode();
                auth()->logout();

                return redirect()->route('login')->with('message', 'Your two factor code has expired. Please login again.');
            }

            if (! request()->is('verify*')) {
                return redirect()->route('verify.index');
            }
        }

        return $next($request);
    }
}
