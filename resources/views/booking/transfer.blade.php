@extends('layouts.app')
@section('title', 'Payment Instructions — Beautique')

@section('content')
<div class="min-h-screen bg-cream pt-[80px] lg:pt-[100px] pb-24 flex flex-col items-center justify-center">
    <div class="max-w-2xl mx-auto px-4 w-full">
        
        <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden p-8 lg:p-12 text-center">
            
            <div class="w-20 h-20 mx-auto bg-amber-500/10 rounded-full flex items-center justify-center text-amber-500 mb-6 shadow-sm">
                <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            
            <h1 class="font-serif text-[32px] lg:text-[40px] font-bold text-dark leading-tight mb-4">Waiting for Payment</h1>
            <p class="text-[15px] text-muted max-w-md mx-auto mb-10 leading-relaxed">Please transfer the Down Payment to secure your appointment with {{ $booking->muaProfile->user->name }}.</p>
            
            <div class="bg-cream rounded-2xl p-6 lg:p-8 text-left mb-10">
                <div class="flex justify-between items-center pb-4 border-b border-border mb-4">
                    <span class="text-[14px] text-muted">Amount to Transfer</span>
                    <strong class="text-[18px] text-brand">Rp {{ number_format($booking->amount / 2, 0, ',', '.') }}</strong>
                </div>
                <div class="flex justify-between items-center pb-4 border-b border-border mb-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white rounded flex items-center justify-center text-[12px] font-bold text-dark border border-border">BCA</div>
                        <span class="text-[14px] text-muted">Bank Central Asia</span>
                    </div>
                    <strong class="text-[16px] text-dark">8921 4432 11</strong>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white rounded flex items-center justify-center text-[11px] font-bold text-dark border border-border leading-none text-center">MANDIRI</div>
                        <span class="text-[14px] text-muted">Bank Mandiri</span>
                    </div>
                    <strong class="text-[16px] text-dark">123 000 4455 667</strong>
                </div>
            </div>

            <div class="flex items-start gap-3 p-5 bg-amber-500/10 rounded-xl mb-10 text-left">
                <svg class="mt-0.5 text-amber-600 shrink-0" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="text-[14px] text-amber-800 leading-relaxed"><strong>Important:</strong> Your booking will be automatically cancelled if the transfer is not completed within 2 hours.</p>
            </div>
            
            <form action="{{ route('booking.transfer.confirm', $booking->id) }}" method="POST">
                @csrf
                <button type="submit" class="inline-flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white px-8 py-4 rounded-xl font-bold text-[15px] transition-all hover:shadow-[0_8px_20px_rgba(199,155,132,0.3)] hover:-translate-y-0.5 w-full sm:w-auto">
                    I Have Transferred
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path></svg>
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
