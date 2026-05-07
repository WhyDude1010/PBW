@extends('layouts.admin')
@section('title','Clients')
@section('page_title','Clients')
@section('page_meta','All registered clients')

@section('content')
<div class="page-card">
    <div class="page-card-header">
        <h4>All Clients <span style="font-size:13px;color:var(--muted);font-weight:400;">({{ count($clients ?? []) }} total)</span></h4>
        <div class="search-bar">
            <span class="search-icon material-icons-round">search</span>
            <input type="text" placeholder="Search by name or email…" oninput="filterClients(this.value)">
        </div>
    </div>
    <div class="table-wrap" style="border:none;border-radius:0;">
        <table id="clients-table">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Bookings</th>
                    <th>Total Spent</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                $clients = [
                    ['Rina Maharani','rina@example.com','+62 812-3456','8','Rp 4.4M','Jan 2026'],
                    ['Delia Santoso','delia@example.com','+62 817-7890','5','Rp 16M','Feb 2026'],
                    ['Citra Dewi','citra@example.com','+62 821-1122','3','Rp 6.3M','Mar 2026'],
                    ['Ayu Pratiwi','ayu@example.com','+62 813-4455','12','Rp 48M','Nov 2025'],
                    ['Sari Indah','sari@example.com','+62 815-6677','2','Rp 1M','Apr 2026'],
                ];
                @endphp
                @foreach($clients as $c)
                <tr>
                    <td>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <div style="width:36px;height:36px;border-radius:50%;background:var(--rose-light);display:flex;align-items:center;justify-content:center;font-size:13px;font-weight:700;color:var(--rose);flex-shrink:0;">{{ substr($c[0],0,1) }}</div>
                            <div style="font-weight:700;color:var(--dark);font-size:13.5px;">{{ $c[0] }}</div>
                        </div>
                    </td>
                    <td style="font-size:13px;color:var(--muted);">{{ $c[1] }}</td>
                    <td style="font-size:13px;">{{ $c[2] }}</td>
                    <td><span class="badge badge-rose">{{ $c[3] }}</span></td>
                    <td style="font-weight:700;color:var(--rose);">{{ $c[4] }}</td>
                    <td style="font-size:12.5px;color:var(--muted);">{{ $c[5] }}</td>
                    <td>
                        <button style="padding:5px 12px;border-radius:6px;background:var(--cream);border:none;font-size:12px;font-weight:600;color:var(--dark);cursor:pointer;">
                            <span class="material-icons-round" style="font-size:14px;vertical-align:middle;">visibility</span> View
                        </button>
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
function filterClients(q){
    q = q.toLowerCase();
    document.querySelectorAll('#clients-table tbody tr').forEach(row=>{
        row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
}
</script>
@endpush
