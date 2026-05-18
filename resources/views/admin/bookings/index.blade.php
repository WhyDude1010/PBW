@extends('layouts.admin')
@section('title','Bookings')
@section('page_title','Bookings')
@section('page_meta','Manage all client bookings')

@section('content')
<div x-data="bookingsPage()" x-cloak>

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

<div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden flex flex-col">
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
                @foreach($bookings as $i => $b)
                <tr data-status="{{ $b[6] }}" class="hover:bg-cream/30 transition-colors" id="booking-row-{{ $i }}">
                    <td class="px-6 py-4 text-[12px] font-bold text-muted">{{ $b[0] }}</td>
                    <td class="px-6 py-4 text-[14px] font-bold text-dark">{{ $b[1] }}</td>
                    <td class="px-6 py-4 text-[14px] text-muted">{{ $b[2] }}</td>
                    <td class="px-6 py-4 text-[13px] text-dark">{{ $b[3] }}</td>
                    <td class="px-6 py-4 text-[14px] text-muted">{{ $b[4] }}</td>
                    <td class="px-6 py-4 text-[14px] font-bold text-brand">{{ $b[5] }}</td>
                    <td class="px-6 py-4" id="status-cell-{{ $i }}">
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
                            <button @click="viewBooking({{ $i }}, '{{ $b[0] }}', '{{ $b[1] }}', '{{ $b[2] }}', '{{ $b[3] }}', '{{ $b[4] }}', '{{ $b[5] }}', '{{ $b[6] }}')" class="w-8 h-8 rounded-lg bg-cream text-muted hover:bg-dark hover:text-white flex items-center justify-center transition-colors" title="View">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                            <button @click="editStatus({{ $i }}, '{{ $b[0] }}', '{{ $b[1] }}', '{{ $b[6] }}')" class="w-8 h-8 rounded-lg bg-brand/10 text-brand hover:bg-brand hover:text-white flex items-center justify-center transition-colors" title="Edit Status">
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

<div x-show="viewModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display:none">
    <div class="absolute inset-0 bg-dark/40 backdrop-blur-sm" @click="viewModal = false"></div>
    <div x-show="viewModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="relative bg-white rounded-2xl border border-border shadow-xl w-full max-w-lg overflow-hidden">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Booking Details</h4>
            <button @click="viewModal = false" class="w-8 h-8 rounded-lg bg-cream text-muted hover:bg-dark hover:text-white flex items-center justify-center transition-colors">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex items-center justify-between">
                <span class="text-[13px] font-bold text-muted">Booking ID</span>
                <span class="text-[14px] font-bold text-dark" x-text="selected.id"></span>
            </div>
            <div class="h-px bg-border"></div>
            <div class="flex items-center justify-between">
                <span class="text-[13px] font-bold text-muted">Client</span>
                <span class="text-[14px] font-bold text-dark" x-text="selected.client"></span>
            </div>
            <div class="h-px bg-border"></div>
            <div class="flex items-center justify-between">
                <span class="text-[13px] font-bold text-muted">MUA Artist</span>
                <span class="text-[14px] text-brand font-bold" x-text="selected.mua"></span>
            </div>
            <div class="h-px bg-border"></div>
            <div class="flex items-center justify-between">
                <span class="text-[13px] font-bold text-muted">Date & Time</span>
                <span class="text-[14px] text-dark" x-text="selected.date"></span>
            </div>
            <div class="h-px bg-border"></div>
            <div class="flex items-center justify-between">
                <span class="text-[13px] font-bold text-muted">Package</span>
                <span class="text-[14px] text-dark" x-text="selected.pkg"></span>
            </div>
            <div class="h-px bg-border"></div>
            <div class="flex items-center justify-between">
                <span class="text-[13px] font-bold text-muted">Amount</span>
                <span class="text-[14px] font-bold text-brand" x-text="selected.amount"></span>
            </div>
            <div class="h-px bg-border"></div>
            <div class="flex items-center justify-between">
                <span class="text-[13px] font-bold text-muted">Status</span>
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider" :class="statusClass(selected.status)" x-text="selected.status"></span>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-border bg-cream/30 flex justify-end">
            <button @click="viewModal = false" class="px-5 py-2.5 rounded-xl bg-dark text-white text-[13px] font-bold hover:bg-black transition-colors">Close</button>
        </div>
    </div>
