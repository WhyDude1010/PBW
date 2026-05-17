@extends('layouts.app')
@section('title', 'Booking Confirmed — Beautique')

@section('content')
<div class="min-h-screen bg-cream pt-[80px] lg:pt-[100px] pb-24 flex flex-col items-center justify-center">
    <div class="max-w-2xl mx-auto px-4 w-full">
        
        <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden p-8 lg:p-12 text-center">
            
            <div class="w-20 h-20 mx-auto bg-emerald-500/10 rounded-full flex items-center justify-center text-emerald-500 mb-6 shadow-sm">
                <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path><path d="M22 4L12 14.01l-3-3"></path></svg>
            </div>
            
            <h1 class="font-serif text-[32px] lg:text-[40px] font-bold text-dark leading-tight mb-4">Booking Confirmed</h1>
            <p class="text-[15px] text-muted max-w-md mx-auto mb-10 leading-relaxed">Your payment was successful and your appointment with Sarah Wijaya is now locked in.</p>
            
            <div class="bg-cream rounded-2xl p-6 lg:p-8 text-left mb-10">
                <div class="flex justify-between items-center pb-4 border-b border-border mb-4">
                    <span class="text-[14px] text-muted">Status</span>
                    <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-500 text-[11px] font-bold uppercase tracking-wider">Confirmed</span>
                </div>
                <div class="flex justify-between items-center pb-4 border-b border-border mb-4">
                    <span class="text-[14px] text-muted">Payment</span>
                    <span class="px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-500 text-[11px] font-bold uppercase tracking-wider">Paid (DP)</span>
                </div>
                <div class="flex justify-between items-center pb-4 border-b border-border mb-4">
                    <span class="text-[14px] text-muted">Artist</span>
                    <strong class="text-[14px] text-dark">Sarah Wijaya</strong>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-[14px] text-muted">Date &amp; Time</span>
                    <strong class="text-[14px] text-dark">10 May 2026 &middot; 09:00</strong>
                </div>
            </div>

            <div class="flex items-start gap-3 p-5 bg-brand/10 rounded-xl mb-10 text-left">
                <svg class="mt-0.5 text-brand shrink-0" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="text-[14px] text-brand-dark leading-relaxed"><strong>Pro Tip:</strong> Please ensure you are ready 15 minutes before the scheduled time. The remaining balance (Rp 275.000) will be paid after the service is completed.</p>
            </div>
            
            <a href="{{ route('booking.countdown') }}" class="inline-flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white px-8 py-4 rounded-xl font-bold text-[15px] transition-all hover:shadow-[0_8px_20px_rgba(199,155,132,0.3)] hover:-translate-y-0.5 w-full sm:w-auto">
                View Booking Countdown
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path></svg>
            </a>

        </div>
    </div>
</div>
@endsection