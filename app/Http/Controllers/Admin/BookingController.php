<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'muaProfile.user'])->latest()->get();

        $packages = $bookings->pluck('package')->filter()->unique()->sort()->values();
        $muaNames = $bookings->map(fn($b) => $b->muaProfile->user->name ?? null)->filter()->unique()->sort()->values();

        return view('admin.bookings.index', compact('bookings', 'packages', 'muaNames'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate(['status' => 'required|in:pending,confirmed,completed,cancelled']);
        $booking->update(['status' => $request->status]);
        return back()->with('sukses', 'Booking status updated.');
    }
}
