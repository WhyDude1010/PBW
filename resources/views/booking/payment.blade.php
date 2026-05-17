@extends('layouts.app')
@section('title', 'Payment Complete — Beautique')

@section('content')
<div class="min-h-screen bg-cream pt-[80px] lg:pt-[100px] pb-24 flex flex-col items-center justify-center">
    <div class="max-w-2xl mx-auto px-4 w-full">
        
        <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden p-8 lg:p-12 text-center relative">
            
            <!-- Confetti / Success Background Effect -->
            <div class="absolute inset-0 pointer-events-none overflow-hidden rounded-2xl">
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-emerald-500/5 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-emerald-500/5 rounded-full blur-3xl"></div>
            </div>

            <div class="relative z-10">
                <div class="w-24 h-24 mx-auto bg-emerald-500/10 rounded-full flex items-center justify-center text-emerald-500 mb-6 shadow-sm border-4 border-white animate-[bounce_1s_ease-in-out]">
                    <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path><path d="M22 4L12 14.01l-3-3"></path></svg>
                </div>
                
                <h1 class="font-serif text-[32px] lg:text-[40px] font-bold text-dark leading-tight mb-4">Payment Successful!</h1>
                <p class="text-[15px] text-muted max-w-md mx-auto mb-10 leading-relaxed">Your session has been fully paid. We hope you feel beautiful and confident with your new look.</p>
                
                <div class="bg-cream rounded-2xl p-6 lg:p-8 text-left mb-10 border border-border">
                    <div class="flex items-center gap-3 mb-6 pb-6 border-b border-border">
                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-brand shadow-sm">
                            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-[15px] text-dark">Receipt #B-98302</h4>
                            <p class="text-[13px] text-muted">10 May 2026</p>
                        </div>
                    </div>

                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between items-start">
                            <span class="text-[14px] text-muted">Artist</span>
                            <strong class="text-[14px] text-dark">Sarah Wijaya</strong>
                        </div>
                        <div class="flex justify-between items-start">
                            <span class="text-[14px] text-muted">Package</span>
                            <strong class="text-[14px] text-dark">Basic Beauty</strong>
                        </div>
                        <div class="flex justify-between items-start">
                            <span class="text-[14px] text-muted">Down Payment (Paid)</span>
                            <strong class="text-[14px] text-dark">Rp 275.000</strong>
                        </div>
                        <div class="flex justify-between items-start">
                            <span class="text-[14px] text-muted">Final Payment (Paid)</span>
                            <strong class="text-[14px] text-dark">Rp 275.000</strong>
                        </div>
                    </div>

                    <div class="flex justify-between items-center pt-4 border-t border-border">
                        <span class="text-[15px] font-bold text-dark">Total Paid</span>
                        <strong class="text-[20px] font-bold text-emerald-500">Rp 550.000</strong>
                    </div>
                </div>
                
                <a href="{{ route('booking.review') }}" class="inline-flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white px-8 py-4 rounded-xl font-bold text-[15px] transition-all hover:shadow-[0_8px_20px_rgba(199,155,132,0.3)] hover:-translate-y-0.5 w-full sm:w-auto">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                    Leave a Review
                </a>
            </div>

        </div>
    </div>
</div>
@endsection