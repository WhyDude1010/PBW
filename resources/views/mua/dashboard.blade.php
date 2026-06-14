@extends('layouts.mua')
@section('title','Dashboard')
@section('page_title','Dashboard')
@section('page_meta', 'Welcome back, ' . $user->name . ' · ' . date("l, d M Y"))

@section('content')

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4 hover:border-brand transition-colors">
        <div class="w-12 h-12 rounded-xl bg-brand/10 text-brand flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">{{ $todayBookings }}</div>
            <div class="text-[13px] font-bold text-muted">Today's Bookings</div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4 hover:border-brand transition-colors">
        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">{{ $monthRevenue > 0 ? number_format($monthRevenue/1000000, 1) . 'M' : '0' }}</div>
            <div class="text-[13px] font-bold text-muted">This Month</div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4 hover:border-brand transition-colors">
        <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">{{ $avgRating ?: '-' }}</div>
            <div class="text-[13px] font-bold text-muted">Avg Rating</div>
            <div class="text-[11px] font-medium text-muted">Based on {{ $totalReviews }} reviews</div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4 hover:border-brand transition-colors">
        <div class="w-12 h-12 rounded-xl bg-violet-500/10 text-violet-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">{{ $totalClients }}</div>
            <div class="text-[13px] font-bold text-muted">Total Clients</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mb-8">

    <div class="bg-white rounded-2xl border border-border shadow-sm">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between">
            <h3 class="font-bold text-[16px] text-dark">Upcoming Bookings</h3>
            <a href="{{ route('mua.bookings') }}" class="text-[13px] font-bold text-brand hover:text-brand-dark transition-colors flex items-center gap-1">
                View all
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
        <div class="divide-y divide-border">
            @forelse($upcomingBookings as $u)
            <div class="p-4 flex items-center justify-between hover:bg-cream/30 transition-colors">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand/10 flex items-center justify-center text-[14px] font-bold text-brand shrink-0">{{ substr($u->user->name, 0, 1) }}</div>
                    <div>
                        <div class="font-bold text-[14px] text-dark">{{ $u->user->name }}</div>
                        <div class="text-[12px] text-muted">{{ $u->booking_date->format('d M') }} · {{ \Carbon\Carbon::parse($u->booking_time)->format('H:i') }} · {{ $u->package ?? '-' }}</div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-[13px] font-bold text-brand mb-1">Rp {{ number_format($u->amount, 0, ',', '.') }}</div>
                    @if($u->status === 'confirmed')
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-500 uppercase tracking-wider">Confirmed</span>
                    @else
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/10 text-amber-600 uppercase tracking-wider">Pending</span>
                    @endif
                </div>
            </div>
            @empty
            <div class="p-8 text-center text-[13px] text-muted">No upcoming bookings.</div>
            @endforelse
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-border shadow-sm">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between">
            <h3 class="font-bold text-[16px] text-dark">Recent Reviews</h3>
            <a href="{{ route('mua.reviews') }}" class="text-[13px] font-bold text-brand hover:text-brand-dark transition-colors flex items-center gap-1">
                View all
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
        <div class="divide-y divide-border">
            @forelse($recentReviews as $rv)
            <div class="p-4 hover:bg-cream/30 transition-colors">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-brand/10 flex items-center justify-center text-[13px] font-bold text-brand shrink-0">{{ substr($rv->user->name, 0, 1) }}</div>
                        <span class="font-bold text-[14px] text-dark">{{ $rv->user->name }}</span>
                    </div>
                    <span class="text-[11px] text-muted">{{ $rv->created_at->format('d M Y') }}</span>
                </div>
                <div class="flex items-center gap-1 mb-2 ml-12">
                    @for($i=1;$i<=5;$i++)
                        @if($i <= $rv->rating)
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-amber-500)"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        @else
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-border)"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        @endif
                    @endfor
                </div>
                @if($rv->comment)
                <p class="text-[13px] text-muted ml-12">"{{ $rv->comment }}"</p>
                @endif
            </div>
            @empty
            <div class="p-8 text-center text-[13px] text-muted">No reviews yet.</div>
            @endforelse
        </div>
    </div>

</div>

<div class="bg-white rounded-2xl border border-border shadow-sm">
    <div class="px-6 py-5 border-b border-border flex items-center justify-between">
        <h3 class="font-bold text-[16px] text-dark">Monthly Earnings</h3>
        <span class="px-3 py-1 rounded-full bg-brand/10 text-brand text-[11px] font-bold uppercase tracking-wider">{{ date('Y') }}</span>
    </div>
    <div class="p-6">
        <div class="flex items-end justify-between gap-2 h-40">
            @foreach($monthlyEarnings as $idx => $me)
            <div class="flex-1 flex flex-col items-center gap-2">
                <div class="w-full rounded-t-lg transition-colors cursor-pointer {{ $idx === count($monthlyEarnings)-1 ? 'bg-brand shadow-md' : 'bg-brand/20 hover:bg-brand' }}" style="height: {{ $maxEarning > 0 ? max(($me['amount']/$maxEarning)*100, ($me['amount'] > 0 ? 5 : 2)) : 2 }}%"></div>
                <span class="text-[12px] font-medium {{ $idx === count($monthlyEarnings)-1 ? 'font-bold text-dark' : 'text-muted' }}">{{ $me['label'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
