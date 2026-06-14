<?php

namespace App\Http\Controllers\Mua;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $muaProfile = $user->muaProfile;
        $muaId = $muaProfile ? $muaProfile->id : 0;

        $todayBookings = Booking::where('mua_profile_id', $muaId)->whereDate('booking_date', today())->count();
        $monthRevenue = Booking::where('mua_profile_id', $muaId)
            ->whereMonth('booking_date', now()->month)
            ->whereYear('booking_date', now()->year)
            ->where('status', '!=', 'cancelled')
            ->sum('amount');

        $totalClients = Booking::where('mua_profile_id', $muaId)->distinct('user_id')->count('user_id');

        $reviews = Review::where('mua_profile_id', $muaId)->with('user')->latest()->get();
        $avgRating = $reviews->count() > 0 ? round($reviews->avg('rating'), 1) : 0;
        $totalReviews = $reviews->count();

        $upcomingBookings = Booking::with('user')
            ->where('mua_profile_id', $muaId)
            ->whereIn('status', ['confirmed', 'pending'])
            ->where('booking_date', '>=', today())
            ->orderBy('booking_date')
            ->orderBy('booking_time')
            ->take(5)
            ->get();

        $recentReviews = $reviews->take(3);

        $monthlyEarnings = [];
        for ($i = 4; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $earning = Booking::where('mua_profile_id', $muaId)
                ->whereMonth('booking_date', $date->month)
                ->whereYear('booking_date', $date->year)
                ->where('status', '!=', 'cancelled')
                ->sum('amount');
            $monthlyEarnings[] = [
                'label' => $date->format('M'),
                'amount' => $earning,
            ];
        }
        $maxEarning = max(array_column($monthlyEarnings, 'amount') ?: [1]);

        return view('mua.dashboard', compact(
            'user', 'muaProfile', 'todayBookings', 'monthRevenue',
            'totalClients', 'avgRating', 'totalReviews',
            'upcomingBookings', 'recentReviews',
            'monthlyEarnings', 'maxEarning'
        ));
    }
}
