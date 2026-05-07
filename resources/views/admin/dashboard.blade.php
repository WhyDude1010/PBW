@extends('layouts.admin')
@section('title','Dashboard')
@section('page_title','Dashboard')
@section('page_meta','Welcome back, Admin · {{ date("l, d M Y") }}')

@section('content')
<style>
.chart-bar-wrap{display:flex;align-items:flex-end;gap:6px;height:80px;}
.chart-bar{flex:1;border-radius:4px 4px 0 0;background:var(--rose-light);transition:height .4s ease;position:relative;cursor:pointer;}
.chart-bar:hover{background:var(--rose);}
.chart-bar span{position:absolute;bottom:-20px;left:50%;transform:translateX(-50%);font-size:9px;color:var(--muted);white-space:nowrap;}
.recent-table-wrap{margin-top:0;}
.mua-pill{display:flex;align-items:center;gap:8px;}
.mua-pill img{width:28px;height:28px;border-radius:50%;object-fit:cover;}
.mua-pill span{font-size:13px;font-weight:600;color:var(--dark);}
</style>

<!-- Stat Cards -->
<div class="stat-grid">
    <div class="stat-card reveal delay-1">
        <div class="stat-icon"><span class="material-icons-round">event_available</span></div>
        <div>
            <div class="stat-value">24</div>
            <div class="stat-label">Bookings Today</div>
            <div class="stat-delta">↑ 12% vs yesterday</div>
        </div>
    </div>
    <div class="stat-card reveal delay-2">
        <div class="stat-icon"><span class="material-icons-round">payments</span></div>
        <div>
            <div class="stat-value">Rp 18M</div>
            <div class="stat-label">Revenue This Week</div>
            <div class="stat-delta">↑ 8% vs last week</div>
        </div>
    </div>
    <div class="stat-card reveal delay-3">
        <div class="stat-icon"><span class="material-icons-round">face_retouching_natural</span></div>
        <div>
            <div class="stat-value">52</div>
            <div class="stat-label">Active MUAs</div>
            <div class="stat-delta">↑ 3 new this month</div>
        </div>
    </div>
    <div class="stat-card reveal delay-4">
        <div class="stat-icon"><span class="material-icons-round">star_rate</span></div>
        <div>
            <div class="stat-value">4.9</div>
            <div class="stat-label">Avg Rating</div>
            <div class="stat-delta">Based on 1,240 reviews</div>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-bottom:24px;">
    <!-- Weekly Bookings Chart -->
    <div class="page-card">
        <div class="page-card-header">
            <h4>Weekly Bookings</h4>
            <span class="badge badge-rose">This Week</span>
        </div>
        <div style="padding:24px;">
            <div class="chart-bar-wrap">
                <div class="chart-bar" style="height:40%"><span>Mon</span></div>
                <div class="chart-bar" style="height:65%"><span>Tue</span></div>
                <div class="chart-bar" style="height:50%"><span>Wed</span></div>
                <div class="chart-bar" style="height:90%;background:var(--rose)"><span>Thu</span></div>
                <div class="chart-bar" style="height:75%"><span>Fri</span></div>
                <div class="chart-bar" style="height:85%"><span>Sat</span></div>
                <div class="chart-bar" style="height:60%"><span>Sun</span></div>
            </div>
        </div>
    </div>

    <!-- Top MUAs -->
    <div class="page-card">
        <div class="page-card-header">
            <h4>Top MUAs This Week</h4>
            <a href="{{ route('admin.muas.index') }}" style="font-size:12px;color:var(--rose);font-weight:600;">View all</a>
        </div>
        <div style="padding:16px 24px;">
            @foreach([['Sarah Wijaya','Bali','12'],['Mia Rahardjo','Jakarta','9'],['Dera Sanjaya','Surabaya','7']] as $mua)
            <div style="display:flex;align-items:center;justify-content:space-between;padding:10px 0;border-bottom:1px solid var(--border);">
                <div class="mua-pill">
                    <img src="{{ asset('image/model-mua.jpeg') }}" alt="{{ $mua[0] }}">
                    <div>
                        <span>{{ $mua[0] }}</span>
                        <div style="font-size:11px;color:var(--muted)">{{ $mua[1] }}</div>
                    </div>
                </div>
                <span class="badge badge-rose">{{ $mua[2] }} bookings</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Recent Bookings -->
<div class="page-card recent-table-wrap">
    <div class="page-card-header">
        <h4>Recent Bookings</h4>
        <a href="{{ route('admin.bookings.index') }}" style="font-size:12px;color:var(--rose);font-weight:600;">View all →</a>
    </div>
    <div class="table-wrap" style="border:none;border-radius:0;">
        <table>
            <thead>
                <tr>
                    <th>Client</th>
                    <th>MUA</th>
                    <th>Date</th>
                    <th>Package</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach([
                    ['Rina Maharani','Sarah Wijaya','10 May 2026','Basic Beauty','Rp 550k','confirmed'],
                    ['Delia Santoso','Mia Rahardjo','11 May 2026','Creative Glam','Rp 3.2M','pending'],
                    ['Citra Dewi','Dera Sanjaya','12 May 2026','Editorial','Rp 2.1M','confirmed'],
                    ['Ayu Pratiwi','Sarah Wijaya','13 May 2026','Signature Bridal','Rp 12M','pending'],
                ] as $b)
                <tr>
                    <td style="font-weight:600;color:var(--dark)">{{ $b[0] }}</td>
                    <td>{{ $b[1] }}</td>
                    <td>{{ $b[2] }}</td>
                    <td>{{ $b[3] }}</td>
                    <td style="font-weight:600;color:var(--rose)">{{ $b[4] }}</td>
                    <td>
                        @if($b[5]==='confirmed')
                            <span class="badge badge-success">Confirmed</span>
                        @else
                            <span class="badge badge-warning">Pending</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
const revealEls = document.querySelectorAll('.reveal, .stat-card');
if(revealEls.length){
    const obs = new IntersectionObserver(entries=>{
        entries.forEach(e=>{if(e.isIntersecting){e.target.style.opacity='1';e.target.style.transform='translateY(0)';}});
    },{threshold:.1});
    revealEls.forEach(el=>{el.style.opacity='0';el.style.transform='translateY(16px)';el.style.transition='opacity .5s ease, transform .5s ease';obs.observe(el);});
}
</script>
@endpush
