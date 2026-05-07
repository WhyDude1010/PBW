@extends('layouts.mobile')
@section('title', 'Choose MUA — Beautique')
@section('flow_step', 'Step 1 of 10 · Select Artist')

@section('content')
<style>
.mobile-card { width:100%; max-width:480px; min-height:calc(100vh - 80px); border-radius:var(--radius-xl); box-shadow:0 24px 80px rgba(0,0,0,.1); background:var(--white); overflow:hidden; display:flex; flex-direction:column; }
.mh { padding:22px 24px 0; flex-shrink:0; }
.mh-title { font-size:17px; font-weight:700; color:var(--dark); text-align:center; margin-bottom:20px; }
/* Stepper */
.flow-stepper { display:flex; align-items:center; justify-content:center; gap:0; padding:0 16px; margin-bottom:20px; }
.fs-dot { width:26px; height:26px; border-radius:50%; background:var(--border); display:flex; align-items:center; justify-content:center; flex-shrink:0; transition:var(--transition); border:2px solid var(--white); box-shadow:var(--shadow-sm); }
.fs-dot.done { background:var(--rose); }
.fs-dot.done svg { display:block; }
.fs-dot svg { width:11px; height:11px; display:none; }
.fs-line { flex:1; height:2px; background:var(--border); }
.fs-line.done { background:var(--rose); }
.fs-wrap { display:flex; flex-direction:column; align-items:center; gap:5px; }
.fs-label { font-size:9.5px; font-weight:600; color:var(--muted); letter-spacing:.3px; }
.fs-wrap.done .fs-label { color:var(--rose-dark); }
/* Filter bar */
.filter-row { display:flex; gap:8px; padding:0 24px 16px; overflow-x:auto; -webkit-overflow-scrolling:touch; flex-shrink:0; }
.filter-row::-webkit-scrollbar { display:none; }
.filter-chip { display:flex; align-items:center; gap:6px; padding:8px 16px; border-radius:var(--radius-pill); border:1.5px solid var(--border); font-size:12px; font-weight:600; color:var(--muted); white-space:nowrap; cursor:pointer; transition:var(--transition); background:var(--white); }
.filter-chip.active, .filter-chip:hover { border-color:var(--rose); color:var(--rose); background:var(--rose-light); }
.filter-chip .material-icons-round { font-size:14px; }
/* MUA list */
.mua-list { flex:1; overflow-y:auto; padding:0 24px 16px; display:flex; flex-direction:column; gap:16px; }
.mua-card { border-radius:var(--radius-md); border:1.5px solid var(--border); overflow:hidden; transition:var(--transition); display:flex; flex-direction:column; }
.mua-card:hover { border-color:var(--rose); box-shadow:var(--shadow-md); transform:translateY(-2px); }
.mua-img { height:160px; overflow:hidden; position:relative; }
.mua-img img { width:100%; height:100%; object-fit:cover; transition:transform .5s; }
.mua-card:hover .mua-img img { transform:scale(1.06); }
.mua-rating { position:absolute; top:10px; right:10px; background:rgba(255,255,255,.92); backdrop-filter:blur(6px); padding:4px 10px; border-radius:var(--radius-pill); font-size:11.5px; font-weight:700; color:var(--dark); display:flex; align-items:center; gap:4px; }
.mua-rating span { color:#F59E0B; font-size:13px; }
.mua-info { padding:14px 16px 16px; }
.mua-name { font-weight:700; font-size:15px; color:var(--dark); margin-bottom:4px; }
.mua-meta { font-size:12px; color:var(--muted); margin-bottom:10px; display:flex; align-items:center; gap:6px; }
.mua-meta .material-icons-round { font-size:13px; color:var(--rose); }
.style-tags { display:flex; flex-wrap:wrap; gap:5px; margin-bottom:14px; }
.style-tag { padding:3px 10px; border-radius:var(--radius-pill); background:var(--rose-light); color:var(--rose-dark); font-size:10.5px; font-weight:600; }
.mua-price { font-size:12px; color:var(--muted); margin-bottom:12px; }
.mua-price strong { color:var(--rose); font-size:13.5px; }
.select-btn { display:block; text-align:center; background:var(--rose); color:#fff; padding:11px; border-radius:10px; font-weight:700; font-size:13px; transition:var(--transition); }
.select-btn:hover { background:var(--rose-dark); }
</style>

<div class="mobile-card">
    <div class="mh">
        <div class="mh-title">Choose Your MUA</div>
        <!-- Stepper -->
        <div class="flow-stepper">
            <div class="fs-wrap done">
                <div class="fs-dot done"><svg viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg></div>
                <span class="fs-label">Booking</span>
            </div>
            <div class="fs-line"></div>
            <div class="fs-wrap">
                <div class="fs-dot"></div>
                <span class="fs-label">Appointment</span>
            </div>
            <div class="fs-line"></div>
            <div class="fs-wrap">
                <div class="fs-dot"></div>
                <span class="fs-label">Service</span>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="filter-row">
        <button class="filter-chip active"><span class="material-icons-round">tune</span> All</button>
        <button class="filter-chip">Bridal</button>
        <button class="filter-chip">Party</button>
        <button class="filter-chip">Editorial</button>
        <button class="filter-chip"><span class="material-icons-round">location_on</span> Bali</button>
        <button class="filter-chip"><span class="material-icons-round">location_on</span> Jakarta</button>
    </div>

    <!-- MUA Cards -->
    <div class="mua-list">
        <div class="mua-card">
            <div class="mua-img">
                <img src="{{ asset('image/model-mua.jpeg') }}" alt="Sarah Wijaya">
                <div class="mua-rating"><span>★</span> 4.9</div>
            </div>
            <div class="mua-info">
                <div class="mua-name">Sarah Wijaya</div>
                <div class="mua-meta"><span class="material-icons-round">location_on</span> Bali · 3 bookings this week</div>
                <div class="style-tags">
                    <span class="style-tag">Bridal</span>
                    <span class="style-tag">Natural</span>
                    <span class="style-tag">Korean Dewy</span>
                </div>
                <div class="mua-price">Starting from <strong>Rp 1.500.000</strong></div>
                <a href="{{ route('booking.select-date') }}" class="select-btn">Select Artist →</a>
            </div>
        </div>
        <div class="mua-card">
            <div class="mua-img">
                <img src="{{ asset('image/about-mua.jpeg') }}" alt="Mia Rahardjo">
                <div class="mua-rating"><span>★</span> 4.8</div>
            </div>
            <div class="mua-info">
                <div class="mua-name">Mia Rahardjo</div>
                <div class="mua-meta"><span class="material-icons-round">location_on</span> Jakarta · Available today</div>
                <div class="style-tags">
                    <span class="style-tag">Glam</span>
                    <span class="style-tag">Soft Glam</span>
                    <span class="style-tag">Editorial</span>
                </div>
                <div class="mua-price">Starting from <strong>Rp 2.000.000</strong></div>
                <a href="{{ route('booking.select-date') }}" class="select-btn">Select Artist →</a>
            </div>
        </div>
        <div class="mua-card">
            <div class="mua-img">
                <img src="{{ asset('image/makeup1.jpeg') }}" alt="Dera Sanjaya">
                <div class="mua-rating"><span>★</span> 5.0</div>
            </div>
            <div class="mua-info">
                <div class="mua-name">Dera Sanjaya</div>
                <div class="mua-meta"><span class="material-icons-round">location_on</span> Surabaya · Top Rated</div>
                <div class="style-tags">
                    <span class="style-tag">Bold</span>
                    <span class="style-tag">Latina</span>
                    <span class="style-tag">Party</span>
                </div>
                <div class="mua-price">Starting from <strong>Rp 900.000</strong></div>
                <a href="{{ route('booking.select-date') }}" class="select-btn">Select Artist →</a>
            </div>
        </div>
    </div>
</div>
@endsection