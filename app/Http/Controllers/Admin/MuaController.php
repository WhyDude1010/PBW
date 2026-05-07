<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MuaController extends Controller
{
    public function index()
    {
        return view('admin.muas.index');
    }

    public function create()
    {
        return view('admin.muas.create');
    }

    public function store()
    {
        return redirect()->route('admin.muas.index');
    }
}
