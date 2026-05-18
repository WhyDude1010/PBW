@extends('layouts.mua')
@section('title','My Reviews')
@section('page_title','My Reviews')
@section('page_meta','Reviews and ratings from your clients')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">4.9</div>
            <div class="text-[13px] font-bold text-muted">Average Rating</div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-brand/10 text-brand flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">152</div>
            <div class="text-[13px] font-bold text-muted">Total Reviews</div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">97%</div>
            <div class="text-[13px] font-bold text-muted">5-Star Rate</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mb-8">
    <div class="bg-white rounded-2xl border border-border shadow-sm p-6">
        <h4 class="font-bold text-[15px] text-dark mb-5">Rating Breakdown</h4>
        <div class="space-y-3">
            @php $breakdown = [['5', 145], ['4', 5], ['3', 1], ['2', 1], ['1', 0]]; @endphp
            @foreach($breakdown as $bd)
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-1 w-12 shrink-0">
                    <span class="text-[13px] font-bold text-dark">{{ $bd[0] }}</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-amber-500)"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                </div>
                <div class="flex-1 h-2.5 bg-cream rounded-full overflow-hidden">
                    <div class="h-full bg-brand rounded-full transition-all" style="width: {{ $bd[1] > 0 ? max(($bd[1]/152)*100, 2) : 0 }}%"></div>
                </div>
                <span class="text-[12px] font-bold text-muted w-8 text-right">{{ $bd[1] }}</span>
            </div>
            @endforeach
        </div>
    </div>

    <div class="xl:col-span-2 bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-border flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h4 class="font-bold text-[16px] text-dark">All Reviews</h4>
            <div class="relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-muted w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" placeholder="Search reviews…" oninput="filterMuaReviews(this.value)" class="pl-9 pr-4 py-2 w-full sm:w-56 rounded-xl border border-border bg-cream/50 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark placeholder:text-muted">
            </div>
        </div>
        <div class="divide-y divide-border max-h-[600px] overflow-y-auto" id="mua-reviews-list">
            @php
            $reviews = [
                ['Rina Maharani',5,'Absolutely stunning work for my wedding! Everyone kept complimenting my look. Sarah is incredibly talented and professional.','10 May 2026','Signature Bridal'],
                ['Delia Santoso',5,'Incredibly professional. The makeup lasted 10+ hours in the Bali heat. Would book again!','8 May 2026','Creative Glam'],
                ['Citra Dewi',5,'The editorial look exceeded all expectations. Perfect for my photoshoot.','5 May 2026','Editorial'],
                ['Ayu Pratiwi',4,'Great work overall, natural glow look was beautiful. Only wished for a bit more coverage on the chin area.','1 May 2026','Natural'],
                ['Sari Indah',5,'Warm, professional, and made me feel so comfortable during the whole session!','28 Apr 2026','Basic Beauty'],
                ['Mega Putri',5,'Best MUA in Bali! My bridal look was everything I dreamed of.','25 Apr 2026','Signature Bridal'],
                ['Lisa Permata',5,'Sarah understood exactly what I wanted. The Korean dewy look was flawless.','20 Apr 2026','Korean Dewy'],
                ['Dewi Lestari',4,'Lovely experience. The party look was perfect for the event.','15 Apr 2026','Party Glam'],
            ];
            @endphp
            @foreach($reviews as $r)
            <div class="mua-review-item p-5 hover:bg-cream/30 transition-colors">
                <div class="flex items-center justify-between mb-3">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-brand/10 flex items-center justify-center text-[14px] font-bold text-brand shrink-0">{{ substr($r[0],0,1) }}</div>
                        <div>
                            <div class="font-bold text-[14px] text-dark">{{ $r[0] }}</div>
                            <div class="text-[11px] text-muted">{{ $r[4] }} · {{ $r[3] }}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-1">
                        @for($i=1;$i<=5;$i++)
                            @if($i <= $r[1])
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-amber-500)"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            @else
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-border)"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            @endif
                        @endfor
                    </div>
                </div>
                <p class="text-[13px] text-muted leading-relaxed ml-[52px]">"{{ $r[2] }}"</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function filterMuaReviews(q) {
    q = q.toLowerCase();
    document.querySelectorAll('.mua-review-item').forEach(el => {
        el.style.display = el.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
}
</script>
@endpush
