@extends('layouts.admin')
@section('title','MUA Artists')
@section('page_title','MUA Artists')
@section('page_meta','Manage your roster of makeup artists')

@section('content')
<div class="section-header">
    <h3>All Artists <span style="font-size:13px;color:var(--muted);font-weight:400;">(52 total)</span></h3>
    <div style="display:flex;gap:10px;align-items:center;">
        <div class="search-bar">
            <span class="search-icon material-icons-round">search</span>
            <input type="text" placeholder="Search artist…" oninput="filterMua(this.value)">
        </div>
        <a href="{{ route('admin.muas.create') }}" class="btn btn-primary btn-sm">
            <span class="material-icons-round" style="font-size:16px;">add</span> Add New MUA
        </a>
    </div>
</div>

<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:20px;" id="mua-grid">
    @php
    $muas = [
        ['Sarah Wijaya','Bali','Bridal, Natural, Korean Dewy','4.9','152','model-mua.jpeg',true],
        ['Mia Rahardjo','Jakarta','Glam, Soft Glam, Editorial','4.8','98','about-mua.jpeg',true],
        ['Dera Sanjaya','Surabaya','Bold, Latina, Party','5.0','74','makeup1.jpeg',true],
        ['Nadia Kusuma','Bandung','Natural, Korean Dewy','4.7','45','model-mua.jpeg',false],
        ['Rara Amelia','Yogyakarta','Bridal, Traditional','4.8','60','about-mua.jpeg',true],
        ['Luna Santosa','Bali','Editorial, Fashion','4.9','88','makeup1.jpeg',true],
    ];
    @endphp
    @foreach($muas as $m)
    <div class="page-card mua-card-admin" data-name="{{ strtolower($m[0]) }}" style="overflow:hidden;">
        <!-- Cover -->
        <div style="position:relative;height:140px;overflow:hidden;">
            <img src="{{ asset('image/'.$m[5]) }}" alt="{{ $m[0] }}" style="width:100%;height:100%;object-fit:cover;">
            <div style="position:absolute;top:10px;right:10px;">
                <span class="badge {{ $m[6] ? 'badge-success' : 'badge-danger' }}">
                    {{ $m[6] ? 'Available' : 'Unavailable' }}
                </span>
            </div>
        </div>
        <!-- Info -->
        <div style="padding:16px;">
            <!-- Avatar overlapping -->
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:12px;">
                <img src="{{ asset('image/'.$m[5]) }}" alt="{{ $m[0] }}" style="width:46px;height:46px;border-radius:50%;object-fit:cover;border:3px solid var(--white);box-shadow:var(--shadow-sm);margin-top:-30px;flex-shrink:0;">
                <div>
                    <div style="font-weight:700;font-size:14.5px;color:var(--dark);">{{ $m[0] }}</div>
                    <div style="font-size:12px;color:var(--muted);display:flex;align-items:center;gap:4px;">
                        <span class="material-icons-round" style="font-size:12px;color:var(--rose)">location_on</span> {{ $m[1] }}
                    </div>
                </div>
            </div>
            <div style="display:flex;flex-wrap:wrap;gap:5px;margin-bottom:12px;">
                @foreach(explode(', ',$m[2]) as $tag)
                <span style="padding:2px 8px;border-radius:var(--radius-pill);background:var(--rose-light);color:var(--rose-dark);font-size:10.5px;font-weight:600;">{{ $tag }}</span>
                @endforeach
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:14px;">
                <span style="font-size:13px;color:var(--muted);">⭐ {{ $m[3] }} · {{ $m[4] }} bookings</span>
            </div>
            <div style="display:flex;gap:8px;">
                <button style="flex:1;padding:9px;border-radius:8px;background:var(--cream);border:none;font-size:12.5px;font-weight:600;color:var(--dark);cursor:pointer;">Edit</button>
                <button style="flex:1;padding:9px;border-radius:8px;background:var(--rose-light);border:none;font-size:12.5px;font-weight:600;color:var(--rose-dark);cursor:pointer;">{{ $m[6] ? 'Deactivate' : 'Activate' }}</button>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@push('scripts')
<script>
function filterMua(q){
    q = q.toLowerCase();
    document.querySelectorAll('.mua-card-admin').forEach(c=>{
        c.style.display = c.dataset.name.includes(q) ? '' : 'none';
    });
}
</script>
@endpush
