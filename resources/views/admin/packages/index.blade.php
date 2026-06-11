@extends('layouts.admin')
@section('title', 'Packages')
@section('page_title', 'Packages')
@section('page_meta', 'Manage landing page pricing packages')

@section('content')

@if(session('sukses'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-[13px] font-medium mb-6">{{ session('sukses') }}</div>
@endif

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
    <h3 class="font-bold text-[18px] text-dark">
        All Packages <span class="text-[14px] font-medium text-muted">({{ $packages->count() }})</span>
    </h3>
    <a href="{{ route('admin.packages.create') }}" class="inline-flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-xl font-bold text-[13px] transition-all hover:shadow-[0_4px_12px_rgba(199,155,132,0.3)] hover:-translate-y-0.5">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
        Add Package
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($packages as $pkg)
    <div class="bg-white rounded-2xl border {{ $pkg->is_featured ? 'border-brand border-2' : 'border-border' }} shadow-sm overflow-hidden">
        @if($pkg->is_featured)
            <div class="bg-brand text-white text-[11px] font-bold tracking-[2px] uppercase text-center py-2">★ Featured ★</div>
        @endif
        @if($pkg->image)
            <img src="{{ asset('storage/' . $pkg->image) }}" alt="{{ $pkg->name }}" class="w-full h-40 object-cover">
        @else
            <div class="w-full h-40 bg-gradient-to-br from-brand/10 to-cream flex items-center justify-center">
                <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" class="text-brand/30"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
            </div>
        @endif
        <div class="p-6">
            <h4 class="font-bold text-[18px] text-dark mb-2 font-serif">{{ $pkg->name }}</h4>
            @if($pkg->description)
                <p class="text-[13px] text-muted mb-4">{{ $pkg->description }}</p>
            @endif
            <ul class="space-y-2 mb-4">
                @foreach($pkg->features ?? [] as $feature)
                    <li class="flex gap-2 text-[13px] text-muted"><span class="text-brand">✦</span> {{ $feature }}</li>
                @endforeach
            </ul>
            <div class="text-[12px] text-muted mb-1">Starting Price</div>
            <div class="text-lg font-bold text-brand mb-4">Rp {{ number_format($pkg->price, 0, ',', '.') }}</div>
            <div class="flex gap-2">
                <a href="{{ route('admin.packages.edit', $pkg) }}" class="flex-1 text-center py-2.5 rounded-xl border border-border bg-white text-[13px] font-bold text-dark hover:border-brand hover:text-brand transition-colors">Edit</a>
                <form action="{{ route('admin.packages.destroy', $pkg) }}" method="POST" class="flex-1" onsubmit="return confirm('Delete this package?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full py-2.5 rounded-xl bg-red-500/10 text-[13px] font-bold text-red-500 hover:bg-red-500 hover:text-white transition-colors">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full text-center py-16">
        <p class="text-[14px] text-muted mb-4">No packages yet</p>
        <a href="{{ route('admin.packages.create') }}" class="inline-flex items-center gap-2 bg-brand text-white px-5 py-2.5 rounded-xl font-bold text-[13px]">Add Your First Package</a>
    </div>
    @endforelse
</div>

@endsection
