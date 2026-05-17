@extends('layouts.app')
@section('title', 'Rate Your Experience — Beautique')

@section('content')
<div class="min-h-screen bg-cream pt-[80px] lg:pt-[100px] pb-24 flex flex-col items-center justify-center">
    <div class="max-w-2xl mx-auto px-4 w-full">
        
        <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden p-8 lg:p-12 text-center">
            
            <h1 class="font-serif text-[32px] lg:text-[40px] font-bold text-dark leading-tight mb-2">Rate Your Experience</h1>
            <p class="text-[15px] text-muted mb-8">How did Sarah do? Your feedback helps other clients find the right artist.</p>
            
            <div class="bg-cream rounded-2xl p-5 mb-10 flex items-center gap-4 text-left border border-border">
                <img src="{{ asset('image/model-mua.jpeg') }}" alt="Sarah" class="w-14 h-14 rounded-full object-cover border-2 border-white shadow-sm">
                <div>
                    <h4 class="font-bold text-[15px] text-dark mb-0.5">Sarah Wijaya</h4>
                    <p class="text-[13px] text-muted">10 May 2026 &middot; Basic Beauty Package</p>
                </div>
            </div>

            <!-- Stars -->
            <div class="mb-2">
                <span class="text-[14px] font-bold text-dark">Tap the stars to rate</span>
            </div>
            
            <div class="flex justify-center gap-2 sm:gap-4 mb-2" id="star-row">
                <button class="star-btn text-[40px] sm:text-[56px] text-border hover:scale-110 transition-all leading-none focus:outline-none" data-val="1" onclick="setRating(1)">★</button>
                <button class="star-btn text-[40px] sm:text-[56px] text-border hover:scale-110 transition-all leading-none focus:outline-none" data-val="2" onclick="setRating(2)">★</button>
                <button class="star-btn text-[40px] sm:text-[56px] text-border hover:scale-110 transition-all leading-none focus:outline-none" data-val="3" onclick="setRating(3)">★</button>
                <button class="star-btn text-[40px] sm:text-[56px] text-border hover:scale-110 transition-all leading-none focus:outline-none" data-val="4" onclick="setRating(4)">★</button>
                <button class="star-btn text-[40px] sm:text-[56px] text-border hover:scale-110 transition-all leading-none focus:outline-none" data-val="5" onclick="setRating(5)">★</button>
            </div>
            
            <div class="h-6 mb-8">
                <span class="text-[14px] font-bold text-brand transition-all" id="rating-text"></span>
            </div>

            <!-- Tags -->
            <div class="text-left mb-8">
                <label class="block text-[12px] font-bold text-muted uppercase tracking-wider mb-4">What did you love?</label>
                <div class="flex flex-wrap justify-center sm:justify-start gap-3">
                    <button class="q-tag px-4 py-2 rounded-full border border-border bg-white text-[13px] font-semibold text-muted hover:border-brand hover:text-brand transition-colors focus:outline-none" onclick="toggleTag(this)">Punctual</button>
                    <button class="q-tag px-4 py-2 rounded-full border border-border bg-white text-[13px] font-semibold text-muted hover:border-brand hover:text-brand transition-colors focus:outline-none" onclick="toggleTag(this)">Professional</button>
                    <button class="q-tag px-4 py-2 rounded-full border border-border bg-white text-[13px] font-semibold text-muted hover:border-brand hover:text-brand transition-colors focus:outline-none" onclick="toggleTag(this)">Long-lasting</button>
                    <button class="q-tag px-4 py-2 rounded-full border border-border bg-white text-[13px] font-semibold text-muted hover:border-brand hover:text-brand transition-colors focus:outline-none" onclick="toggleTag(this)">Natural Look</button>
                    <button class="q-tag px-4 py-2 rounded-full border border-border bg-white text-[13px] font-semibold text-muted hover:border-brand hover:text-brand transition-colors focus:outline-none" onclick="toggleTag(this)">Great Vibe</button>
                    <button class="q-tag px-4 py-2 rounded-full border border-border bg-white text-[13px] font-semibold text-muted hover:border-brand hover:text-brand transition-colors focus:outline-none" onclick="toggleTag(this)">Exceeded Expectations</button>
                </div>
            </div>

            <!-- Feedback Box -->
            <div class="text-left mb-10">
                <label class="block text-[13.5px] font-bold text-dark mb-3">Write a review (optional)</label>
                <textarea rows="4" class="w-full px-4 py-3 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-2 focus:ring-brand/20 transition-all text-[14.5px] text-dark placeholder:text-muted/60 resize-none" placeholder="Share your experience..."></textarea>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('booking.completion') }}" class="w-full sm:w-auto flex-1 inline-flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white px-8 py-4 rounded-xl font-bold text-[15px] transition-all hover:shadow-[0_8px_20px_rgba(199,155,132,0.3)] hover:-translate-y-0.5">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    Submit Review
                </a>
                <a href="{{ route('booking.completion') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 rounded-xl border border-border bg-white text-[15px] font-bold text-muted hover:border-brand hover:text-brand transition-colors">
                    Skip
                </a>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
const labels = ['','Terrible 😞','Could be better 😐','Good 🙂','Really good 😊','Amazing! 🤩'];
let currentRating = 0;

function setRating(n) {
    currentRating = n;
    const stars = document.querySelectorAll('.star-btn');
    stars.forEach((s, i) => {
        if(i < n) {
            s.classList.replace('text-border', 'text-amber-500');
        } else {
            s.classList.replace('text-amber-500', 'text-border');
        }
    });
    document.getElementById('rating-text').textContent = labels[n];
}

function toggleTag(el) {
    if(el.classList.contains('border-border')) {
        el.classList.replace('border-border', 'border-brand');
        el.classList.replace('text-muted', 'text-brand');
        el.classList.replace('bg-white', 'bg-brand/10');
    } else {
        el.classList.replace('border-brand', 'border-border');
        el.classList.replace('text-brand', 'text-muted');
        el.classList.replace('bg-brand/10', 'bg-white');
    }
}
</script>
@endpush