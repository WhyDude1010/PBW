@extends('layouts.app')
@section('title', 'Booking Summary — Beautique')

@section('content')
<div class="min-h-screen bg-cream pt-[80px] lg:pt-[100px] pb-24">
    <div class="max-w-6xl mx-auto px-4 md:px-8 lg:px-12">
        
        <!-- Header & Stepper -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-8 gap-6">
            <div class="flex items-center gap-4">
                <a href="{{ route('booking.select-date') }}" class="w-10 h-10 rounded-full bg-white border border-border flex items-center justify-center text-dark hover:border-brand hover:text-brand transition-all shrink-0">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                </a>
                <div>
                    <h1 class="font-serif text-[28px] lg:text-[36px] font-bold text-dark leading-tight">Booking Summary</h1>
                </div>
            </div>

            <!-- Stepper -->
            <div class="flex items-center gap-2 lg:gap-4 overflow-x-auto pb-2 hide-scrollbar">
                <div class="flex flex-col items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-brand flex items-center justify-center text-white shadow-[0_4px_12px_rgba(199,155,132,0.3)] border-2 border-white">
                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg>
                    </div>
                    <span class="text-[11px] font-bold text-brand uppercase tracking-wider">Booking</span>
                </div>
                <div class="w-10 lg:w-16 h-0.5 bg-brand rounded-full mb-5"></div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-brand flex items-center justify-center text-white shadow-[0_4px_12px_rgba(199,155,132,0.3)] border-2 border-white">
                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg>
                    </div>
                    <span class="text-[11px] font-bold text-brand uppercase tracking-wider">Time</span>
                </div>
                <div class="w-10 lg:w-16 h-0.5 bg-brand rounded-full mb-5"></div>
                <div class="flex flex-col items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-brand flex items-center justify-center text-white shadow-[0_4px_12px_rgba(199,155,132,0.3)] border-2 border-white ring-4 ring-brand/20">
                        <svg width="14" height="14" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2.5" class="hidden"><path d="M2 6l3 3 5-5"/></svg>
                    </div>
                    <span class="text-[11px] font-bold text-brand uppercase tracking-wider">Service</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            <!-- Left Content: Status & Payment -->
            <div class="lg:col-span-7 xl:col-span-8 flex flex-col gap-6">
                
                <div class="bg-white rounded-2xl border border-border shadow-sm p-6 lg:p-10 text-center lg:text-left flex flex-col lg:flex-row items-center gap-6">
                    <div class="w-16 h-16 rounded-full bg-amber-500/10 flex items-center justify-center text-amber-500 shrink-0">
                        <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-amber-500/10 text-amber-700 text-[12px] font-bold uppercase tracking-wider mb-3">Pending Payment</div>
                        <p class="text-[14.5px] text-muted leading-relaxed">Complete your down payment within 24 hours to secure your booking. Unpaid bookings are automatically cancelled.</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-border shadow-sm p-6 lg:p-10">
                    <h3 class="font-serif text-[24px] font-bold text-dark mb-6">Down Payment (DP 50%)</h3>
                    
                    <div class="space-y-4 mb-8">
                        <!-- Option 1 -->
                        <div class="pay-opt group relative p-5 rounded-xl border-2 border-brand bg-brand/5 cursor-pointer flex items-center justify-between transition-all" onclick="selectPay(this)">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-white border border-border flex items-center justify-center text-brand group-hover:border-brand transition-colors">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                </div>
                                <div>
                                    <strong class="block text-[15px] font-bold text-dark mb-1">Bank Transfer</strong>
                                    <span class="text-[13px] text-muted">BCA, Mandiri, BNI, BRI</span>
                                </div>
                            </div>
                            <div class="pay-radio w-6 h-6 rounded-full border-2 border-brand bg-brand flex items-center justify-center transition-all">
                                <div class="w-2.5 h-2.5 bg-white rounded-full"></div>
                            </div>
                        </div>

                        <!-- Option 2 -->
                        <div class="pay-opt group relative p-5 rounded-xl border-2 border-border bg-white cursor-pointer hover:border-brand flex items-center justify-between transition-all" onclick="selectPay(this)">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-cream border border-border flex items-center justify-center text-muted group-hover:text-brand transition-colors">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                </div>
                                <div>
                                    <strong class="block text-[15px] font-bold text-dark mb-1">Credit / Debit Card</strong>
                                    <span class="text-[13px] text-muted">Visa, Mastercard</span>
                                </div>
                            </div>
                            <div class="pay-radio w-6 h-6 rounded-full border-2 border-border bg-white transition-all"></div>
                        </div>

                        <!-- Option 3 -->
                        <div class="pay-opt group relative p-5 rounded-xl border-2 border-border bg-white cursor-pointer hover:border-brand flex items-center justify-between transition-all" onclick="selectPay(this)">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-xl bg-cream border border-border flex items-center justify-center text-muted group-hover:text-brand transition-colors">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <strong class="block text-[15px] font-bold text-dark mb-1">E-Wallet</strong>
                                    <span class="text-[13px] text-muted">GoPay, OVO, Dana</span>
                                </div>
                            </div>
                            <div class="pay-radio w-6 h-6 rounded-full border-2 border-border bg-white transition-all"></div>
                        </div>
                    </div>

                    <div class="flex items-start gap-3 p-4 bg-brand/10 rounded-xl mb-8">
                        <svg class="mt-0.5 text-brand shrink-0" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p class="text-[13.5px] text-brand-dark leading-relaxed">Confirmation is automatic after payment verification. Your artist will be notified immediately.</p>
                    </div>

                    <a href="{{ route('booking.confirmed') }}" class="w-full inline-flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white py-4 rounded-xl font-bold text-[15px] transition-all hover:shadow-[0_8px_20px_rgba(199,155,132,0.3)] hover:-translate-y-0.5">
                        Confirm &amp; Pay Rp 275.000
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Right Column Sidebar -->
            <div class="lg:col-span-5 xl:col-span-4">
                <div class="bg-white rounded-2xl border border-border p-6 lg:p-8 shadow-sm sticky top-24">
                    
                    <div class="flex items-center gap-4 mb-6 pb-6 border-b border-border">
                        <img src="{{ asset('image/model-mua.jpeg') }}" alt="MUA" class="w-16 h-16 rounded-full object-cover border-2 border-cream">
                        <div>
                            <h3 class="font-bold text-[18px] text-dark">Sarah Wijaya</h3>
                            <p class="text-[13px] text-muted flex items-center gap-1 mt-1">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-amber-500)" stroke="var(--color-amber-500)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                <span class="font-bold text-dark">4.9</span> &middot; Bali
                            </p>
                        </div>
                    </div>
                    
                    <h4 class="text-[13px] font-bold text-muted uppercase tracking-wider mb-4">Service Details</h4>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-start">
                            <span class="text-[14px] text-muted">Date</span>
                            <strong class="text-[14px] text-dark text-right">Sat, 10 May 2026</strong>
                        </div>
                        <div class="flex justify-between items-start">
                            <span class="text-[14px] text-muted">Time</span>
                            <strong class="text-[14px] text-dark text-right">09:00 – 11:00</strong>
                        </div>
                        <div class="flex justify-between items-start">
                            <span class="text-[14px] text-muted">Location</span>
                            <strong class="text-[14px] text-dark text-right">Home Visit</strong>
                        </div>
                        <div class="flex justify-between items-start">
                            <span class="text-[14px] text-muted">Address</span>
                            <strong class="text-[14px] text-dark text-right max-w-[180px]">Jl. Raya Kuta No. 25, Bali</strong>
                        </div>
                    </div>

                    <h4 class="text-[13px] font-bold text-muted uppercase tracking-wider mb-4">Price Breakdown</h4>

                    <div class="bg-cream rounded-xl p-5">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-[14.5px] text-muted">Basic Beauty</span>
                            <strong class="text-[14.5px] text-dark">Rp 500.000</strong>
                        </div>
                        <div class="flex justify-between items-center mb-5 pb-5 border-b border-border">
                            <span class="text-[14.5px] text-muted">Lash Application</span>
                            <strong class="text-[14.5px] text-dark">Rp 50.000</strong>
                        </div>
                        <div class="flex justify-between items-end">
                            <div>
                                <span class="text-[12px] font-bold text-muted uppercase tracking-wider block mb-1">Total Amount</span>
                                <strong class="text-[22px] font-bold text-dark block leading-none">Rp 550.000</strong>
                            </div>
                        </div>
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

