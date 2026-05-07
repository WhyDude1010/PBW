@extends('layouts.mobile')
@section('title','Service Done — Beautique')
@section('flow_step','Step 7 · Payment')

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
.mb{flex:1;overflow-y:auto;padding:0 24px 16px;text-align:center;}
.done-icon{width:76px;height:76px;border-radius:50%;background:linear-gradient(135deg,var(--rose) 0%,var(--rose-dark) 100%);display:flex;align-items:center;justify-content:center;margin:0 auto 18px;box-shadow:0 8px 24px rgba(198,147,126,.4);animation:checkPop .6s cubic-bezier(.25,.8,.25,1) both;}
.done-icon .material-icons-round{font-size:36px;color:#fff;}
.mb h3{font-size:20px;font-weight:700;color:var(--dark);margin-bottom:8px;}
.mb > p{font-size:13.5px;color:var(--muted);margin-bottom:24px;line-height:1.7;}
/* Payment card */
.pay-card{background:linear-gradient(135deg,var(--cream) 0%,var(--cream-dark) 100%);border-radius:var(--radius-lg);padding:22px;text-align:left;margin-bottom:20px;border:1px solid var(--border);}
.pay-card h4{font-size:14px;font-weight:700;color:var(--dark);margin-bottom:16px;}
.pay-opt{display:flex;align-items:center;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--border);cursor:pointer;}
.pay-opt:last-child{border-bottom:none;}
.pay-opt-left{display:flex;align-items:center;gap:12px;}
.pay-icon{width:36px;height:36px;border-radius:8px;background:var(--white);display:flex;align-items:center;justify-content:center;box-shadow:var(--shadow-sm);}
.pay-icon .material-icons-round{font-size:18px;color:var(--rose);}
.pay-opt strong{font-size:13.5px;font-weight:600;color:var(--dark);display:block;}
.pay-opt small{font-size:11px;color:var(--muted);}
.pay-radio{width:20px;height:20px;border-radius:50%;border:2px solid var(--border);display:flex;align-items:center;justify-content:center;transition:var(--transition);}
.pay-opt.selected .pay-radio{border-color:var(--rose);background:var(--rose);}
.pay-opt.selected .pay-radio::after{content:'';width:8px;height:8px;border-radius:50%;background:#fff;}
.total-row{display:flex;justify-content:space-between;align-items:center;background:var(--cream);border-radius:var(--radius-md);padding:14px 18px;margin-bottom:16px;}
.total-row span{font-size:14px;font-weight:700;color:var(--dark);}
.total-row strong{font-size:16px;font-weight:700;color:var(--rose);}
.mf{padding:16px 24px 28px;border-top:1px solid var(--border);flex-shrink:0;}
.mf .info-row{display:flex;align-items:center;gap:8px;margin-bottom:14px;}
.mf .info-row .material-icons-round{font-size:16px;color:var(--muted);}
.mf .info-row p{font-size:12px;color:var(--muted);}
.mf .btn{width:100%;justify-content:center;border-radius:var(--radius-sm);padding:15px;font-size:15px;}
</style>

<div class="mobile-card">
    <div class="mh">
        <div class="mh-top">
            <a href="{{ route('booking.tracking') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
            <h1>Service Done</h1>
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
        <div class="done-icon"><span class="material-icons-round">face_retouching_natural</span></div>
        <h3>Service is Done!</h3>
        <p>Your makeup artist has completed the session. Please complete your final payment to wrap everything up.</p>

        <div class="pay-card">
            <h4>Complete payment within 24 hours</h4>
            <div class="pay-opt selected" onclick="selectPay(this)">
                <div class="pay-opt-left">
                    <div class="pay-icon"><span class="material-icons-round">account_balance</span></div>
                    <div><strong>Bank Transfer</strong><small>BCA, Mandiri, BNI, BRI</small></div>
                </div>
                <div class="pay-radio"></div>
            </div>
            <div class="pay-opt" onclick="selectPay(this)">
                <div class="pay-opt-left">
                    <div class="pay-icon"><span class="material-icons-round">credit_card</span></div>
                    <div><strong>Credit / Debit Card</strong><small>Visa, Mastercard</small></div>
                </div>
                <div class="pay-radio"></div>
            </div>
            <div class="pay-opt" onclick="selectPay(this)">
                <div class="pay-opt-left">
                    <div class="pay-icon"><span class="material-icons-round">account_balance_wallet</span></div>
                    <div><strong>E-Wallet</strong><small>GoPay, OVO, Dana</small></div>
                </div>
                <div class="pay-radio"></div>
            </div>
        </div>

        <div class="total-row">
            <span>Remaining Balance</span>
            <strong>Rp 275.000</strong>
        </div>
    </div>

    <div class="mf">
        <div class="info-row">
            <span class="material-icons-round">schedule</span>
            <p>Awaiting your final payment to close this booking.</p>
        </div>
        <a href="{{ route('booking.payment') }}" class="btn btn-primary">
            Pay Now <span class="material-icons-round" style="font-size:18px">arrow_forward</span>
        </a>
    </div>
</div>
@endsection
@push('scripts')
<script>
function selectPay(el){document.querySelectorAll('.pay-opt').forEach(e=>e.classList.remove('selected'));el.classList.add('selected');}
</script>
@endpush