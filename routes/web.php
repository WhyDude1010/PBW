<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Full user journey: Landing → Auth → Booking Flow → Completion
*/

// 1. Landing Page
Route::get('/', fn() => view('landing'))->name('landing');

// 2 & 3. Auth
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::get('/register', fn() => view('auth.register'))->name('register');

// Booking Flow (steps 4–17)
Route::prefix('booking')->name('booking.')->group(function () {

    // Step 4: Choose MUA
    Route::get('/choose-mua', fn() => view('booking.choose_mua'))->name('choose-mua');

    // Step 5: Select Date & Time
    Route::get('/select-date', fn() => view('booking.select_date'))->name('select-date');

    // Step 10: Booking Summary
    Route::get('/summary', fn() => view('booking.summary'))->name('summary');

    // Step 11: Confirmed Booking
    Route::get('/confirmed', fn() => view('booking.confirmed'))->name('confirmed');

    // Step 12: Booking Countdown
    Route::get('/countdown', fn() => view('booking.countdown'))->name('countdown');

    // Step 13: Service Tracking
    Route::get('/tracking', fn() => view('booking.tracking'))->name('tracking');

    // Step 14: Service Done
    Route::get('/done', fn() => view('booking.done'))->name('done');

    // Step 15: Complete Payment
    Route::get('/payment', fn() => view('booking.payment'))->name('payment');

    // Step 16: Rating & Review
    Route::get('/review', fn() => view('booking.review'))->name('review');

    // Step 17: Completion
    Route::get('/completion', fn() => view('booking.completion'))->name('completion');
});

// Admin Panel Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => view('admin.dashboard'))->name('dashboard');
    
    // Bookings
    Route::get('/bookings', fn() => view('admin.bookings.index'))->name('bookings.index');
    
    // MUAs
    Route::get('/muas', fn() => view('admin.muas.index'))->name('muas.index');
    Route::get('/muas/create', fn() => view('admin.muas.create'))->name('muas.create');
    
    // Clients
    Route::get('/clients', fn() => view('admin.clients.index'))->name('clients.index');
    
    // Reviews
    Route::get('/reviews', fn() => view('admin.reviews.index'))->name('reviews.index');
});