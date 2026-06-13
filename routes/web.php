<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\MuaController as AdminMua;
use App\Http\Controllers\Admin\PackageController as AdminPackage;
use App\Http\Controllers\Admin\BookingController as AdminBooking;
use App\Http\Controllers\Admin\ClientController as AdminClient;
use App\Http\Controllers\Admin\ReviewController as AdminReview;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// 1. Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// 2. Auth (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'prosesLogin']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'prosesRegister']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Booking Flow (auth required)
Route::prefix('booking')->name('booking.')->middleware('auth')->group(function () {
    Route::get('/choose-mua', fn() => view('booking.choose_mua'))->name('choose-mua');
    Route::get('/select-date', fn() => view('booking.select_date'))->name('select-date');
    Route::get('/summary', fn() => view('booking.summary'))->name('summary');
    Route::get('/confirmed', fn() => view('booking.confirmed'))->name('confirmed');
    Route::get('/countdown', fn() => view('booking.countdown'))->name('countdown');
    Route::get('/tracking', fn() => view('booking.tracking'))->name('tracking');
    Route::get('/done', fn() => view('booking.done'))->name('done');
    Route::get('/payment', fn() => view('booking.payment'))->name('payment');
    Route::get('/review', fn() => view('booking.review'))->name('review');
    Route::get('/completion', fn() => view('booking.completion'))->name('completion');
});

// Admin Login
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'prosesAdminLogin'])->name('admin.login.submit');
});

// Admin Panel
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::get('/profile', fn() => view('admin.profile'))->name('profile');
    Route::get('/settings', fn() => view('admin.settings'))->name('settings');

    Route::get('/bookings', [AdminBooking::class, 'index'])->name('bookings.index');

    Route::get('/muas', [AdminMua::class, 'index'])->name('muas.index');
    Route::get('/muas/create', [AdminMua::class, 'create'])->name('muas.create');
    Route::post('/muas', [AdminMua::class, 'store'])->name('muas.store');
    Route::put('/muas/{muaProfile}', [AdminMua::class, 'update'])->name('muas.update');
    Route::patch('/muas/{muaProfile}/toggle', [AdminMua::class, 'toggleAvailability'])->name('muas.toggle');

    Route::get('/clients', [AdminClient::class, 'index'])->name('clients.index');
    Route::get('/reviews', [AdminReview::class, 'index'])->name('reviews.index');

    Route::get('/packages', [AdminPackage::class, 'index'])->name('packages.index');
    Route::get('/packages/create', [AdminPackage::class, 'create'])->name('packages.create');
    Route::post('/packages', [AdminPackage::class, 'store'])->name('packages.store');
    Route::get('/packages/{package}/edit', [AdminPackage::class, 'edit'])->name('packages.edit');
    Route::put('/packages/{package}', [AdminPackage::class, 'update'])->name('packages.update');
    Route::delete('/packages/{package}', [AdminPackage::class, 'destroy'])->name('packages.destroy');
});

// MUA Login
Route::middleware('guest')->group(function () {
    Route::get('/mua/login', [AuthController::class, 'showMuaLogin'])->name('mua.login');
    Route::post('/mua/login', [AuthController::class, 'prosesMuaLogin'])->name('mua.login.submit');
});

// MUA Panel
Route::prefix('mua')->name('mua.')->middleware(['auth', 'role:mua'])->group(function () {
    Route::get('/', fn() => view('mua.dashboard'))->name('dashboard');
    Route::get('/bookings', fn() => view('mua.bookings.index'))->name('bookings');
    Route::get('/profile', fn() => view('mua.profile'))->name('profile');
    Route::get('/reviews', fn() => view('mua.reviews'))->name('reviews');
    Route::get('/schedule', fn() => view('mua.schedule'))->name('schedule');
});