@push('scripts')
<script>
function selectPay(el) {
    // Reset all
    document.querySelectorAll('.pay-opt').forEach(e => {
        e.className = 'pay-opt group relative p-5 rounded-xl border-2 border-border bg-white cursor-pointer hover:border-brand flex items-center justify-between transition-all';
        const radio = e.querySelector('.pay-radio');
        radio.className = 'pay-radio w-6 h-6 rounded-full border-2 border-border bg-white transition-all';
        radio.innerHTML = '';
        
        const iconDiv = e.querySelector('.w-12');
        iconDiv.className = 'w-12 h-12 rounded-xl bg-cream border border-border flex items-center justify-center text-muted group-hover:text-brand transition-colors';
    });
    
    // Select this one
    el.className = 'pay-opt group relative p-5 rounded-xl border-2 border-brand bg-brand/5 cursor-pointer flex items-center justify-between transition-all';
    const radio = el.querySelector('.pay-radio');
    radio.className = 'pay-radio w-6 h-6 rounded-full border-2 border-brand bg-brand flex items-center justify-center transition-all';
    radio.innerHTML = '<div class="w-2.5 h-2.5 bg-white rounded-full"></div>';
    
    const iconDiv = el.querySelector('.w-12');
    iconDiv.className = 'w-12 h-12 rounded-xl bg-white border border-border flex items-center justify-center text-brand group-hover:border-brand transition-colors';
}
</script>
@endpush