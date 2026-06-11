<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class ClientController extends Controller
{
    public function index()
    {
        $clients = User::where('role', 'user')->withCount('bookings')->latest()->get();

        return view('admin.clients.index', compact('clients'));
    }
}
