<?php

namespace App\Http\Controllers;

use App\Models\MuaProfile;
use Illuminate\Http\Request;

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
}
