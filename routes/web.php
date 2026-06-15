<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\MuaController as AdminMua;
use App\Http\Controllers\Admin\PackageController as AdminPackage;
use App\Http\Controllers\Admin\BookingController as AdminBooking;
use App\Http\Controllers\Admin\ClientController as AdminClient;
use App\Http\Controllers\Admin\ReviewController as AdminReview;
use App\Http\Controllers\Admin\ProfileController as AdminProfile;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

// 1. Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing')->middleware('client.only');

// 2. Auth (guest only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'prosesLogin']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'prosesRegister']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Browse MUAs (guest accessible, but not for admin/mua)
Route::get('/booking/choose-mua', [\App\Http\Controllers\BookingController::class, 'chooseMua'])->name('booking.choose-mua')->middleware('client.only');

// Booking Flow (auth required, clients only)
Route::prefix('booking')->name('booking.')->middleware(['auth', 'client.only'])->group(function () {
    Route::get('/select-date/{mua}', [\App\Http\Controllers\BookingController::class, 'selectDate'])->name('select-date');
    Route::get('/summary/{mua}', [\App\Http\Controllers\BookingController::class, 'summary'])->name('summary');
    Route::post('/bookings/store/{mua}', [\App\Http\Controllers\BookingController::class, 'store'])->name('store');
    Route::get('/transfer/{booking}', [\App\Http\Controllers\BookingController::class, 'transfer'])->name('transfer');
    Route::post('/transfer/{booking}/confirm', [\App\Http\Controllers\BookingController::class, 'confirmTransfer'])->name('transfer.confirm');
    Route::get('/confirmed/{booking}', [\App\Http\Controllers\BookingController::class, 'confirmed'])->name('confirmed');
    Route::get('/countdown/{booking}', [\App\Http\Controllers\BookingController::class, 'countdown'])->name('countdown');
    Route::get('/tracking/{booking}', [\App\Http\Controllers\BookingController::class, 'tracking'])->name('tracking');
    Route::get('/done/{booking}', [\App\Http\Controllers\BookingController::class, 'done'])->name('done');
    Route::get('/payment/{booking}', [\App\Http\Controllers\BookingController::class, 'payment'])->name('payment');
    Route::get('/review/{booking}', [\App\Http\Controllers\BookingController::class, 'review'])->name('review');
    Route::get('/completion/{booking}', [\App\Http\Controllers\BookingController::class, 'completion'])->name('completion');
});

// Admin Login
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'prosesAdminLogin'])->name('admin.login.submit');
});

// Admin Panel
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::get('/profile', [AdminProfile::class, 'index'])->name('profile');
    Route::put('/profile', [AdminProfile::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [AdminProfile::class, 'updatePassword'])->name('profile.password');
    Route::get('/settings', fn() => view('admin.settings'))->name('settings');

    Route::get('/bookings', [AdminBooking::class, 'index'])->name('bookings.index');
    Route::patch('/bookings/{booking}/status', [AdminBooking::class, 'updateStatus'])->name('bookings.status');

    Route::get('/muas', [AdminMua::class, 'index'])->name('muas.index');
    Route::get('/muas/create', [AdminMua::class, 'create'])->name('muas.create');
    Route::post('/muas', [AdminMua::class, 'store'])->name('muas.store');
    Route::put('/muas/{muaProfile}', [AdminMua::class, 'update'])->name('muas.update');
    Route::put('/muas/{muaProfile}/credentials', [AdminMua::class, 'updateCredentials'])->name('muas.credentials');
    Route::patch('/muas/{muaProfile}/toggle', [AdminMua::class, 'toggleAvailability'])->name('muas.toggle');

    Route::get('/clients', [AdminClient::class, 'index'])->name('clients.index');
    Route::get('/reviews', [AdminReview::class, 'index'])->name('reviews.index');
    Route::delete('/reviews/{review}', [AdminReview::class, 'destroy'])->name('reviews.destroy');

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
    Route::get('/', [\App\Http\Controllers\Mua\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/bookings', [\App\Http\Controllers\Mua\BookingController::class, 'index'])->name('bookings');
    Route::patch('/bookings/{booking}/status', [\App\Http\Controllers\Mua\BookingController::class, 'updateStatus'])->name('bookings.status');
    Route::get('/profile', [\App\Http\Controllers\Mua\ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [\App\Http\Controllers\Mua\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/reviews', [\App\Http\Controllers\Mua\ReviewController::class, 'index'])->name('reviews');
    Route::get('/schedule', [\App\Http\Controllers\Mua\ScheduleController::class, 'index'])->name('schedule');
});