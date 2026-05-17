@extends('layouts.admin')
@section('title','Reviews')
@section('page_title','Reviews & Ratings')
@section('page_meta','Moderate client reviews')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">4.9</div>
            <div class="text-[13px] font-bold text-muted mb-2">Overall Rating</div>
            <div class="text-[11px] font-medium text-muted">1,240 total reviews</div>
        </div>
    </div>
    
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-brand/10 text-brand flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">8</div>
            <div class="text-[13px] font-bold text-muted">Pending Approval</div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">98%</div>
            <div class="text-[13px] font-bold text-muted">Positive Rate</div>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden flex flex-col">
    <div class="px-6 py-5 border-b border-border bg-white flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <h4 class="font-bold text-[16px] text-dark">All Reviews</h4>
        
        <div class="flex flex-col sm:flex-row gap-3 sm:items-center">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-muted w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" placeholder="Search reviews…" oninput="filterReviews(this.value)" class="pl-9 pr-4 py-2 w-full sm:w-64 rounded-xl border border-border bg-cream/50 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark placeholder:text-muted">
            </div>
            <select onchange="filterByStatus(this.value)" class="px-4 py-2 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark cursor-pointer">
                <option value="">All Reviews</option>
                <option value="approved">Approved</option>
                <option value="pending">Pending</option>
            </select>
        </div>
    </div>
    
    <div class="divide-y divide-border">
        @php
        $reviews = [
            ['Rina Maharani','Sarah Wijaya',5,'Absolutely stunning work for my wedding! Everyone kept complimenting my look.','10 May 2026','approved'],
            ['Delia Santoso','Mia Rahardjo',5,'Incredibly professional. Makeup lasted 10+ hours perfectly!','11 May 2026','approved'],
            ['Citra Dewi','Dera Sanjaya',5,'The editorial look exceeded all expectations. Highly recommend!','12 May 2026','approved'],
            ['Ayu Pratiwi','Sarah Wijaya',4,'Great work overall, would have preferred a bit more coverage.','13 May 2026','pending'],
            ['Sari Indah','Mia Rahardjo',5,'Warm, professional, and made me feel so comfortable!','14 May 2026','pending'],
        ];
        @endphp
        @foreach($reviews as $r)
        <div class="review-row hover:bg-cream/30 transition-colors p-6 flex gap-4 md:gap-6 items-start" data-text="{{ strtolower($r[2]) }}" data-status="{{ $r[5] }}">
            <!-- Avatar -->
            <div class="w-12 h-12 rounded-full bg-brand/10 flex items-center justify-center text-[15px] font-bold text-brand shrink-0">
                {{ substr($r[0],0,1) }}
            </div>
            
            <!-- Content -->
            <div class="flex-1 min-w-0">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="font-bold text-[14.5px] text-dark">{{ $r[0] }}</span>
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="text-muted"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        <span class="font-bold text-[13.5px] text-brand">{{ $r[1] }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="text-[12px] text-muted">{{ $r[4] }}</span>
                        @if($r[5] === 'approved')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-500 uppercase tracking-wider">Approved</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-amber-500/10 text-amber-600 uppercase tracking-wider">Pending</span>
                        @endif
                    </div>
                </div>
                
                <!-- Stars -->
                <div class="flex items-center gap-1 mb-3">
                    @for($i=1;$i<=5;$i++)
                        @if($i <= $r[2])
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--color-amber-500)"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        @else
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--color-border)"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        @endif
                    @endfor
                    <span class="text-[12px] font-bold text-dark ml-1">{{ $r[2] }}.0</span>
                </div>
                
                <p class="text-[14px] text-muted leading-relaxed mb-4">"{{ $r[3] }}"</p>
                
                <!-- Actions -->
                <div class="flex flex-wrap gap-2">
                    @if($r[5] === 'pending')
                    <button class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-emerald-500/10 text-emerald-500 hover:bg-emerald-500 hover:text-white font-bold text-[12px] transition-colors">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                        Approve
                    </button>
                    @endif
                    <button class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white font-bold text-[12px] transition-colors">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Delete
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
function filterReviews(q){ 
    q = q.toLowerCase(); 
    document.querySelectorAll('.review-row').forEach(r => {
        r.style.display = r.dataset.text.includes(q) || r.textContent.toLowerCase().includes(q) ? '' : 'none';
    }); 
}
function filterByStatus(s){ 
    document.querySelectorAll('.review-row').forEach(r => {
        r.style.display = (!s || r.dataset.status === s) ? '' : 'none';
    }); 
}
</script>
@endpush
