@extends('layouts.admin')
@section('title','Bookings')
@section('page_title','Bookings')
@section('page_meta','Manage all client bookings')

@section('content')
<!-- Stat strip -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-dark/5 text-dark flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </div>
        <div>
            <div class="text-[24px] font-serif font-bold text-dark leading-none mb-1">156</div>
            <div class="text-[13px] font-bold text-muted">Total</div>
        </div>
    </div>
    
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[24px] font-serif font-bold text-dark leading-none mb-1">24</div>
            <div class="text-[13px] font-bold text-muted">Pending</div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[24px] font-serif font-bold text-dark leading-none mb-1">118</div>
            <div class="text-[13px] font-bold text-muted">Confirmed</div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-red-500/10 text-red-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[24px] font-serif font-bold text-dark leading-none mb-1">14</div>
            <div class="text-[13px] font-bold text-muted">Cancelled</div>
        </div>
    </div>
</div>

<!-- Data Table -->
<div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden flex flex-col">
    
    <!-- Table Header Actions -->
    <div class="px-6 py-5 border-b border-border bg-white flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <h3 class="font-bold text-[16px] text-dark">All Bookings</h3>
        
        <div class="flex flex-col sm:flex-row gap-3 sm:items-center">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-muted w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" placeholder="Search client, MUA…" id="search-input" oninput="filterTable()" class="pl-9 pr-4 py-2 w-full sm:w-64 rounded-xl border border-border bg-cream/50 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark placeholder:text-muted">
            </div>
            <select id="status-filter" onchange="filterTable()" class="px-4 py-2 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark cursor-pointer">
                <option value="">All Status</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="done">Done</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table id="bookings-table" class="w-full text-left border-collapse min-w-[900px]">
            <thead>
                <tr class="bg-cream/50 border-b border-border">
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">#ID</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Client</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">MUA Artist</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Date &amp; Time</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Package</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">
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
                <tr data-status="{{ $b[6] }}" class="hover:bg-cream/30 transition-colors">
                    <td class="px-6 py-4 text-[12px] font-bold text-muted">{{ $b[0] }}</td>
                    <td class="px-6 py-4 text-[14px] font-bold text-dark">{{ $b[1] }}</td>
                    <td class="px-6 py-4 text-[14px] text-muted">{{ $b[2] }}</td>
                    <td class="px-6 py-4 text-[13px] text-dark">{{ $b[3] }}</td>
                    <td class="px-6 py-4 text-[14px] text-muted">{{ $b[4] }}</td>
                    <td class="px-6 py-4 text-[14px] font-bold text-brand">{{ $b[5] }}</td>
                    <td class="px-6 py-4">
                        @if($b[6] === 'confirmed')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-500/10 text-emerald-500 uppercase tracking-wider">Confirmed</span>
                        @elseif($b[6] === 'pending')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-500/10 text-amber-600 uppercase tracking-wider">Pending</span>
                        @elseif($b[6] === 'done')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-brand/10 text-brand uppercase tracking-wider">Done</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-red-500/10 text-red-500 uppercase tracking-wider">Cancelled</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button class="w-8 h-8 rounded-lg bg-cream text-muted hover:bg-dark hover:text-white flex items-center justify-center transition-colors" title="View">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                            <button class="w-8 h-8 rounded-lg bg-brand/10 text-brand hover:bg-brand hover:text-white flex items-center justify-center transition-colors" title="Edit Status">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
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
function filterTable() {
    const q = document.getElementById('search-input').value.toLowerCase();
    const s = document.getElementById('status-filter').value;
    document.querySelectorAll('#bookings-table tbody tr').forEach(row => {
        const text = row.textContent.toLowerCase();
        const status = row.dataset.status;
        row.style.display = (text.includes(q) && (!s || status === s)) ? '' : 'none';
    });
}
</script>
@endpush
