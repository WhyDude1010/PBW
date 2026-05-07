@extends('layouts.admin')
@section('title','Reviews')
@section('page_title','Reviews & Ratings')
@section('page_meta','Moderate client reviews')

@section('content')
<div class="stat-grid" style="grid-template-columns:repeat(3,1fr);margin-bottom:24px;">
    <div class="stat-card">
        <div class="stat-icon"><span class="material-icons-round">star_rate</span></div>
        <div><div class="stat-value">4.9</div><div class="stat-label">Overall Rating</div><div class="stat-delta">1,240 total reviews</div></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><span class="material-icons-round">pending_actions</span></div>
        <div><div class="stat-value">8</div><div class="stat-label">Pending Approval</div></div>
    </div>
    <div class="stat-card">
        <div class="stat-icon"><span class="material-icons-round">thumb_up</span></div>
        <div><div class="stat-value">98%</div><div class="stat-label">Positive Rate</div></div>
    </div>
</div>

<div class="page-card">
    <div class="page-card-header">
        <h4>All Reviews</h4>
        <div style="display:flex;gap:10px;">
            <div class="search-bar">
                <span class="search-icon material-icons-round">search</span>
                <input type="text" placeholder="Search reviews…" oninput="filterReviews(this.value)">
            </div>
            <select class="form-control" style="width:140px;padding:9px 12px;font-size:13px;" onchange="filterByStatus(this.value)">
                <option value="">All Reviews</option>
                <option value="approved">Approved</option>
                <option value="pending">Pending</option>
            </select>
        </div>
    </div>
    <div id="reviews-container" style="padding:0;">
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
        <div class="review-row" data-text="{{ strtolower($r[2]) }}" data-status="{{ $r[5] }}" style="padding:20px 24px;border-bottom:1px solid var(--border);display:flex;gap:16px;align-items:flex-start;">
            <!-- Avatar -->
            <div style="width:40px;height:40px;border-radius:50%;background:var(--rose-light);display:flex;align-items:center;justify-content:center;font-size:14px;font-weight:700;color:var(--rose);flex-shrink:0;">{{ substr($r[0],0,1) }}</div>
            <!-- Content -->
            <div style="flex:1;min-width:0;">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:4px;flex-wrap:wrap;gap:8px;">
                    <div>
                        <span style="font-weight:700;font-size:14px;color:var(--dark);">{{ $r[0] }}</span>
                        <span style="font-size:12px;color:var(--muted);margin:0 6px;">→</span>
                        <span style="font-size:13px;color:var(--rose);font-weight:600;">{{ $r[1] }}</span>
                    </div>
                    <div style="display:flex;align-items:center;gap:8px;">
                        <span style="font-size:11px;color:var(--muted);">{{ $r[4] }}</span>
                        @if($r[5]==='approved')
                            <span class="badge badge-success">Approved</span>
                        @else
                            <span class="badge badge-warning">Pending</span>
                        @endif
                    </div>
                </div>
                <!-- Stars -->
                <div style="display:flex;gap:2px;margin-bottom:8px;">
                    @for($i=1;$i<=5;$i++)
                        <span style="font-size:14px;color:{{ $i<=$r[2] ? '#F59E0B' : 'var(--border)' }};">★</span>
                    @endfor
                    <span style="font-size:12px;color:var(--muted);margin-left:6px;">{{ $r[2] }}.0</span>
                </div>
                <p style="font-size:13.5px;color:var(--text);line-height:1.7;margin-bottom:12px;">"{{ $r[3] }}"</p>
                <!-- Actions -->
                <div style="display:flex;gap:8px;">
                    @if($r[5]==='pending')
                    <button style="padding:6px 14px;border-radius:6px;background:var(--success-light);border:1px solid rgba(46,204,113,.3);font-size:12px;font-weight:600;color:#1A7A3C;cursor:pointer;">
                        <span class="material-icons-round" style="font-size:13px;vertical-align:middle;">check</span> Approve
                    </button>
                    @endif
                    <button style="padding:6px 14px;border-radius:6px;background:#FDEDEC;border:1px solid rgba(231,76,60,.2);font-size:12px;font-weight:600;color:var(--danger);cursor:pointer;">
                        <span class="material-icons-round" style="font-size:13px;vertical-align:middle;">delete</span> Delete
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
function filterReviews(q){ q=q.toLowerCase(); document.querySelectorAll('.review-row').forEach(r=>{r.style.display=r.dataset.text.includes(q)||r.textContent.toLowerCase().includes(q)?'':'none'}); }
function filterByStatus(s){ document.querySelectorAll('.review-row').forEach(r=>{r.style.display=(!s||r.dataset.status===s)?'':'none'}); }
</script>
@endpush
