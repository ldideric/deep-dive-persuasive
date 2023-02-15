<?php

use App\Http\Controllers\Auth\TwoFactorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultsController;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

Route::middleware(['auth', 'two-factor'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::get('/patients', [PatientsController::class, 'index'])
        ->name('patients.index');

    Route::get('results/{patient}', [ResultsController::class, 'show'])
        ->name('results.show');

    Route::get('results/{patient:id}/create', [ResultsController::class, 'create'])
        ->middleware('isScientist')
        ->name('results.create');

    Route::post('results/{patient}/store', [ResultsController::class, 'store'])
        ->middleware(['isScientist', HandlePrecognitiveRequests::class])
        ->name('results.store');
});

Route::get('verify/resend', [TwoFactorController::class, 'resend'])->name('verify.resend');
Route::resource('verify', TwoFactorController::class)->only(['index', 'store']);
require __DIR__.'/auth.php';
