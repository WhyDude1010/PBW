@extends('layouts.mobile')
@section('title','Rate Your Experience — Beautique')
@section('flow_step','Step 9 · Review')

@section('content')
<style>
.mobile-card{width:100%;max-width:480px;min-height:calc(100vh - 80px);border-radius:var(--radius-xl);box-shadow:0 24px 80px rgba(0,0,0,.1);background:var(--white);display:flex;flex-direction:column;overflow:hidden;}
.mh{padding:22px 24px 0;flex-shrink:0;}
.mh-top{display:flex;align-items:center;gap:12px;margin-bottom:20px;}
.mh-top a{width:34px;height:34px;border-radius:50%;background:var(--cream);display:flex;align-items:center;justify-content:center;color:var(--dark);transition:var(--transition);}
.mh-top a:hover{background:var(--rose-light);color:var(--rose-dark);}
.mh-top h1{flex:1;text-align:center;font-size:16px;font-weight:700;color:var(--dark);}
.sp{width:34px;}
.flow-stepper{display:flex;align-items:center;justify-content:center;gap:0;padding:0 16px;margin-bottom:24px;}
.fs-dot{width:26px;height:26px;border-radius:50%;background:var(--border);display:flex;align-items:center;justify-content:center;flex-shrink:0;border:2px solid var(--white);box-shadow:var(--shadow-sm);}
.fs-dot.done{background:var(--rose);}
.fs-dot svg{width:11px;height:11px;display:none;}
.fs-dot.done svg{display:block;}
.fs-line{flex:1;height:2px;background:var(--border);}
.fs-line.done{background:var(--rose);}
.fs-wrap{display:flex;flex-direction:column;align-items:center;gap:5px;}
.fs-label{font-size:9.5px;font-weight:600;color:var(--muted);}
.fs-wrap.done .fs-label{color:var(--rose-dark);}
.mb{flex:1;overflow-y:auto;padding:0 24px 16px;}
/* Artist card */
.artist-review-card{display:flex;align-items:center;gap:14px;background:var(--cream);border-radius:var(--radius-md);padding:14px;margin-bottom:24px;}
.artist-review-card img{width:56px;height:56px;border-radius:50%;object-fit:cover;border:2px solid var(--rose-light);}
.artist-review-card h4{font-size:14.5px;font-weight:700;color:var(--dark);}
.artist-review-card p{font-size:12px;color:var(--muted);}
/* Rating section */
.rate-label{font-size:13px;font-weight:700;color:var(--dark);text-align:center;margin-bottom:6px;}
.rate-sub{font-size:12px;color:var(--muted);text-align:center;margin-bottom:18px;}
.stars-row{display:flex;justify-content:center;gap:10px;margin-bottom:8px;}
.star-btn{font-size:40px;cursor:pointer;color:var(--border);transition:color .2s,transform .15s;line-height:1;background:none;border:none;padding:2px;}
.star-btn.lit{color:#F59E0B;}
.star-btn:hover{transform:scale(1.2);}
.rating-text{text-align:center;font-size:12px;font-weight:600;color:var(--rose);min-height:18px;margin-bottom:22px;}
/* Quick tags */
.tags-label{font-size:12px;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:1px;margin-bottom:10px;}
.quick-tags{display:flex;flex-wrap:wrap;gap:8px;margin-bottom:22px;}
.q-tag{padding:7px 14px;border-radius:var(--radius-pill);border:1.5px solid var(--border);font-size:12px;font-weight:600;color:var(--muted);cursor:pointer;transition:var(--transition);}
.q-tag.selected,.q-tag:hover{border-color:var(--rose);color:var(--rose);background:var(--rose-light);}
/* Textarea */
.feedback-label{font-size:13px;font-weight:700;color:var(--dark);margin-bottom:8px;}
textarea.form-control{resize:none;height:120px;}
.mf{padding:16px 24px 28px;border-top:1px solid var(--border);flex-shrink:0;}
.mf .btn{width:100%;justify-content:center;border-radius:var(--radius-sm);padding:15px;font-size:15px;}
</style>

<div class="mobile-card">
    <div class="mh">
        <div class="mh-top">
            <a href="{{ route('booking.payment') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
            <h1>Rating &amp; Review</h1>
            <div class="sp"></div>
        </div>
        <div class="flow-stepper">
            <div class="fs-wrap done"><div class="fs-dot done"><svg viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg></div><span class="fs-label">Booking</span></div>
            <div class="fs-line done"></div>
            <div class="fs-wrap done"><div class="fs-dot done"><svg viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg></div><span class="fs-label">Appointment</span></div>
            <div class="fs-line done"></div>
            <div class="fs-wrap done"><div class="fs-dot done"><svg viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg></div><span class="fs-label">Service</span></div>
        </div>
    </div>

    <div class="mb">
        <div class="artist-review-card">
            <img src="{{ asset('image/model-mua.jpeg') }}" alt="Sarah">
            <div>
                <h4>Sarah Wijaya</h4>
                <p>10 May 2026 · Basic Beauty Package</p>
            </div>
        </div>

        <div class="rate-label">How was your experience?</div>
        <div class="rate-sub">Tap the stars to rate Sarah</div>

        <div class="stars-row" id="star-row">
            <button class="star-btn" data-val="1" onclick="setRating(1)">★</button>
            <button class="star-btn" data-val="2" onclick="setRating(2)">★</button>
            <button class="star-btn" data-val="3" onclick="setRating(3)">★</button>
            <button class="star-btn" data-val="4" onclick="setRating(4)">★</button>
            <button class="star-btn" data-val="5" onclick="setRating(5)">★</button>
        </div>
        <div class="rating-text" id="rating-text"></div>

        <div class="tags-label">What did you love?</div>
        <div class="quick-tags">
            <div class="q-tag" onclick="toggleTag(this)">Punctual</div>
            <div class="q-tag" onclick="toggleTag(this)">Professional</div>
            <div class="q-tag" onclick="toggleTag(this)">Long-lasting</div>
            <div class="q-tag" onclick="toggleTag(this)">Natural Look</div>
            <div class="q-tag" onclick="toggleTag(this)">Great Vibe</div>
            <div class="q-tag" onclick="toggleTag(this)">Exceeded Expectations</div>
        </div>

        <div class="feedback-label">Write a review (optional)</div>
        <textarea class="form-control" id="feedback-text" placeholder="Share your experience — it helps other clients find the right artist..."></textarea>
    </div>

    <div class="mf">
        <a href="{{ route('booking.completion') }}" class="btn btn-primary">
            Submit Review <span class="material-icons-round" style="font-size:18px">send</span>
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
const labels = ['','Terrible 😞','Could be better 😐','Good 🙂','Really good 😊','Amazing! 🤩'];
let currentRating = 0;
function setRating(n){
    currentRating = n;
    document.querySelectorAll('.star-btn').forEach((s,i)=>s.classList.toggle('lit', i<n));
    document.getElementById('rating-text').textContent = labels[n];
}
function toggleTag(el){el.classList.toggle('selected');}
</script>
@endpush