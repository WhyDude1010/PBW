@extends('layouts.mobile')
@section('title', 'Select Date & Time — Beautique')
@section('flow_step', 'Step 2 · Schedule')

@section('content')
<style>
.mobile-card { width:100%; max-width:480px; min-height:calc(100vh - 80px); border-radius:var(--radius-xl); box-shadow:0 24px 80px rgba(0,0,0,.1); background:var(--white); display:flex; flex-direction:column; overflow:hidden; }
.mh { padding:22px 24px 0; flex-shrink:0; }
.mh-top { display:flex; align-items:center; gap:12px; margin-bottom:20px; }
.mh-top a { width:34px; height:34px; border-radius:50%; background:var(--cream); display:flex; align-items:center; justify-content:center; color:var(--dark); transition:var(--transition); flex-shrink:0; }
.mh-top a:hover { background:var(--rose-light); color:var(--rose-dark); }
.mh-top h1 { flex:1; text-align:center; font-size:16px; font-weight:700; color:var(--dark); }
.mh-top .spacer { width:34px; flex-shrink:0; }
.flow-stepper { display:flex; align-items:center; justify-content:center; gap:0; padding:0 16px; margin-bottom:24px; }
.fs-dot { width:26px; height:26px; border-radius:50%; background:var(--border); display:flex; align-items:center; justify-content:center; flex-shrink:0; border:2px solid var(--white); box-shadow:var(--shadow-sm); }
.fs-dot.done { background:var(--rose); }
.fs-dot.active { background:var(--rose); box-shadow:0 0 0 4px rgba(198,147,126,.2); }
.fs-dot svg { width:11px; height:11px; display:none; }
.fs-dot.done svg { display:block; }
.fs-line { flex:1; height:2px; background:var(--border); }
.fs-line.done { background:var(--rose); }
.fs-wrap { display:flex; flex-direction:column; align-items:center; gap:5px; }
.fs-label { font-size:9.5px; font-weight:600; color:var(--muted); }
.fs-wrap.done .fs-label, .fs-wrap.active .fs-label { color:var(--rose-dark); }
/* Steps content */
.step-body { flex:1; overflow-y:auto; padding:0 24px 24px; }
.step-section { display:none; }
.step-section.visible { display:block; }
/* Calendar */
.cal-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:14px; }
.cal-header span { font-size:14px; font-weight:700; color:var(--dark); }
.cal-nav { width:30px; height:30px; border-radius:50%; border:1.5px solid var(--border); display:flex; align-items:center; justify-content:center; cursor:pointer; color:var(--muted); transition:var(--transition); }
.cal-nav:hover { border-color:var(--rose); color:var(--rose); }
.cal-grid { display:grid; grid-template-columns:repeat(7,1fr); gap:4px; text-align:center; }
.cal-day-name { font-size:10px; font-weight:700; color:var(--muted); padding:4px 0; }
.cal-day { font-size:12px; font-weight:500; color:var(--dark); padding:8px 4px; border-radius:8px; cursor:pointer; transition:var(--transition); }
.cal-day:hover { background:var(--rose-light); color:var(--rose-dark); }
.cal-day.selected { background:var(--rose); color:#fff; }
.cal-day.disabled { color:var(--border); cursor:default; }
.cal-day.today { border:1.5px solid var(--rose); }
/* Time slots */
.slot-label { font-size:12px; font-weight:700; color:var(--muted); text-transform:uppercase; letter-spacing:1px; margin:18px 0 10px; }
.slot-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:8px; }
.slot { padding:10px 6px; border:1.5px solid var(--border); border-radius:10px; text-align:center; font-size:12px; font-weight:600; color:var(--muted); cursor:pointer; transition:var(--transition); }
.slot:hover { border-color:var(--rose); color:var(--rose); }
.slot.selected { background:var(--rose); border-color:var(--rose); color:#fff; }
.slot.unavailable { background:var(--cream); color:var(--border); cursor:default; text-decoration:line-through; }
/* Service type toggle */
.type-toggle { display:grid; grid-template-columns:1fr 1fr; gap:8px; margin-bottom:20px; }
.type-opt { padding:14px; border:1.5px solid var(--border); border-radius:var(--radius-md); text-align:center; cursor:pointer; transition:var(--transition); }
.type-opt:hover { border-color:var(--rose); }
.type-opt.selected { border-color:var(--rose); background:var(--rose-light); }
.type-opt .material-icons-round { font-size:22px; color:var(--muted); display:block; margin-bottom:6px; }
.type-opt.selected .material-icons-round { color:var(--rose); }
.type-opt strong { font-size:13px; font-weight:700; color:var(--dark); display:block; }
.type-opt span { font-size:11px; color:var(--muted); }
/* Detail cards */
.detail-card { background:var(--cream); border-radius:var(--radius-md); padding:20px; margin-bottom:20px; }
.detail-row { display:flex; justify-content:space-between; align-items:center; padding:8px 0; border-bottom:1px solid var(--border); font-size:13px; }
.detail-row:last-child { border-bottom:none; }
.detail-row span:first-child { color:var(--muted); }
.detail-row strong { color:var(--dark); font-weight:700; }
/* Address fields */
.addr-map { background:var(--cream-dark); border-radius:var(--radius-md); height:120px; display:flex; align-items:center; justify-content:center; margin-bottom:16px; position:relative; overflow:hidden; }
.addr-map-dot { width:14px; height:14px; border-radius:50%; background:var(--rose); box-shadow:0 0 0 5px rgba(198,147,126,.3); z-index:1; }
/* Footer */
.mf { padding:16px 24px 28px; border-top:1px solid var(--border); flex-shrink:0; }
.mf .btn { width:100%; justify-content:center; border-radius:var(--radius-sm); padding:15px; font-size:15px; }
</style>

<div class="mobile-card">
    <div class="mh">
        <div class="mh-top">
            <a href="{{ route('booking.choose-mua') }}" id="back-btn" aria-label="Back">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
            <h1 id="page-title">Select Date &amp; Time</h1>
            <div class="spacer"></div>
        </div>
        <div class="flow-stepper">
            <div class="fs-wrap done">
                <div class="fs-dot done"><svg viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg></div>
                <span class="fs-label">Booking</span>
            </div>
            <div class="fs-line done"></div>
            <div class="fs-wrap active">
                <div class="fs-dot active"><svg viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg></div>
                <span class="fs-label">Appointment</span>
            </div>
            <div class="fs-line" id="line-3"></div>
            <div class="fs-wrap" id="step3-wrap">
                <div class="fs-dot" id="dot-3"></div>
                <span class="fs-label">Service</span>
            </div>
        </div>
    </div>

    <div class="step-body">
        <!-- STEP 1: Date & Time -->
        <div class="step-section visible" id="step-1">
            <!-- Calendar -->
            <div class="cal-header">
                <button class="cal-nav" onclick="prevMonth()">‹</button>
                <span id="cal-month">May 2026</span>
                <button class="cal-nav" onclick="nextMonth()">›</button>
            </div>
            <div class="cal-grid" id="cal-grid"></div>

            <!-- Time Slots -->
            <div class="slot-label">Morning</div>
            <div class="slot-grid">
                <div class="slot" onclick="selectSlot(this)">08:00</div>
                <div class="slot" onclick="selectSlot(this)">09:00</div>
                <div class="slot unavailable">10:00</div>
                <div class="slot" onclick="selectSlot(this)">11:00</div>
            </div>
            <div class="slot-label">Afternoon</div>
            <div class="slot-grid">
                <div class="slot" onclick="selectSlot(this)">13:00</div>
                <div class="slot unavailable">14:00</div>
                <div class="slot" onclick="selectSlot(this)">15:00</div>
                <div class="slot" onclick="selectSlot(this)">16:00</div>
            </div>
            <div class="slot-label">Evening</div>
            <div class="slot-grid">
                <div class="slot" onclick="selectSlot(this)">18:00</div>
                <div class="slot" onclick="selectSlot(this)">19:00</div>
                <div class="slot unavailable">20:00</div>
            </div>

            <!-- Service Type -->
            <div class="slot-label" style="margin-top:22px">Service Type</div>
            <div class="type-toggle">
                <div class="type-opt selected" onclick="selectType(this,'home')" id="type-home">
                    <span class="material-icons-round">home</span>
                    <strong>Home Service</strong>
                    <span>Artist comes to you</span>
                </div>
                <div class="type-opt" onclick="selectType(this,'studio')" id="type-studio">
                    <span class="material-icons-round">storefront</span>
                    <strong>Studio Visit</strong>
                    <span>Visit the MUA studio</span>
                </div>
            </div>
        </div>

        <!-- STEP 2A: Home Service Address -->
        <div class="step-section" id="step-2-home">
            <div class="addr-map">
                <div class="addr-map-dot"></div>
            </div>
            <div class="form-group">
                <label class="form-label">Street Address</label>
                <div class="input-icon-wrap">
                    <span class="icon material-icons-round">location_on</span>
                    <input type="text" class="form-control" placeholder="Jl. Raya Kuta No. 25">
                </div>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
                <div class="form-group">
                    <label class="form-label">District / Gang</label>
                    <input type="text" class="form-control" placeholder="Kuta">
                </div>
                <div class="form-group">
                    <label class="form-label">City</label>
                    <input type="text" class="form-control" placeholder="Badung">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Notes for Artist</label>
                <textarea class="form-control" rows="3" placeholder="e.g. oily skin, prefer natural look…" style="resize:none"></textarea>
            </div>
        </div>

        <!-- STEP 2B: Studio Service -->
        <div class="step-section" id="step-2-studio">
            <div style="overflow:hidden;border-radius:var(--radius-md);margin-bottom:16px;">
                <img src="{{ asset('image/about-mua.jpeg') }}" alt="Studio" style="width:100%;height:160px;object-fit:cover;">
            </div>
            <h4 style="font-size:15px;font-weight:700;color:var(--dark);margin-bottom:4px;">Sarah Wijaya Studio</h4>
            <p style="font-size:12.5px;color:var(--muted);margin-bottom:4px;display:flex;align-items:center;gap:4px;"><span class="material-icons-round" style="font-size:14px;color:var(--rose)">location_on</span> Jl. Raya Seminyak 88, Bali</p>
            <p style="font-size:12.5px;color:var(--muted);margin-bottom:16px;">⭐ 4.9 · Studio visit available</p>
            <div class="detail-card">
                <div class="detail-row"><span>Your Slot</span><strong id="selected-slot-display">Not selected</strong></div>
                <div class="detail-row"><span>Duration</span><strong>~ 2 hours</strong></div>
                <div class="detail-row"><span>Type</span><strong>Studio Visit</strong></div>
            </div>
        </div>

        <!-- STEP 3: Order Configuration -->
        <div class="step-section" id="step-3">
            <div class="slot-label" style="margin-top:0">Your Order Details</div>
            <div class="form-group">
                <label class="form-label">Package</label>
                <select class="form-control">
                    <option>Basic Beauty (Rp 500.000)</option>
                    <option>Creative Glam (Rp 2.500.000)</option>
                    <option>Signature Bridal (Rp 7.000.000)</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Makeup Style</label>
                <select class="form-control">
                    <option>Natural</option>
                    <option>Korean Dewy</option>
                    <option>Soft Glam</option>
                    <option>Full Glam</option>
                    <option>Bold / Latina</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Add-on Services</label>
                <div style="display:flex;flex-direction:column;gap:10px;padding:4px 0;">
                    <label class="form-check"><input type="checkbox" checked> Lash Application <span style="color:var(--rose);font-size:12px;margin-left:auto">+Rp 50k</span></label>
                    <label class="form-check"><input type="checkbox"> Hair Styling <span style="color:var(--rose);font-size:12px;margin-left:auto">+Rp 150k</span></label>
                    <label class="form-check"><input type="checkbox"> Touch-up Kit <span style="color:var(--rose);font-size:12px;margin-left:auto">+Rp 100k</span></label>
                </div>
            </div>
            <div class="detail-card">
                <div class="detail-row"><span>Package</span><strong>Basic Beauty</strong></div>
                <div class="detail-row"><span>Add-ons</span><strong>Lash Application</strong></div>
                <div class="detail-row"><span>Service Fee</span><strong>Rp 500.000</strong></div>
                <div class="detail-row"><span>Home Service Fee</span><strong>Rp 50.000</strong></div>
                <div class="detail-row" style="border-top:2px solid var(--border);margin-top:4px;padding-top:12px"><span style="font-weight:700;color:var(--dark)">Total</span><strong style="color:var(--rose);font-size:15px">Rp 550.000</strong></div>
            </div>
        </div>
    </div>

    <div class="mf">
        <button id="main-btn" class="btn btn-primary" onclick="nextStep()">
            Check Availability <span class="material-icons-round" style="font-size:18px">arrow_forward</span>
        </button>
    </div>
</div>

<!-- Availability Modal -->
<div id="avail-modal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.55);z-index:999;display:flex;align-items:center;justify-content:center;padding:24px;" hidden>
    <div style="background:var(--white);border-radius:var(--radius-xl);padding:32px;max-width:340px;width:100%;text-align:center;">
        <div style="width:60px;height:60px;border-radius:50%;border:2px solid var(--border);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
            <span class="material-icons-round" style="font-size:28px;color:var(--muted)">schedule</span>
        </div>
        <h3 style="font-size:17px;font-weight:700;color:var(--dark);margin-bottom:8px;">Schedule Taken</h3>
        <p style="font-size:13px;color:var(--muted);margin-bottom:24px;line-height:1.6;">That time slot is already booked. Please select another time or choose from available artists.</p>
        <button onclick="closeModal()" style="width:100%;background:var(--rose);color:#fff;padding:14px;border-radius:10px;font-weight:700;font-size:14px;border:none;cursor:pointer;margin-bottom:10px;">Select Another Time</button>
        <button onclick="bookAnyway()" style="width:100%;border:1.5px solid var(--border);color:var(--muted);padding:13px;border-radius:10px;font-weight:600;font-size:13px;cursor:pointer;background:none;">Continue with Any Available Artist</button>
    </div>
</div>
@endsection

@push('scripts')
<script>
let currentStep = 1, serviceType = 'home', selectedDay = null, selectedSlotEl = null;
const monthNames = ['January','February','March','April','May','June','July','August','September','October','November','December'];
let viewDate = new Date(2026, 4, 1);

function renderCal() {
    const grid = document.getElementById('cal-grid');
    const y = viewDate.getFullYear(), m = viewDate.getMonth();
    document.getElementById('cal-month').textContent = monthNames[m] + ' ' + y;
    grid.innerHTML = '';
    ['Mo','Tu','We','Th','Fr','Sa','Su'].forEach(d => {
        const el = document.createElement('div');
        el.className = 'cal-day-name'; el.textContent = d; grid.appendChild(el);
    });
    const firstDay = (new Date(y, m, 1).getDay() + 6) % 7;
    for(let i=0;i<firstDay;i++){ const e=document.createElement('div'); grid.appendChild(e); }
    const days = new Date(y, m+1, 0).getDate();
    const today = new Date();
    for(let d=1;d<=days;d++) {
        const el = document.createElement('div');
        el.className = 'cal-day';
        el.textContent = d;
        const date = new Date(y,m,d);
        if(date < new Date(today.getFullYear(),today.getMonth(),today.getDate())) el.classList.add('disabled');
        else { el.onclick = ()=>selectDay(el,d); }
        if(d===today.getDate()&&m===today.getMonth()&&y===today.getFullYear()) el.classList.add('today');
        if(d===selectedDay) el.classList.add('selected');
        grid.appendChild(el);
    }
}
function prevMonth(){ viewDate.setMonth(viewDate.getMonth()-1); renderCal(); }
function nextMonth(){ viewDate.setMonth(viewDate.getMonth()+1); renderCal(); }
function selectDay(el,d){ document.querySelectorAll('.cal-day.selected').forEach(e=>e.classList.remove('selected')); el.classList.add('selected'); selectedDay=d; }
function selectSlot(el){ if(el.classList.contains('unavailable'))return; document.querySelectorAll('.slot.selected').forEach(e=>e.classList.remove('selected')); el.classList.add('selected'); selectedSlotEl=el; document.getElementById('selected-slot-display').textContent=el.textContent; }
function selectType(el, type) {
    document.querySelectorAll('.type-opt').forEach(e=>e.classList.remove('selected'));
    el.classList.add('selected'); serviceType = type;
}
function nextStep() {
    if(currentStep===1) {
        if(!selectedDay){ alert('Please select a date.'); return; }
        if(!selectedSlotEl){ document.getElementById('avail-modal').removeAttribute('hidden'); return; }
        showStep(2);
    } else if(currentStep===2) {
        showStep(3);
    } else if(currentStep===3) {
        window.location.href = '{{ route("booking.summary") }}';
    }
}
function showStep(step) {
    currentStep=step;
    document.querySelectorAll('.step-section').forEach(s=>s.classList.remove('visible'));
    const btn = document.getElementById('main-btn');
    const title = document.getElementById('page-title');
    if(step===2) {
        document.getElementById(`step-2-${serviceType}`).classList.add('visible');
        title.textContent = serviceType==='home' ? 'Your Location' : 'Studio Details';
        btn.innerHTML = 'Continue <span class="material-icons-round" style="font-size:18px">arrow_forward</span>';
    } else if(step===3) {
        document.getElementById('step-3').classList.add('visible');
        title.textContent = 'Order Configuration';
        document.getElementById('line-3').classList.add('done');
        document.getElementById('dot-3').classList.add('done');
        document.getElementById('dot-3').innerHTML = '<svg viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5"><path d="M2 6l3 3 5-5"/></svg>';
        document.getElementById('step3-wrap').classList.add('done');
        btn.innerHTML = 'Confirm Booking <span class="material-icons-round" style="font-size:18px">arrow_forward</span>';
    }
}
function closeModal(){ document.getElementById('avail-modal').setAttribute('hidden',''); }
function bookAnyway(){ closeModal(); showStep(2); }
renderCal();
</script>
@endpush