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

    public function update(\Illuminate\Http\Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:100',
            'bio' => 'nullable|string',
            'styles' => 'nullable|array',
            'is_available' => 'nullable|boolean',
            'packages' => 'nullable|string',
            'add_ons' => 'nullable|string',
            'available_hours' => 'nullable|array',
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        $profileData = [
            'location' => $request->location ?? '',
            'bio' => $request->bio,
            'styles' => $request->styles ?? [],
            'is_available' => $request->has('is_available'),
            'available_hours' => $request->available_hours ?? [],
        ];

        if ($request->packages) {
            $profileData['packages'] = json_decode($request->packages, true);
        } else {
            $profileData['packages'] = [];
        }

        if ($request->add_ons) {
            $profileData['add_ons'] = json_decode($request->add_ons, true);
        } else {
            $profileData['add_ons'] = [];
        }

        if ($user->muaProfile) {
            $user->muaProfile->update($profileData);
        } else {
            $user->muaProfile()->create($profileData);
        }

        return redirect()->back()->with('sukses', 'Profile updated successfully.');
    }
}
