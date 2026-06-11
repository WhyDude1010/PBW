<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('sort_order')->get();

        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.form', ['package' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'features' => 'required|string',
            'price' => 'required|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|max:5120',
        ]);

        $data['features'] = array_map('trim', explode("\n", $data['features']));
        $data['is_featured'] = $request->boolean('is_featured');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('package-images', 'public');
        }

        Package::create($data);

        return redirect()->route('admin.packages.index')->with('sukses', 'Package created.');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.form', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'features' => 'required|string',
            'price' => 'required|integer|min:0',
            'is_featured' => 'nullable|boolean',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|max:5120',
        ]);

        $data['features'] = array_map('trim', explode("\n", $data['features']));
        $data['is_featured'] = $request->boolean('is_featured');
        $data['sort_order'] = $data['sort_order'] ?? $package->sort_order;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('package-images', 'public');
        }

        $package->update($data);

        return redirect()->route('admin.packages.index')->with('sukses', 'Package updated.');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('admin.packages.index')->with('sukses', 'Package deleted.');
    }
}
