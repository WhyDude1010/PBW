@extends('layouts.admin')
@section('title','Dashboard')
@section('page_title','Dashboard')
@section('page_meta', 'Welcome back, ' . auth()->user()->name . ' · ' . date("l, d M Y"))

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4 hover:border-brand transition-colors">
        <div class="w-12 h-12 rounded-xl bg-brand/10 text-brand flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">{{ $totalBookingsToday }}</div>
            <div class="text-[13px] font-bold text-muted mb-2">Bookings Today</div>
        </div>
    </div>
    
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4 hover:border-brand transition-colors">
        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
            <div class="text-[13px] font-bold text-muted mb-2">Total Revenue</div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4 hover:border-brand transition-colors">
        <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">{{ $activeMuas }}</div>
            <div class="text-[13px] font-bold text-muted mb-2">Active MUAs</div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4 hover:border-brand transition-colors">
        <div class="w-12 h-12 rounded-xl bg-violet-500/10 text-violet-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">{{ number_format($avgRating, 1) }}</div>
            <div class="text-[13px] font-bold text-muted mb-2">Avg Rating</div>
            <div class="text-[11px] font-medium text-muted">Based on {{ $totalReviews }} reviews</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mb-8">
    <div class="bg-white rounded-2xl border border-border shadow-sm">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between">
            <h3 class="font-bold text-[16px] text-dark">Top MUAs</h3>
            <a href="{{ route('admin.muas.index') }}" class="text-[13px] font-bold text-brand hover:text-brand-dark transition-colors">View all</a>
        </div>
        <div class="p-2">
            @forelse($topMuas as $mua)
            <div class="flex items-center justify-between p-4 hover:bg-cream/50 transition-colors rounded-xl">
                <div class="flex items-center gap-4">
                    @if($mua->user->photo)
                        <img src="{{ asset('storage/' . $mua->user->photo) }}" alt="{{ $mua->user->name }}" class="w-12 h-12 rounded-full object-cover border border-border">
                    @else
                        <div class="w-12 h-12 rounded-full bg-brand/10 flex items-center justify-center text-brand font-bold text-[16px]">{{ substr($mua->user->name, 0, 1) }}</div>
                    @endif
                    <div>
                        <div class="font-bold text-[14.5px] text-dark">{{ $mua->user->name }}</div>
                        <div class="text-[12px] text-muted">{{ $mua->location }}</div>
                    </div>
                </div>
                <span class="px-3 py-1 rounded-full bg-brand/10 text-brand text-[12px] font-bold">{{ $mua->bookings_count }} bookings</span>
            </div>
            @empty
            <div class="p-6 text-center text-[14px] text-muted">No MUAs yet</div>
            @endforelse
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between bg-white">
            <h3 class="font-bold text-[16px] text-dark">Recent Bookings</h3>
            <a href="{{ route('admin.bookings.index') }}" class="text-[13px] font-bold text-brand hover:text-brand-dark transition-colors flex items-center gap-1">
                View all
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
        <div class="divide-y divide-border">
            @forelse($recentBookings as $b)
            <div class="p-4 flex items-center justify-between hover:bg-cream/30 transition-colors">
                <div>
                    <div class="font-bold text-[14px] text-dark">{{ $b->user->name }}</div>
                    <div class="text-[12px] text-muted">{{ $b->muaProfile->user->name }} · {{ $b->booking_date->format('d M Y') }}</div>
                </div>
                <div class="text-right">
                    <div class="text-[13px] font-bold text-brand mb-1">Rp {{ number_format($b->amount, 0, ',', '.') }}</div>
                    @if($b->status === 'confirmed')
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-500 uppercase tracking-wider">Confirmed</span>
                    @elseif($b->status === 'completed')
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-blue-500/10 text-blue-500 uppercase tracking-wider">Completed</span>
                    @elseif($b->status === 'cancelled')
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-red-500/10 text-red-500 uppercase tracking-wider">Cancelled</span>
                    @else
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/10 text-amber-600 uppercase tracking-wider">Pending</span>
                    @endif
                </div>
            </div>
            @empty
            <div class="p-6 text-center text-[14px] text-muted">No bookings yet</div>
            @endforelse
        </div>
    </div>
</div>

@endsection
