@extends('layouts.mobile')
@section('title','Payment Complete — Beautique')
@section('flow_step','Step 8 · Paid')

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
.mb{flex:1;overflow-y:auto;padding:0 24px 16px;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;}
/* Success */
.success-ring{width:90px;height:90px;border-radius:50%;background:var(--success-light);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;animation:checkPop .7s cubic-bezier(.25,.8,.25,1) both;}
.check-circle{width:68px;height:68px;border-radius:50%;background:var(--success);display:flex;align-items:center;justify-content:center;}
.check-circle .material-icons-round{font-size:34px;color:#fff;}
.mb h3{font-size:22px;font-weight:700;color:var(--dark);margin-bottom:10px;}
.success-card{background:var(--success-light);border-radius:var(--radius-lg);padding:28px 24px;margin:20px 0;width:100%;text-align:center;}
.success-card .material-icons-round{font-size:40px;color:var(--success);margin-bottom:12px;}
.success-card h4{font-size:18px;font-weight:700;color:var(--dark);margin-bottom:12px;}
.success-card hr{border:none;border-top:1px solid rgba(46,204,113,.2);margin-bottom:12px;}
.success-card p{font-size:13.5px;color:#555;line-height:1.7;}
.receipt-rows{width:100%;text-align:left;margin-top:20px;}
.receipt-row{display:flex;justify-content:space-between;font-size:13px;padding:9px 0;border-bottom:1px solid var(--border);}
.receipt-row:last-child{border-bottom:none;font-weight:700;padding-top:12px;}
.receipt-row span:first-child{color:var(--muted);}
.receipt-row strong{color:var(--dark);}
.mf{padding:16px 24px 28px;border-top:1px solid var(--border);flex-shrink:0;}
.mf .btn{width:100%;justify-content:center;border-radius:var(--radius-sm);padding:15px;font-size:15px;}
</style>

<div class="mobile-card">
    <div class="mh">
        <div class="mh-top">
            <a href="{{ route('booking.done') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
            <h1>Paid Complete</h1>
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
        <div class="success-ring">
            <div class="check-circle"><span class="material-icons-round">check</span></div>
        </div>
        <h3>Payment Successful!</h3>
        <p style="font-size:13.5px;color:var(--muted);margin-bottom:8px;">Your session has been fully paid. We hope you love your look!</p>

        <div class="success-card">
            <span class="material-icons-round">receipt_long</span>
            <h4>All Set ✓</h4>
            <hr>
            <p>Your booking is now complete. Your artist has been paid and the booking is closed.</p>
        </div>

        <div class="receipt-rows">
            <div class="receipt-row"><span>Artist</span><strong>Sarah Wijaya</strong></div>
            <div class="receipt-row"><span>Date</span><strong>10 May 2026</strong></div>
            <div class="receipt-row"><span>Package</span><strong>Basic Beauty</strong></div>
            <div class="receipt-row"><span>DP Paid</span><strong>Rp 275.000</strong></div>
            <div class="receipt-row"><span>Final Payment</span><strong>Rp 275.000</strong></div>
            <div class="receipt-row"><span>Total Paid</span><strong style="color:var(--rose)">Rp 550.000</strong></div>
        </div>
    </div>

    <div class="mf">
        <a href="{{ route('booking.review') }}" class="btn btn-primary">
            Leave a Review <span class="material-icons-round" style="font-size:18px">star</span>
        </a>
    </div>
</div>
@endsection