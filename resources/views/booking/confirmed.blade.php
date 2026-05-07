@extends('layouts.mobile')
@section('title','Booking Confirmed — Beautique')
@section('flow_step','Step 4 · Confirmed')

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
/* Confirmed badge */
.confirmed-badge{display:inline-flex;align-items:center;gap:6px;padding:6px 16px;border-radius:4px;background:#C1FBC1;color:#1A7A3C;font-size:11px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;margin-bottom:10px;}
.confirmed-desc{font-size:13px;color:var(--muted);line-height:1.7;margin-bottom:20px;text-align:center;}
/* Tips card */
.tips-card{background:var(--rose-light);border-radius:var(--radius-md);padding:16px 18px;margin-bottom:20px;display:flex;gap:12px;align-items:flex-start;}
.tips-card .material-icons-round{font-size:18px;color:var(--rose);flex-shrink:0;margin-top:1px;}
.tips-card h5{font-size:13.5px;font-weight:700;color:var(--dark);margin-bottom:4px;}
.tips-card p{font-size:12px;color:var(--rose-dark);line-height:1.6;}
/* Status list */
.status-list{background:var(--cream);border-radius:var(--radius-md);padding:20px;margin-bottom:20px;}
.status-row{display:flex;justify-content:space-between;align-items:center;padding:10px 0;border-bottom:1px solid var(--border);font-size:13.5px;}
.status-row:last-child{border-bottom:none;}
.status-row span:first-child{color:var(--muted);}
.status-row .badge-confirmed{background:#C1FBC1;color:#1A7A3C;padding:3px 10px;border-radius:4px;font-size:10px;font-weight:700;letter-spacing:.5px;}
.status-row .badge-paid{background:var(--success-light);color:var(--success);padding:3px 10px;border-radius:4px;font-size:10px;font-weight:700;letter-spacing:.5px;}
.mf{padding:16px 24px 28px;border-top:1px solid var(--border);flex-shrink:0;}
.mf .info-row{display:flex;align-items:center;gap:8px;margin-bottom:14px;}
.mf .info-row .material-icons-round{font-size:16px;color:var(--muted);}
.mf .info-row p{font-size:12px;color:var(--muted);}
.mf .btn{width:100%;justify-content:center;border-radius:var(--radius-sm);padding:15px;font-size:15px;}
</style>

<div class="mobile-card">
    <div class="mh">
        <div class="mh-top">
            <a href="{{ route('booking.summary') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
            <h1>Booking Summary</h1>
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
            <div class="confirmed-badge">✓ Confirmed</div>
            <p class="confirmed-desc">Your booking has been confirmed. Please arrive on time for your scheduled appointment.</p>
        </div>

        <div class="tips-card">
            <span class="material-icons-round">lightbulb</span>
            <div>
                <h5>Tips</h5>
                <p>Bookings will be automatically cancelled if payment is not completed before the deadline. Keep your artist notified of any changes.</p>
            </div>
        </div>

        <div class="status-list">
            <div class="status-row"><span>Status</span><span class="badge-confirmed">CONFIRMED</span></div>
            <div class="status-row"><span>Service Fee</span><span class="badge-paid">PAID</span></div>
            <div class="status-row"><span>Home Service Fee</span><span class="badge-confirmed">CONFIRMED</span></div>
            <div class="status-row"><span>Artist</span><strong>Sarah Wijaya</strong></div>
            <div class="status-row"><span>Date</span><strong>10 May 2026 · 09:00</strong></div>
        </div>
    </div>

    <div class="mf">
        <div class="info-row">
            <span class="material-icons-round">info</span>
            <p>Payment has been successfully processed.</p>
        </div>
        <a href="{{ route('booking.countdown') }}" class="btn btn-primary">
            View Booking Countdown <span class="material-icons-round" style="font-size:18px">arrow_forward</span>
        </a>
    </div>
</div>
@endsection