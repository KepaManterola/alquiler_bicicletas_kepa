<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;

Route::get('/', [BikeController::class, 'index'])->name('bikes.index');

Route::get('/bikes/{bike}', [BikeController::class, 'show'])->name('bikes.show');

Route::middleware('auth')->group(function () {

    Route::get('/bikes/{bike}/book', [BookingController::class, 'create'])->name('bookings.create');

    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');

    Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');

    Route::get('/my-bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');

    Route::patch('/my-bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';