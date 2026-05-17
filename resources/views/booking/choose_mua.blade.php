@extends('layouts.app')
@section('title', 'Choose MUA — Beautique')

@section('content')
<div class="min-h-screen bg-cream pt-[80px] lg:pt-[100px] pb-24">
    <div class="max-w-7xl mx-auto px-4 md:px-8 lg:px-12">
        
        <!-- Header & Stepper -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-12 gap-8">
            <div>
                <h1 class="font-serif text-[36px] lg:text-[44px] font-bold text-dark leading-tight mb-2">Choose Your Artist</h1>
                <p class="text-[15px] text-muted">Step 1 of 10 · Select the perfect makeup artist for your look.</p>
            </div>

            <!-- Stepper -->
            <div class="flex items-center gap-2 lg:gap-4 w-full lg:w-auto">
                <div class="flex flex-col items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-brand flex items-center justify-center text-white shadow-[0_4px_12px_rgba(199,155,132,0.3)] border-2 border-white">
                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg>
                    </div>
                    <span class="text-[11px] font-bold text-brand uppercase tracking-wider">Booking</span>
                </div>
                <div class="w-12 lg:w-20 h-0.5 bg-border rounded-full mb-5"></div>
                <div class="flex flex-col items-center gap-2 opacity-50">
                    <div class="w-8 h-8 rounded-full bg-border flex items-center justify-center border-2 border-white">
                        <span class="w-2 h-2 rounded-full bg-muted"></span>
                    </div>
                    <span class="text-[11px] font-bold text-muted uppercase tracking-wider">Time</span>
                </div>
                <div class="w-12 lg:w-20 h-0.5 bg-border rounded-full mb-5"></div>
                <div class="flex flex-col items-center gap-2 opacity-50">
                    <div class="w-8 h-8 rounded-full bg-border flex items-center justify-center border-2 border-white">
                        <span class="w-2 h-2 rounded-full bg-muted"></span>
                    </div>
                    <span class="text-[11px] font-bold text-muted uppercase tracking-wider">Service</span>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="flex items-center gap-3 mb-10 overflow-x-auto pb-4 hide-scrollbar">
            <button class="shrink-0 flex items-center gap-2 px-5 py-2.5 rounded-full border-2 border-brand bg-brand/10 text-brand text-[13px] font-bold transition-colors">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                All Artists
            </button>
            <button class="shrink-0 px-5 py-2.5 rounded-full border border-border bg-white text-muted text-[13px] font-bold hover:border-brand hover:text-brand transition-colors">Bridal</button>
            <button class="shrink-0 px-5 py-2.5 rounded-full border border-border bg-white text-muted text-[13px] font-bold hover:border-brand hover:text-brand transition-colors">Party</button>
            <button class="shrink-0 px-5 py-2.5 rounded-full border border-border bg-white text-muted text-[13px] font-bold hover:border-brand hover:text-brand transition-colors">Editorial</button>
            <button class="shrink-0 flex items-center gap-2 px-5 py-2.5 rounded-full border border-border bg-white text-muted text-[13px] font-bold hover:border-brand hover:text-brand transition-colors">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Bali
            </button>
            <button class="shrink-0 flex items-center gap-2 px-5 py-2.5 rounded-full border border-border bg-white text-muted text-[13px] font-bold hover:border-brand hover:text-brand transition-colors">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Jakarta
            </button>
        </div>

        <!-- MUA Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- MUA 1 -->
            <div class="bg-white rounded-2xl border border-border overflow-hidden group hover:border-brand hover:shadow-[0_12px_30px_rgba(199,155,132,0.15)] transition-all duration-300 flex flex-col">
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset('image/model-mua.jpeg') }}" alt="Sarah Wijaya" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-sm">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-amber-500)" stroke="var(--color-amber-500)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        <span class="text-[12px] font-bold text-dark">4.9</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-bold text-[18px] text-dark mb-1">Sarah Wijaya</h3>
                    <div class="flex items-center gap-1.5 text-[13px] text-muted mb-4">
                        <svg width="14" height="14" fill="none" stroke="var(--color-brand)" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Bali &middot; 3 bookings this week
                    </div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-2.5 py-1 rounded-full bg-cream text-muted text-[11px] font-bold uppercase tracking-wider">Bridal</span>
                        <span class="px-2.5 py-1 rounded-full bg-cream text-muted text-[11px] font-bold uppercase tracking-wider">Natural</span>
                        <span class="px-2.5 py-1 rounded-full bg-cream text-muted text-[11px] font-bold uppercase tracking-wider">Korean Dewy</span>
                    </div>
                    <div class="mt-auto flex items-center justify-between">
                        <div>
                            <span class="text-[12px] text-muted block mb-0.5">Starting from</span>
                            <span class="text-[15px] font-bold text-brand">Rp 1.500.000</span>
                        </div>
                        <a href="{{ route('booking.select-date') }}" class="w-10 h-10 rounded-full bg-brand text-white flex items-center justify-center group-hover:bg-brand-dark transition-colors">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- MUA 2 -->
            <div class="bg-white rounded-2xl border border-border overflow-hidden group hover:border-brand hover:shadow-[0_12px_30px_rgba(199,155,132,0.15)] transition-all duration-300 flex flex-col">
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset('image/about-mua.jpeg') }}" alt="Mia Rahardjo" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" style="object-position:top">
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-sm">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-amber-500)" stroke="var(--color-amber-500)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        <span class="text-[12px] font-bold text-dark">4.8</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-bold text-[18px] text-dark mb-1">Mia Rahardjo</h3>
                    <div class="flex items-center gap-1.5 text-[13px] text-muted mb-4">
                        <svg width="14" height="14" fill="none" stroke="var(--color-brand)" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Jakarta &middot; Available today
                    </div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-2.5 py-1 rounded-full bg-cream text-muted text-[11px] font-bold uppercase tracking-wider">Glam</span>
                        <span class="px-2.5 py-1 rounded-full bg-cream text-muted text-[11px] font-bold uppercase tracking-wider">Soft Glam</span>
                        <span class="px-2.5 py-1 rounded-full bg-cream text-muted text-[11px] font-bold uppercase tracking-wider">Editorial</span>
                    </div>
                    <div class="mt-auto flex items-center justify-between">
                        <div>
                            <span class="text-[12px] text-muted block mb-0.5">Starting from</span>
                            <span class="text-[15px] font-bold text-brand">Rp 2.000.000</span>
                        </div>
                        <a href="{{ route('booking.select-date') }}" class="w-10 h-10 rounded-full bg-brand text-white flex items-center justify-center group-hover:bg-brand-dark transition-colors">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- MUA 3 -->
            <div class="bg-white rounded-2xl border border-border overflow-hidden group hover:border-brand hover:shadow-[0_12px_30px_rgba(199,155,132,0.15)] transition-all duration-300 flex flex-col">
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset('image/makeup1.jpeg') }}" alt="Dera Sanjaya" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    <div class="absolute top-4 left-4 bg-brand text-white px-3 py-1.5 rounded-full shadow-sm">
                        <span class="text-[11px] font-bold tracking-wider uppercase">Top Rated</span>
                    </div>
                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-full flex items-center gap-1.5 shadow-sm">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-amber-500)" stroke="var(--color-amber-500)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        <span class="text-[12px] font-bold text-dark">5.0</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-bold text-[18px] text-dark mb-1">Dera Sanjaya</h3>
                    <div class="flex items-center gap-1.5 text-[13px] text-muted mb-4">
                        <svg width="14" height="14" fill="none" stroke="var(--color-brand)" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Surabaya
                    </div>
                    <div class="flex flex-wrap gap-2 mb-6">
                        <span class="px-2.5 py-1 rounded-full bg-cream text-muted text-[11px] font-bold uppercase tracking-wider">Bold</span>
                        <span class="px-2.5 py-1 rounded-full bg-cream text-muted text-[11px] font-bold uppercase tracking-wider">Latina</span>
                        <span class="px-2.5 py-1 rounded-full bg-cream text-muted text-[11px] font-bold uppercase tracking-wider">Party</span>
                    </div>
                    <div class="mt-auto flex items-center justify-between">
                        <div>
                            <span class="text-[12px] text-muted block mb-0.5">Starting from</span>
                            <span class="text-[15px] font-bold text-brand">Rp 900.000</span>
                        </div>
                        <a href="{{ route('booking.select-date') }}" class="w-10 h-10 rounded-full bg-brand text-white flex items-center justify-center group-hover:bg-brand-dark transition-colors">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('styles')
<style>
.hide-scrollbar::-webkit-scrollbar { display: none; }
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endpush