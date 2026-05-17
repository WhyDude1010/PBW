@extends('layouts.app')
@section('title', 'Service Done — Beautique')

@section('content')
<div class="min-h-screen bg-cream pt-[80px] lg:pt-[100px] pb-24 flex flex-col items-center justify-center">
    <div class="max-w-4xl mx-auto px-4 w-full">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            
            <!-- Left: Success Message -->
            <div class="lg:col-span-5 flex flex-col justify-center text-center lg:text-left">
                <div class="w-20 h-20 mx-auto lg:mx-0 bg-brand rounded-full flex items-center justify-center text-white mb-8 shadow-[0_8px_24px_rgba(199,155,132,0.4)] animate-[bounce_1s_ease-in-out]">
                    <svg width="40" height="40" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                
                <h1 class="font-serif text-[36px] lg:text-[48px] font-bold text-dark leading-tight mb-4">You Look Stunning!</h1>
                <p class="text-[16px] text-muted leading-relaxed mb-8">Sarah has successfully completed your makeup session. We hope you love your new look!</p>
                
                <div class="hidden lg:block bg-white rounded-2xl border border-border p-6 shadow-sm">
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('image/model-mua.jpeg') }}" alt="MUA" class="w-16 h-16 rounded-full object-cover border-2 border-cream">
                        <div>
                            <h3 class="font-bold text-[18px] text-dark">Sarah Wijaya</h3>
                            <p class="text-[13px] text-muted">Professional Artist</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Payment Box -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden p-6 lg:p-10">
                    <h3 class="font-serif text-[24px] font-bold text-dark mb-2">Final Payment</h3>
                    <p class="text-[14px] text-muted mb-8">Please complete your final payment to wrap everything up.</p>

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

                    <div class="bg-cream rounded-xl p-5 mb-8 flex items-center justify-between">
                        <span class="text-[15px] font-bold text-dark">Remaining Balance</span>
                        <strong class="text-[20px] font-bold text-brand">Rp 275.000</strong>
                    </div>

                    <a href="{{ route('booking.payment') }}" class="w-full inline-flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white py-4 rounded-xl font-bold text-[15px] transition-all hover:shadow-[0_8px_20px_rgba(199,155,132,0.3)] hover:-translate-y-0.5">
                        Pay Now
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path></svg>
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function selectPay(el) {
    document.querySelectorAll('.pay-opt').forEach(e => {
        e.className = 'pay-opt group relative p-5 rounded-xl border-2 border-border bg-white cursor-pointer hover:border-brand flex items-center justify-between transition-all';
        const radio = e.querySelector('.pay-radio');
        radio.className = 'pay-radio w-6 h-6 rounded-full border-2 border-border bg-white transition-all';
        radio.innerHTML = '';
        
        const iconDiv = e.querySelector('.w-12');
        iconDiv.className = 'w-12 h-12 rounded-xl bg-cream border border-border flex items-center justify-center text-muted group-hover:text-brand transition-colors';
    });
    
    el.className = 'pay-opt group relative p-5 rounded-xl border-2 border-brand bg-brand/5 cursor-pointer flex items-center justify-between transition-all';
    const radio = el.querySelector('.pay-radio');
    radio.className = 'pay-radio w-6 h-6 rounded-full border-2 border-brand bg-brand flex items-center justify-center transition-all';
    radio.innerHTML = '<div class="w-2.5 h-2.5 bg-white rounded-full"></div>';
    
    const iconDiv = el.querySelector('.w-12');
    iconDiv.className = 'w-12 h-12 rounded-xl bg-white border border-border flex items-center justify-center text-brand group-hover:border-brand transition-colors';
}
</script>
@endpush