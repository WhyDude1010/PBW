@extends('layouts.admin')
@section('title','Bookings')
@section('page_title','Bookings')
@section('page_meta','Manage all client bookings')

@section('content')
<!-- Stat strip -->
<div class="stat-grid" style="grid-template-columns:repeat(4,1fr);margin-bottom:24px;">
    @foreach([['event_note','156','Total','badge-dark'],['hourglass_empty','24','Pending','badge-warning'],['check_circle','118','Confirmed','badge-success'],['cancel','14','Cancelled','badge-danger']] as $s)
    <div class="stat-card" style="padding:18px 20px;">
        <div class="stat-icon"><span class="material-icons-round">{{ $s[0] }}</span></div>
        <div><div class="stat-value" style="font-size:22px;">{{ $s[1] }}</div><div class="stat-label">{{ $s[2] }}</div></div>
    </div>
    @endforeach
</div>

<div class="page-card">
    <div class="page-card-header">
        <h4>All Bookings</h4>
        <div style="display:flex;gap:10px;align-items:center;">
            <div class="search-bar">
                <span class="search-icon material-icons-round">search</span>
                <input type="text" placeholder="Search client, MUA…" id="search-input" oninput="filterTable()">
            </div>
            <select class="form-control" style="width:160px;padding:9px 12px;font-size:13px;" id="status-filter" onchange="filterTable()">
                <option value="">All Status</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="done">Done</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
    </div>

    <div class="table-wrap" style="border:none;border-radius:0;">
        <table id="bookings-table">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>Client</th>
                    <th>MUA Artist</th>
                    <th>Date &amp; Time</th>
                    <th>Package</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                $bookings = [
                    ['BK-001','Rina Maharani','Sarah Wijaya','10 May · 09:00','Basic Beauty','Rp 550.000','confirmed'],
                    ['BK-002','Delia Santoso','Mia Rahardjo','11 May · 14:00','Creative Glam','Rp 3.200.000','pending'],
                    ['BK-003','Citra Dewi','Dera Sanjaya','12 May · 10:00','Editorial','Rp 2.100.000','confirmed'],
                    ['BK-004','Ayu Pratiwi','Sarah Wijaya','13 May · 08:00','Signature Bridal','Rp 12.000.000','pending'],
                    ['BK-005','Sari Indah','Mia Rahardjo','14 May · 11:00','Basic Beauty','Rp 500.000','done'],
                    ['BK-006','Mega Putri','Dera Sanjaya','15 May · 13:00','Party Glam','Rp 1.800.000','cancelled'],
                ];
                @endphp
                @foreach($bookings as $b)
                <tr data-status="{{ $b[6] }}">
                    <td style="font-size:12px;color:var(--muted);font-weight:600;">{{ $b[0] }}</td>
                    <td style="font-weight:600;color:var(--dark)">{{ $b[1] }}</td>
                    <td>{{ $b[2] }}</td>
                    <td style="font-size:13px;">{{ $b[3] }}</td>
                    <td>{{ $b[4] }}</td>
                    <td style="font-weight:700;color:var(--rose)">{{ $b[5] }}</td>
                    <td>
                        @php $cls=['confirmed'=>'badge-success','pending'=>'badge-warning','done'=>'badge-rose','cancelled'=>'badge-danger'][$b[6]] ?? 'badge-dark'; @endphp
                        <span class="badge {{ $cls }}">{{ ucfirst($b[6]) }}</span>
                    </td>
                    <td>
                        <div style="display:flex;gap:6px;">
                            <button class="btn btn-sm" style="padding:5px 12px;border-radius:6px;background:var(--cream);color:var(--dark);font-size:12px;" title="View">
                                <span class="material-icons-round" style="font-size:14px;">visibility</span>
                            </button>
                            <button class="btn btn-sm" style="padding:5px 12px;border-radius:6px;background:var(--rose-light);color:var(--rose-dark);font-size:12px;" title="Edit Status">
                                <span class="material-icons-round" style="font-size:14px;">edit</span>
                            </button>
                        </div>
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
function filterTable(){
    const q = document.getElementById('search-input').value.toLowerCase();
    const s = document.getElementById('status-filter').value;
    document.querySelectorAll('#bookings-table tbody tr').forEach(row=>{
        const text = row.textContent.toLowerCase();
        const status = row.dataset.status;
        row.style.display = (text.includes(q) && (!s || status===s)) ? '' : 'none';
    });
}
</script>
@endpush
