<?php

namespace App\Http\Controllers\Mua;

use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $muaProfile = auth()->user()->muaProfile;

        $reviews = collect();
        $avgRating = 0;
        $totalReviews = 0;
        $breakdown = [5 => 0, 4 => 0, 3 => 0, 2 => 0, 1 => 0];

        if ($muaProfile) {
            $reviews = Review::with(['user', 'booking'])
                ->where('mua_profile_id', $muaProfile->id)
                ->latest()
                ->get();

            $totalReviews = $reviews->count();
            $avgRating = $totalReviews > 0 ? round($reviews->avg('rating'), 1) : 0;

            foreach ($reviews as $r) {
                if (isset($breakdown[$r->rating])) {
                    $breakdown[$r->rating]++;
                }
            }
        }

        $fiveStarRate = $totalReviews > 0 ? round(($breakdown[5] / $totalReviews) * 100) : 0;

        return view('mua.reviews', compact('reviews', 'avgRating', 'totalReviews', 'breakdown', 'fiveStarRate'));
    }
}
