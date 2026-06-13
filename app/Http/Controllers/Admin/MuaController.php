<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MuaProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MuaController extends Controller
{
    public function index()
    {
        $muas = MuaProfile::with('user')
            ->withCount(['bookings', 'reviews'])
            ->withAvg('reviews', 'rating')
            ->get();

        return view('admin.muas.index', compact('muas'));
    }

    public function create()
    {
        return view('admin.muas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'location' => 'required|string|max:100',
            'bio' => 'nullable|string',
            'styles' => 'required|array|min:1',
            'price_min' => 'nullable|integer|min:0',
            'price_max' => 'nullable|integer|min:0',
            'photo' => 'nullable|image|max:5120',
            'password' => 'nullable|string|min:8',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('mua-photos', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ?? 'MuaDefault123',
            'role' => 'mua',
            'photo' => $photoPath,
        ]);

        $user->muaProfile()->create([
            'bio' => $request->bio,
            'location' => $request->location,
            'styles' => $request->styles,
            'price_min' => $request->price_min ?? 0,
            'price_max' => $request->price_max ?? 0,
            'is_available' => $request->boolean('is_available'),
        ]);

        return redirect()->route('admin.muas.index')->with('sukses', $request->name . ' has been added.');
    }

    public function update(Request $request, MuaProfile $muaProfile)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'location' => 'required|string|max:100',
            'styles' => 'nullable|string',
        ]);

        $muaProfile->user->update(['name' => $request->name]);

        $styles = $request->styles
            ? array_map('trim', explode(',', $request->styles))
            : $muaProfile->styles;

        $muaProfile->update([
            'location' => $request->location,
            'styles' => $styles,
        ]);

        return back()->with('sukses', $request->name . ' updated.');
    }

    public function toggleAvailability(MuaProfile $muaProfile)
    {
        $muaProfile->update(['is_available' => !$muaProfile->is_available]);

        $status = $muaProfile->is_available ? 'activated' : 'deactivated';

        return back()->with('sukses', $muaProfile->user->name . ' ' . $status . '.');
    }

    public function updateCredentials(Request $request, MuaProfile $muaProfile)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $muaProfile->user->id,
            'password' => 'nullable|string|min:8',
        ]);

        $data = ['email' => $request->email];

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $muaProfile->user->update($data);

        return back()->with('sukses', $muaProfile->user->name . ' credentials updated.');
    }
}
