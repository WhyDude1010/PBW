<?php

namespace App\Http\Controllers\Mua;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $muaProfile = auth()->user()->muaProfile;

        $bookings = collect();
        $stats = ['pending' => 0, 'confirmed' => 0, 'completed' => 0, 'cancelled' => 0];

        if ($muaProfile) {
            $bookings = Booking::with('user')
                ->where('mua_profile_id', $muaProfile->id)
                ->latest()
                ->get();

            foreach ($bookings as $b) {
                if (isset($stats[$b->status])) {
                    $stats[$b->status]++;
                }
            }
        }

        $packages = $bookings->pluck('package')->filter()->unique()->sort()->values();

        return view('mua.bookings.index', compact('bookings', 'stats', 'packages'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate(['status' => 'required|in:pending,confirmed,completed,cancelled']);

        $muaProfile = auth()->user()->muaProfile;
        if (!$muaProfile || $booking->mua_profile_id !== $muaProfile->id) {
            abort(403);
        }

        $booking->update(['status' => $request->status]);
        return back()->with('sukses', 'Booking status updated.');
    }
}
