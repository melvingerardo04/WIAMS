<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IPAddressController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/useraccounts', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('useraccounts');

Route::get('/ipAddress', [IPAddressController::class, 'index'])->middleware(['auth', 'verified'])->name('ipAddress');
Route::get('/ipAddress/create', [IPAddressController::class, 'create'])->middleware(['auth', 'verified'])->name('ipAddress.create');
Route::post('/ipAddress', [IPAddressController::class, 'store'])->middleware(['auth', 'verified'])->name('ipAddress.store');
Route::get('/ipAddress/{id}/edit', [IPAddressController::class, 'edit'])->middleware(['auth', 'verified'])->name('ipAddress.edit');
Route::put('/ipAddress/{id}', [IPAddressController::class, 'update'])->middleware(['auth', 'verified'])->name('ipAddress.update');
Route::delete('/ipAddress/{id}', [IPAddressController::class, 'destroy'])->middleware(['auth', 'verified'])->name('ipAddress.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';

