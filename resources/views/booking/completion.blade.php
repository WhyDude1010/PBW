@extends('layouts.app')
@section('title', 'Thank You — Beautique')

@section('content')
<div class="min-h-screen bg-cream pt-[80px] lg:pt-[100px] pb-24 flex flex-col items-center justify-center relative overflow-hidden">
    
    <!-- Confetti Container -->
    <div class="absolute inset-0 pointer-events-none z-0" id="confetti-container"></div>

    <div class="max-w-xl mx-auto px-4 w-full relative z-10">
        <div class="bg-white/80 backdrop-blur-xl rounded-3xl border border-border shadow-[0_20px_60px_rgba(199,155,132,0.15)] p-10 lg:p-16 text-center">
            
            <div class="w-24 h-24 mx-auto mb-8 relative">
                <div class="absolute inset-0 bg-brand/20 rounded-full animate-ping"></div>
                <div class="relative w-full h-full bg-brand rounded-full flex items-center justify-center text-white shadow-xl">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.78-8.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z" fill="currentColor"/>
                    </svg>
                </div>
            </div>

            <h1 class="font-serif text-[40px] lg:text-[56px] font-bold text-dark leading-none mb-6">
                Thank <em class="text-brand italic">You!</em>
            </h1>
            
            <p class="text-[15.5px] text-muted leading-relaxed mb-12 max-w-sm mx-auto">
                Your booking journey is complete. We hope you felt truly beautiful today. We can't wait to serve you again!
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('booking.choose-mua') }}" class="inline-flex items-center justify-center gap-2 bg-dark hover:bg-black text-white px-8 py-4 rounded-xl font-bold text-[15px] transition-all shadow-lg hover:-translate-y-0.5">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                    Book Another MUA
                </a>
                <a href="{{ route('landing') }}" class="inline-flex items-center justify-center gap-2 bg-transparent border-2 border-brand text-brand hover:bg-brand hover:text-white px-8 py-4 rounded-xl font-bold text-[15px] transition-all">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Back to Home
                </a>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Confetti Animation
document.addEventListener("DOMContentLoaded", function() {
    const colors = ['#C79B84', '#E8D9D3', '#F6F1EE', '#1A1010', '#F59E0B', '#10B981'];
    const container = document.getElementById('confetti-container');
    
    for(let i = 0; i < 50; i++) {
        const dot = document.createElement('div');
        const size = Math.random() * 8 + 4;
        const color = colors[Math.floor(Math.random() * colors.length)];
        const left = Math.random() * 100;
        const duration = Math.random() * 3 + 2;
        const delay = Math.random() * 2;
        
        dot.style.cssText = `
            position: absolute;
            top: -20px;
            left: ${left}%;
            width: ${size}px;
            height: ${size}px;
            background-color: ${color};
            border-radius: 50%;
            opacity: 0;
            animation: fall ${duration}s linear ${delay}s infinite;
        `;
        
        container.appendChild(dot);
    }
});
</script>
<style>
@keyframes fall {
    0% { transform: translateY(-20px) rotate(0deg); opacity: 1; }
    100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
}
</style>
@endpush