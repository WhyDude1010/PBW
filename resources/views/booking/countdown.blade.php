@extends('layouts.mobile')
@section('title','Booking Countdown — Beautique')
@section('flow_step','Step 5 · Countdown')

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
/* Countdown */
.countdown-badge{display:inline-flex;align-items:center;gap:6px;padding:6px 16px;border-radius:4px;background:#C1FBC1;color:#1A7A3C;font-size:11px;font-weight:700;letter-spacing:1.5px;margin-bottom:16px;}
.countdown-box{background:linear-gradient(135deg,var(--cream) 0%,var(--cream-dark) 100%);border-radius:var(--radius-lg);padding:28px 20px;margin-bottom:20px;text-align:center;border:1px solid var(--border);}
.countdown-box p:first-child{font-size:13px;font-weight:500;color:var(--muted);margin-bottom:10px;}
.countdown-digits{font-family:var(--font-serif);font-size:52px;font-weight:700;color:var(--dark);letter-spacing:4px;line-height:1;}
.countdown-box p:last-child{font-size:13px;font-weight:500;color:var(--muted);margin-top:10px;}
/* Details accordion */
.detail-section{margin-bottom:16px;}
.detail-toggle{display:flex;justify-content:space-between;align-items:center;padding:14px 0;border-bottom:1px solid var(--border);cursor:pointer;}
.detail-toggle span{font-size:15px;font-weight:700;color:var(--dark);}
.detail-toggle .material-icons-round{font-size:18px;color:var(--muted);transition:transform .3s;}
.detail-toggle.open .material-icons-round{transform:rotate(180deg);}
.detail-rows{overflow:hidden;max-height:0;transition:max-height .35s ease;}
.detail-rows.open{max-height:300px;}
.detail-row{display:flex;justify-content:space-between;font-size:13px;padding:9px 0;border-bottom:1px solid rgba(0,0,0,.04);}
.detail-row:last-child{border-bottom:none;}
.detail-row span:first-child{color:var(--muted);}
.detail-row strong{color:var(--dark);}
.fee-rows{margin-top:10px;}
.fee-row{display:flex;justify-content:space-between;font-size:13.5px;font-weight:700;color:var(--dark);padding:8px 0;border-bottom:1px solid var(--border);}
.fee-row:last-child{border-bottom:none;padding-top:12px;font-size:15px;color:var(--rose);}
.mf{padding:16px 24px 28px;border-top:1px solid var(--border);flex-shrink:0;}
.mf .btn{width:100%;justify-content:center;border-radius:var(--radius-sm);padding:15px;font-size:15px;}
</style>

<div class="mobile-card">
    <div class="mh">
        <div class="mh-top">
            <a href="{{ route('booking.confirmed') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
            <h1>Confirmed Booking</h1>
            <div class="sp"></div>
        </div>
        <div class="flow-stepper">
            <div class="fs-wrap done"><div class="fs-dot done"><svg viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg></div><span class="fs-label">Booking</span></div>
            <div class="fs-line done"></div>
            <div class="fs-wrap done"><div class="fs-dot done"><svg viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg></div><span class="fs-label">Appointment</span></div>
            <div class="fs-line"></div>
            <div class="fs-wrap"><div class="fs-dot"></div><span class="fs-label">Service</span></div>
        </div>
    </div>

    <div class="mb">
        <div style="text-align:center;margin-bottom:16px;">
            <h2 style="font-size:18px;font-weight:700;color:var(--dark);margin-bottom:8px;">Booking Countdown</h2>
            <div class="countdown-badge">✓ Confirmed</div>
        </div>

        <div class="countdown-box">
            <p>Time until your appointment</p>
            <div class="countdown-digits" id="countdown">00 : 00 : 00</div>
            <p>until artist arrives</p>
        </div>

        <div class="detail-section">
            <div class="detail-toggle" onclick="toggleDetail(this)">
                <span>Booking Details</span>
                <span class="material-icons-round">expand_more</span>
            </div>
            <div class="detail-rows open">
                <div class="detail-row"><span>Booked</span><strong>Today, 7 May 2026</strong></div>
                <div class="detail-row"><span>Appointment</span><strong>10 May 2026 · 09:00</strong></div>
                <div class="detail-row"><span>Artist</span><strong>Sarah Wijaya</strong></div>
                <div class="detail-row"><span>Type</span><strong>Home Service</strong></div>
                <div class="detail-row"><span>Status Badge</span><strong style="color:#1A7A3C">CONFIRMED</strong></div>
            </div>
        </div>

        <div class="fee-rows">
            <div class="fee-row"><span>Service Fee</span><strong>Rp 500.000</strong></div>
            <div class="fee-row"><span>Home Service Fee</span><strong>Rp 50.000</strong></div>
            <div class="fee-row"><span>Total</span><strong>Rp 550.000</strong></div>
        </div>
    </div>

    <div class="mf">
        <a href="{{ route('booking.tracking') }}" class="btn btn-primary">
            Go to Live Tracking <span class="material-icons-round" style="font-size:18px">arrow_forward</span>
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
function toggleDetail(el){el.classList.toggle('open');el.nextElementSibling.classList.toggle('open');}
// Countdown to appointment date
const appt = new Date('2026-05-10T09:00:00');
function updateCd(){
    const diff = appt - Date.now();
    if(diff<=0){document.getElementById('countdown').textContent='00 : 00 : 00';return;}
    const h = Math.floor(diff/3600000);
    const m = Math.floor((diff%3600000)/60000);
    const s = Math.floor((diff%60000)/1000);
    document.getElementById('countdown').textContent =
        String(h).padStart(2,'0')+' : '+String(m).padStart(2,'0')+' : '+String(s).padStart(2,'0');
}
updateCd(); setInterval(updateCd,1000);
</script>
@endpush