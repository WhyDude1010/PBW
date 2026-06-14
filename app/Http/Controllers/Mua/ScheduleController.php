<?php

namespace App\Http\Controllers\Mua;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class ScheduleController extends Controller
{
    public function index()
    {
        $muaProfile = auth()->user()->muaProfile;
        $muaId = $muaProfile ? $muaProfile->id : 0;

        $bookings = Booking::with('user')
            ->where('mua_profile_id', $muaId)
            ->whereIn('status', ['pending', 'confirmed', 'completed'])
            ->get();

        $bookingsJson = [];
        foreach ($bookings as $b) {
            $key = $b->booking_date->format('Y-m-d');
            $bookingsJson[$key][] = [
                'time' => \Carbon\Carbon::parse($b->booking_time)->format('H:i'),
                'client' => $b->user->name,
                'package' => $b->package ?? '-',
                'type' => 'Booking',
                'status' => $b->status,
            ];
        }

        return view('mua.schedule', compact('bookingsJson'));
    }
}
