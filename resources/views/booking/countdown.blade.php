@extends('layouts.app')
@section('title', 'Booking Countdown — Beautique')

@section('content')
<div class="min-h-screen bg-cream pt-[80px] lg:pt-[100px] pb-24">
    <div class="max-w-4xl mx-auto px-4 md:px-8 lg:px-12">
        
        <!-- Header & Stepper -->
        <div class="flex flex-col lg:flex-row lg:items-center justify-between mb-8 gap-6">
            <div class="flex items-center gap-4">
                <a href="{{ route('booking.confirmed') }}" class="w-10 h-10 rounded-full bg-white border border-border flex items-center justify-center text-dark hover:border-brand hover:text-brand transition-all shrink-0">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                </a>
                <div>
                    <h1 class="font-serif text-[28px] lg:text-[36px] font-bold text-dark leading-tight">Confirmed Booking</h1>
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

        <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden flex flex-col lg:flex-row">
            
            <!-- Left: Countdown Timer -->
            <div class="lg:w-1/2 p-8 lg:p-12 flex flex-col items-center justify-center bg-linear-to-br from-cream to-white border-b lg:border-b-0 lg:border-r border-border">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-emerald-500/10 text-emerald-500 text-[12px] font-bold uppercase tracking-wider mb-8">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                    Confirmed
                </div>

                <p class="text-[14px] text-muted font-medium uppercase tracking-wider mb-6">Time until appointment</p>
                
                <div class="font-serif text-[56px] lg:text-[72px] font-bold text-dark tracking-widest leading-none mb-6 text-center tabular-nums" id="countdown">00 : 00 : 00</div>
                
                <p class="text-[14px] text-muted font-medium uppercase tracking-wider">until artist arrives</p>

                <div class="mt-12 w-full">
                    <a href="{{ route('booking.tracking') }}" class="w-full flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white py-4 rounded-xl font-bold text-[15px] transition-all hover:shadow-[0_8px_20px_rgba(199,155,132,0.3)] hover:-translate-y-0.5">
                        Go to Live Tracking
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Right: Details -->
            <div class="lg:w-1/2 p-8 lg:p-12">
                <h3 class="font-serif text-[24px] font-bold text-dark mb-6">Booking Details</h3>
                
                <div class="space-y-4 mb-8">
                    <div class="flex justify-between items-start pb-4 border-b border-border">
                        <span class="text-[14px] text-muted">Booked On</span>
                        <strong class="text-[14px] text-dark">Today, 7 May 2026</strong>
                    </div>
                    <div class="flex justify-between items-start pb-4 border-b border-border">
                        <span class="text-[14px] text-muted">Appointment Date</span>
                        <strong class="text-[14px] text-dark">10 May 2026 &middot; 09:00</strong>
                    </div>
                    <div class="flex justify-between items-start pb-4 border-b border-border">
                        <span class="text-[14px] text-muted">Artist</span>
                        <strong class="text-[14px] text-dark">Sarah Wijaya</strong>
                    </div>
                    <div class="flex justify-between items-start pb-4 border-b border-border">
                        <span class="text-[14px] text-muted">Service Type</span>
                        <strong class="text-[14px] text-dark">Home Service</strong>
                    </div>
                </div>

                <div class="bg-cream rounded-xl p-5 mb-6">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-[14px] text-muted">Service Fee</span>
                        <strong class="text-[14px] text-dark">Rp 500.000</strong>
                    </div>
                    <div class="flex justify-between items-center mb-4 pb-4 border-b border-border">
                        <span class="text-[14px] text-muted">Home Service Fee</span>
                        <strong class="text-[14px] text-dark">Rp 50.000</strong>
                    </div>
                    <div class="flex justify-between items-end">
                        <span class="text-[15px] font-bold text-dark">Total Amount</span>
                        <strong class="text-[18px] font-bold text-brand">Rp 550.000</strong>
                    </div>
                </div>

                <div class="flex items-start gap-3 p-4 bg-brand/10 rounded-xl">
                    <svg class="mt-0.5 text-brand shrink-0" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-[13.5px] text-brand-dark leading-relaxed">Keep this page open. Your artist's live tracking details will activate 1 hour before the appointment.</p>
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
// Countdown to appointment date
const appt = new Date('2026-05-10T09:00:00');
function updateCd() {
    const diff = appt - Date.now();
    if(diff <= 0) {
        document.getElementById('countdown').textContent = '00 : 00 : 00';
        return;
    }
    const h = Math.floor(diff / 3600000);
    const m = Math.floor((diff % 3600000) / 60000);
    const s = Math.floor((diff % 60000) / 1000);
    
    document.getElementById('countdown').innerHTML = `
        <span class="opacity-80">${String(h).padStart(2,'0')}</span> 
        <span class="opacity-50 text-[40px] align-top">:</span> 
        <span class="opacity-80">${String(m).padStart(2,'0')}</span> 
        <span class="opacity-50 text-[40px] align-top">:</span> 
        <span class="text-brand">${String(s).padStart(2,'0')}</span>
    `;
}
updateCd(); 
setInterval(updateCd, 1000);
</script>
@endpush