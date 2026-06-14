<?php

namespace App\Http\Controllers\Mua;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $muaProfile = $user->muaProfile;

        $avgRating = 0;
        $totalReviews = 0;
        if ($muaProfile) {
            $avgRating = round($muaProfile->reviews()->avg('rating') ?? 0, 1);
            $totalReviews = $muaProfile->reviews()->count();
        }

        return view('mua.profile', compact('user', 'muaProfile', 'avgRating', 'totalReviews'));
    }
}
