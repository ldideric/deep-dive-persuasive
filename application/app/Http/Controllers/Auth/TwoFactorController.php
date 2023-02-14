<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreTwoFactorRequest;
use App\Notifications\TwoFactorCode;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;
use Inertia\Response;

class TwoFactorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'two-factor']);
    }

    public function index(): Response
    {
        return Inertia::render('Auth/TwoFactor');
    }

    public function store(StoreTwoFactorRequest $request)
    {
        if ($request->two_factor_code == auth()->user()->two_factor_secret) {
            auth()->user()->resetTwoFactorCode();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return redirect()->route('verify.index')->with('message', 'Invalid code. Please try again.');
    }

    public function resend()
    {
        $user = auth()->user();

        $user->generateTwoFactorCode();
        $user->notify(new TwoFactorCode);

        return redirect()->route('verify.index')->with('error', 'A new two factor code has been sent to your email address.');
    }
}
