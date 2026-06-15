<?php

namespace App\Http\Controllers;

use App\Models\MuaProfile;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function chooseMua()
    {
        $muas = MuaProfile::with('user')
            ->where('is_available', true)
            ->withCount(['bookings', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->get();

        $styles = [];
        $locations = [];

        foreach ($muas as $mua) {
            if ($mua->location && !in_array($mua->location, $locations)) {
                $locations[] = $mua->location;
            }
            if ($mua->styles && is_array($mua->styles)) {
                foreach ($mua->styles as $style) {
                    if (!in_array($style, $styles)) {
                        $styles[] = $style;
                    }
                }
            }
        }

        sort($styles);
        sort($locations);

        return view('booking.choose_mua', compact('muas', 'styles', 'locations'));
    }

    public function selectDate(MuaProfile $mua)
    {
        $mua->load('user');
        return view('booking.select_date', compact('mua'));
    }

    public function summary(MuaProfile $mua)
    {
        $mua->load('user');
        return view('booking.summary', compact('mua'));
    }

    public function store(Request $request, MuaProfile $mua)
    {
        $request->validate([
            'booking_date' => 'required|date',
            'booking_time' => 'required|string',
            'package' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $bookingDate = Carbon::parse($request->booking_date)->format('Y-m-d');

        $booking = Booking::create([
            'user_id' => auth()->id(),
            'mua_profile_id' => $mua->id,
            'booking_date' => $bookingDate,
            'booking_time' => $request->booking_time,
            'package' => $request->package,
            'amount' => $request->amount,
            'status' => 'pending', // Waiting for payment
        ]);

        return response()->json([
            'success' => true,
            'redirect_url' => route('booking.transfer', $booking->id)
        ]);
    }

    public function transfer(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) abort(403);
        $booking->load(['muaProfile.user']);
        return view('booking.transfer', compact('booking'));
    }

    public function confirmTransfer(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) abort(403);
        
        $booking->update(['status' => 'confirmed']);
        
        return redirect()->route('booking.confirmed', $booking->id);
    }

    public function confirmed(Booking $booking)
    {
        // Ensure the booking belongs to the current user
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }
        
        // Update status to confirmed since they "paid"
        if ($booking->status === 'pending') {
            $booking->update(['status' => 'confirmed']);
        }

        $booking->load(['muaProfile.user']);
        return view('booking.confirmed', compact('booking'));
    }

    public function countdown(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }
        $booking->load(['muaProfile.user']);
        return view('booking.countdown', compact('booking'));
    }

    public function tracking(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) abort(403);
        $booking->load(['muaProfile.user']);
        return view('booking.tracking', compact('booking'));
    }

    public function done(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) abort(403);
        $booking->load(['muaProfile.user']);
        return view('booking.done', compact('booking'));
    }

    public function payment(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) abort(403);
        $booking->load(['muaProfile.user']);
        return view('booking.payment', compact('booking'));
    }

    public function review(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) abort(403);
        $booking->load(['muaProfile.user']);
        return view('booking.review', compact('booking'));
    }

    public function completion(Booking $booking)
    {
        if ($booking->user_id !== auth()->id()) abort(403);
        
        if ($booking->status !== 'completed') {
            $booking->update(['status' => 'completed']);
        }
        
        $booking->load(['muaProfile.user']);
        return view('booking.completion', compact('booking'));
    }
}
