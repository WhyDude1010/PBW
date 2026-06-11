<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\MuaProfile;
use App\Models\Review;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBookingsToday = Booking::whereDate('booking_date', today())->count();
        $totalRevenue = Booking::where('status', '!=', 'cancelled')->sum('amount');
        $activeMuas = MuaProfile::where('is_available', true)->count();
        $avgRating = Review::avg('rating') ?? 0;
        $totalReviews = Review::count();

        $topMuas = MuaProfile::with('user')
            ->withCount('bookings')
            ->orderByDesc('bookings_count')
            ->take(3)
            ->get();

        $recentBookings = Booking::with(['user', 'muaProfile.user'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalBookingsToday', 'totalRevenue', 'activeMuas',
            'avgRating', 'totalReviews', 'topMuas', 'recentBookings'
        ));
    }
}
