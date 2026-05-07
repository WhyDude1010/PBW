@extends('layouts.mobile')
@section('title','Booking Summary — Beautique')
@section('flow_step','Step 3 · Summary')

@section('content')
<style>
.mobile-card{width:100%;max-width:480px;min-height:calc(100vh - 80px);border-radius:var(--radius-xl);box-shadow:0 24px 80px rgba(0,0,0,.1);background:var(--white);display:flex;flex-direction:column;overflow:hidden;}
.mh{padding:22px 24px 0;flex-shrink:0;}
.mh-top{display:flex;align-items:center;gap:12px;margin-bottom:20px;}
.mh-top a{width:34px;height:34px;border-radius:50%;background:var(--cream);display:flex;align-items:center;justify-content:center;color:var(--dark);transition:var(--transition);}
.mh-top a:hover{background:var(--rose-light);color:var(--rose-dark);}
.mh-top h1{flex:1;text-align:center;font-size:16px;font-weight:700;color:var(--dark);}
.mh-top .sp{width:34px;}
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
.status-pill{display:inline-flex;align-items:center;gap:6px;padding:6px 16px;border-radius:var(--radius-pill);background:var(--warning-light);color:#9B6A00;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;margin-bottom:10px;}
.summary-desc{font-size:13px;color:var(--muted);line-height:1.7;margin-bottom:20px;}
.booking-recap{background:var(--cream);border-radius:var(--radius-md);padding:20px;margin-bottom:20px;}
.recap-mua{display:flex;align-items:center;gap:14px;margin-bottom:16px;padding-bottom:16px;border-bottom:1px solid var(--border);}
.recap-mua img{width:54px;height:54px;border-radius:50%;object-fit:cover;border:2px solid var(--rose-light);}
.recap-mua-name{font-weight:700;font-size:14px;color:var(--dark);}
.recap-mua-sub{font-size:12px;color:var(--muted);}
.recap-row{display:flex;justify-content:space-between;align-items:center;padding:7px 0;border-bottom:1px solid rgba(0,0,0,.05);font-size:13px;}
.recap-row:last-child{border-bottom:none;}
.recap-row span:first-child{color:var(--muted);}
.recap-row strong{color:var(--dark);font-weight:600;}
.pay-box{background:var(--cream);border-radius:var(--radius-md);padding:20px;margin-bottom:16px;}
.pay-box h4{font-size:14px;font-weight:700;color:var(--dark);margin-bottom:14px;}
.pay-opt{display:flex;align-items:center;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--border);cursor:pointer;}
.pay-opt:last-child{border-bottom:none;}
.pay-opt-left{display:flex;align-items:center;gap:12px;}
.pay-icon{width:36px;height:36px;border-radius:8px;background:var(--cream-dark);display:flex;align-items:center;justify-content:center;}
.pay-icon .material-icons-round{font-size:18px;color:var(--rose);}
.pay-opt strong{font-size:13.5px;font-weight:600;color:var(--dark);}
.pay-opt small{font-size:11px;color:var(--muted);}
.pay-radio{width:20px;height:20px;border-radius:50%;border:2px solid var(--border);display:flex;align-items:center;justify-content:center;transition:var(--transition);}
.pay-opt.selected .pay-radio{border-color:var(--rose);background:var(--rose);}
.pay-opt.selected .pay-radio::after{content:'';width:8px;height:8px;border-radius:50%;background:#fff;}
.info-row{display:flex;align-items:flex-start;gap:10px;padding:12px;background:var(--rose-light);border-radius:10px;margin-bottom:16px;}
.info-row .material-icons-round{font-size:16px;color:var(--rose);flex-shrink:0;margin-top:1px;}
.info-row p{font-size:12px;color:var(--rose-dark);line-height:1.6;}
.mf{padding:16px 24px 28px;border-top:1px solid var(--border);flex-shrink:0;}
.mf .btn{width:100%;justify-content:center;border-radius:var(--radius-sm);padding:15px;font-size:15px;}
</style>

<div class="mobile-card">
    <div class="mh">
        <div class="mh-top">
            <a href="{{ route('booking.select-date') }}">
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
            <div class="status-pill">⏳ Pending Payment</div>
            <p class="summary-desc">Complete your down payment within 24 hours to secure your booking. Unpaid bookings are cancelled automatically.</p>
        </div>

        <!-- Booking Recap -->
        <div class="booking-recap">
            <div class="recap-mua">
                <img src="{{ asset('image/model-mua.jpeg') }}" alt="MUA">
                <div><div class="recap-mua-name">Sarah Wijaya</div><div class="recap-mua-sub">⭐ 4.9 · Bali</div></div>
            </div>
            <div class="recap-row"><span>Date</span><strong>Saturday, 10 May 2026</strong></div>
            <div class="recap-row"><span>Time</span><strong>09:00 – 11:00</strong></div>
            <div class="recap-row"><span>Service</span><strong>Home Visit</strong></div>
            <div class="recap-row"><span>Package</span><strong>Basic Beauty</strong></div>
            <div class="recap-row"><span>Add-ons</span><strong>Lash Application</strong></div>
            <div class="recap-row"><span>Address</span><strong>Jl. Raya Kuta No. 25, Bali</strong></div>
            <div class="recap-row" style="border-top:1.5px solid var(--border);margin-top:8px;padding-top:12px"><span style="font-weight:700;color:var(--dark)">Total</span><strong style="color:var(--rose);font-size:15px">Rp 550.000</strong></div>
        </div>

        <!-- Payment Method -->
        <div class="pay-box">
            <h4>Down Payment (DP 50%)</h4>
            <div class="pay-opt selected" onclick="selectPay(this)">
                <div class="pay-opt-left">
                    <div class="pay-icon"><span class="material-icons-round">account_balance</span></div>
                    <div><strong>Bank Transfer</strong><br><small>BCA, Mandiri, BNI, BRI</small></div>
                </div>
                <div class="pay-radio"></div>
            </div>
            <div class="pay-opt" onclick="selectPay(this)">
                <div class="pay-opt-left">
                    <div class="pay-icon"><span class="material-icons-round">credit_card</span></div>
                    <div><strong>Credit / Debit Card</strong><br><small>Visa, Mastercard</small></div>
                </div>
                <div class="pay-radio"></div>
            </div>
            <div class="pay-opt" onclick="selectPay(this)">
                <div class="pay-opt-left">
                    <div class="pay-icon"><span class="material-icons-round">account_balance_wallet</span></div>
                    <div><strong>E-Wallet</strong><br><small>GoPay, OVO, Dana</small></div>
                </div>
                <div class="pay-radio"></div>
            </div>
        </div>

        <div class="info-row">
            <span class="material-icons-round">info</span>
            <p>Confirmation is automatic after payment verification. Your artist will be notified immediately.</p>
        </div>
    </div>

    <div class="mf">
        <a href="{{ route('booking.confirmed') }}" class="btn btn-primary">
            Confirm &amp; Pay <span class="material-icons-round" style="font-size:18px">arrow_forward</span>
        </a>
    </div>
</div>
@endsection
@push('scripts')
<script>
function selectPay(el){document.querySelectorAll('.pay-opt').forEach(e=>e.classList.remove('selected'));el.classList.add('selected');}
</script>
@endpush