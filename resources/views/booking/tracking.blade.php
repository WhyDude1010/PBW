@extends('layouts.mobile')
@section('title','Service Tracking — Beautique')
@section('flow_step','Step 6 · Tracking')

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
.fs-dot.active{background:var(--rose);box-shadow:0 0 0 4px rgba(198,147,126,.2);}
.fs-dot svg{width:11px;height:11px;display:none;}
.fs-dot.done svg,.fs-dot.active svg{display:block;}
.fs-line{flex:1;height:2px;background:var(--border);}
.fs-line.done{background:var(--rose);}
.fs-wrap{display:flex;flex-direction:column;align-items:center;gap:5px;}
.fs-label{font-size:9.5px;font-weight:600;color:var(--muted);}
.fs-wrap.done .fs-label,.fs-wrap.active .fs-label{color:var(--rose-dark);}
.mb{flex:1;overflow-y:auto;padding:0 24px 16px;text-align:center;}
/* Artist status */
.artist-row{display:flex;align-items:center;gap:14px;background:var(--cream);border-radius:var(--radius-md);padding:14px;margin-bottom:20px;text-align:left;}
.artist-row img{width:52px;height:52px;border-radius:50%;object-fit:cover;border:2px solid var(--rose-light);}
.artist-row-info h4{font-size:14px;font-weight:700;color:var(--dark);}
.artist-row-info p{font-size:12px;color:var(--muted);}
.on-way-pill{display:inline-flex;align-items:center;gap:5px;padding:3px 10px;border-radius:var(--radius-pill);background:var(--warning-light);color:#9B6A00;font-size:11px;font-weight:700;margin-top:4px;}
.on-way-pill::before{content:'';width:6px;height:6px;border-radius:50%;background:#F59E0B;animation:pulse-dot 1.2s ease infinite;}
@keyframes pulse-dot{0%,100%{opacity:1;transform:scale(1)}50%{opacity:.4;transform:scale(.7)}}
/* Status title */
.mb h3{font-size:19px;font-weight:700;color:var(--dark);margin-bottom:8px;}
.mb > p{font-size:13.5px;color:var(--muted);margin-bottom:20px;line-height:1.7;}
/* Timer */
.timer-card{background:linear-gradient(135deg,var(--cream) 0%,var(--cream-dark) 100%);border-radius:var(--radius-lg);padding:28px 20px;margin-bottom:16px;border:1px solid var(--border);}
.timer-card h4{font-size:13.5px;font-weight:600;color:var(--muted);margin-bottom:12px;}
.timer-digits{font-family:var(--font-serif);font-size:50px;font-weight:700;color:var(--dark);letter-spacing:4px;line-height:1;}
.timer-card p{font-size:12.5px;color:var(--muted);margin-top:8px;}
/* Progress steps */
.progress-steps{text-align:left;margin-bottom:20px;}
.prog-step{display:flex;align-items:flex-start;gap:14px;padding:12px 0;position:relative;}
.prog-step:not(:last-child)::after{content:'';position:absolute;left:15px;top:36px;bottom:-12px;width:2px;background:var(--border);}
.prog-step.done::after{background:var(--rose);}
.prog-dot{width:30px;height:30px;border-radius:50%;background:var(--border);display:flex;align-items:center;justify-content:center;flex-shrink:0;z-index:1;}
.prog-step.done .prog-dot{background:var(--rose);}
.prog-step.current .prog-dot{background:var(--rose);box-shadow:0 0 0 4px rgba(198,147,126,.2);}
.prog-dot .material-icons-round{font-size:15px;color:#fff;}
.prog-info strong{font-size:13.5px;font-weight:700;color:var(--dark);}
.prog-info p{font-size:12px;color:var(--muted);}
.mf{padding:16px 24px 28px;border-top:1px solid var(--border);flex-shrink:0;}
.mf .info-row{display:flex;align-items:center;gap:8px;margin-bottom:14px;background:var(--rose-light);padding:10px 14px;border-radius:10px;}
.mf .info-row .material-icons-round{font-size:16px;color:var(--rose);}
.mf .info-row p{font-size:12px;color:var(--rose-dark);}
.mf .btn{width:100%;justify-content:center;border-radius:var(--radius-sm);padding:15px;font-size:15px;}
</style>

<div class="mobile-card">
    <div class="mh">
        <div class="mh-top">
            <a href="{{ route('booking.countdown') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
            <h1>Service Tracking</h1>
            <div class="sp"></div>
        </div>
        <div class="flow-stepper">
            <div class="fs-wrap done"><div class="fs-dot done"><svg viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg></div><span class="fs-label">Booking</span></div>
            <div class="fs-line done"></div>
            <div class="fs-wrap done"><div class="fs-dot done"><svg viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg></div><span class="fs-label">Appointment</span></div>
            <div class="fs-line done"></div>
            <div class="fs-wrap active"><div class="fs-dot active"><svg viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg></div><span class="fs-label">Service</span></div>
        </div>
    </div>

    <div class="mb">
        <!-- Artist card -->
        <div class="artist-row">
            <img src="{{ asset('image/model-mua.jpeg') }}" alt="Sarah">
            <div class="artist-row-info">
                <h4>Sarah Wijaya</h4>
                <p>⭐ 4.9 · Bridal, Natural, Korean Dewy</p>
                <div class="on-way-pill">On the way</div>
            </div>
        </div>

        <h3>Service In Progress</h3>
        <p>Your makeup artist is heading to your location. Please be ready at the scheduled time.</p>

        <div class="timer-card">
            <h4>Time remaining</h4>
            <div class="timer-digits" id="track-timer">00 : 10 : 00</div>
            <p>until artist arrives</p>
        </div>

        <!-- Progress steps -->
        <div class="progress-steps">
            <div class="prog-step done">
                <div class="prog-dot"><span class="material-icons-round">check</span></div>
                <div class="prog-info"><strong>Booking Confirmed</strong><p>Payment received &amp; booking locked in</p></div>
            </div>
            <div class="prog-step done">
                <div class="prog-dot"><span class="material-icons-round">check</span></div>
                <div class="prog-info"><strong>Artist Assigned</strong><p>Sarah Wijaya has accepted your booking</p></div>
            </div>
            <div class="prog-step current">
                <div class="prog-dot"><span class="material-icons-round">directions_car</span></div>
                <div class="prog-info"><strong>Artist En Route</strong><p>Estimated arrival in 10 minutes</p></div>
            </div>
            <div class="prog-step">
                <div class="prog-dot"><span class="material-icons-round">face_retouching_natural</span></div>
                <div class="prog-info"><strong>Service In Progress</strong><p>Makeup session begins</p></div>
            </div>
        </div>
    </div>

    <div class="mf">
        <div class="info-row">
            <span class="material-icons-round">info</span>
            <p>Payment confirmed. Late arrival beyond 30 min may be auto-cancelled.</p>
        </div>
        <a href="{{ route('booking.done') }}" class="btn btn-primary">
            Mark as Done <span class="material-icons-round" style="font-size:18px">arrow_forward</span>
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
let secs = 600;
const el = document.getElementById('track-timer');
function fmt(s){ const m=Math.floor(s/60), sec=s%60; return '00 : '+String(m).padStart(2,'0')+' : '+String(sec).padStart(2,'0'); }
el.textContent = fmt(secs);
const t = setInterval(()=>{ if(secs<=0){clearInterval(t);el.textContent='00 : 00 : 00';return;} secs--; el.textContent=fmt(secs); },1000);
</script>
@endpush