</div>

<div x-show="editModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display:none">
    <div class="absolute inset-0 bg-dark/40 backdrop-blur-sm" @click="editModal = false"></div>
    <div x-show="editModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="relative bg-white rounded-2xl border border-border shadow-xl w-full max-w-md overflow-hidden">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Update Status</h4>
            <button @click="editModal = false" class="w-8 h-8 rounded-lg bg-cream text-muted hover:bg-dark hover:text-white flex items-center justify-center transition-colors">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div class="p-6 space-y-5">
            <div>
                <div class="text-[13px] font-bold text-muted mb-1">Booking</div>
                <div class="text-[15px] font-bold text-dark"><span x-text="editing.id"></span> — <span x-text="editing.client"></span></div>
            </div>
            <div>
                <label class="block text-[13px] font-bold text-dark mb-2">New Status</label>
                <div class="grid grid-cols-2 gap-3">
                    <template x-for="s in ['pending','confirmed','done','cancelled']" :key="s">
                        <button @click="editing.newStatus = s" class="py-2.5 rounded-xl border text-[13px] font-bold transition-all capitalize" :class="editing.newStatus === s ? 'border-brand bg-brand/10 text-brand' : 'border-border text-muted hover:border-brand/50'" x-text="s"></button>
                    </template>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-border bg-cream/30 flex items-center justify-end gap-3">
            <button @click="editModal = false" class="px-5 py-2.5 rounded-xl text-[13px] font-bold text-muted hover:text-dark hover:bg-cream transition-colors">Cancel</button>
            <button @click="applyStatus()" class="px-5 py-2.5 rounded-xl bg-brand text-white text-[13px] font-bold hover:bg-brand-dark transition-colors">Save Changes</button>
        </div>
    </div>
</div>

<div x-show="toast" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 translate-y-4" class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-dark text-white px-5 py-3.5 rounded-xl shadow-lg" style="display:none">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <span class="text-[13px] font-bold" x-text="toastMsg"></span>
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

function bookingsPage() {
    return {
        viewModal: false,
        editModal: false,
        toast: false,
        toastMsg: '',
        selected: { id:'', client:'', mua:'', date:'', pkg:'', amount:'', status:'' },
        editing: { idx: 0, id:'', client:'', currentStatus:'', newStatus:'' },

        viewBooking(idx, id, client, mua, date, pkg, amount, status) {
            this.selected = { id, client, mua, date, pkg, amount, status };
            this.viewModal = true;
        },

        editStatus(idx, id, client, status) {
            this.editing = { idx, id, client, currentStatus: status, newStatus: status };
            this.editModal = true;
        },

        statusClass(s) {
            const map = {
                confirmed: 'bg-emerald-500/10 text-emerald-500',
                pending: 'bg-amber-500/10 text-amber-600',
                done: 'bg-brand/10 text-brand',
                cancelled: 'bg-red-500/10 text-red-500'
            };
            return map[s] || '';
        },

        applyStatus() {
            const row = document.getElementById('booking-row-' + this.editing.idx);
            const cell = document.getElementById('status-cell-' + this.editing.idx);
            const ns = this.editing.newStatus;
            row.dataset.status = ns;
            cell.innerHTML = '<span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider ' + this.statusClass(ns) + '">' + ns + '</span>';
            this.editModal = false;
            this.showToast('Status updated to ' + ns);
        },

        showToast(msg) {
            this.toastMsg = msg;
            this.toast = true;
            setTimeout(() => { this.toast = false; }, 2500);
        }
    }
}
</script>
@endpush
