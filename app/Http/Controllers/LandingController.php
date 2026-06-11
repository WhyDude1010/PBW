<?php

namespace App\Http\Controllers;

use App\Models\Package;

class LandingController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('sort_order')->get();

        return view('landing', compact('packages'));
    }
}
