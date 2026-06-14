@extends('layouts.admin')
@section('title','Bookings')
@section('page_title','Bookings')
@section('page_meta','Manage all client bookings')

@section('content')
<div x-data="bookingsPage()" x-cloak>

@php
    $total = $bookings->count();
    $pending = $bookings->where('status', 'pending')->count();
    $confirmed = $bookings->where('status', 'confirmed')->count();
    $cancelled = $bookings->where('status', 'cancelled')->count();
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-dark/5 text-dark flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </div>
        <div>
            <div class="text-[24px] font-serif font-bold text-dark leading-none mb-1">{{ $total }}</div>
            <div class="text-[13px] font-bold text-muted">Total</div>
        </div>
    </div>
    
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[24px] font-serif font-bold text-dark leading-none mb-1">{{ $pending }}</div>
            <div class="text-[13px] font-bold text-muted">Pending</div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[24px] font-serif font-bold text-dark leading-none mb-1">{{ $confirmed }}</div>
            <div class="text-[13px] font-bold text-muted">Confirmed</div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-red-500/10 text-red-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[24px] font-serif font-bold text-dark leading-none mb-1">{{ $cancelled }}</div>
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
                <input type="text" placeholder="Search client…" id="search-input" oninput="filterTable()" class="pl-9 pr-4 py-2 w-full sm:w-64 rounded-xl border border-border bg-cream/50 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark placeholder:text-muted">
            </div>
            <select id="mua-filter" onchange="filterTable()" class="px-4 py-2 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark cursor-pointer">
                <option value="">All MUAs</option>
                @foreach($muaNames as $name)
                <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
            <select id="status-filter" onchange="filterTable()" class="px-4 py-2 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark cursor-pointer">
                <option value="">All Status</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="completed">Completed</option>
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
                @forelse($bookings as $b)
                <tr data-status="{{ $b->status }}" class="hover:bg-cream/30 transition-colors">
                    <td class="px-6 py-4 text-[12px] font-bold text-muted">BK-{{ str_pad($b->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td class="px-6 py-4 text-[14px] font-bold text-dark">{{ $b->user->name }}</td>
                    <td class="px-6 py-4 text-[14px] text-muted">{{ $b->muaProfile->user->name ?? '-' }}</td>
                    <td class="px-6 py-4 text-[13px] text-dark">{{ $b->booking_date->format('d M') }} · {{ \Carbon\Carbon::parse($b->booking_time)->format('H:i') }}</td>
                    <td class="px-6 py-4 text-[14px] text-muted">{{ $b->package ?? '-' }}</td>
                    <td class="px-6 py-4 text-[14px] font-bold text-brand">Rp {{ number_format($b->amount, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">
                        @if($b->status === 'confirmed')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-500/10 text-emerald-500 uppercase tracking-wider">Confirmed</span>
                        @elseif($b->status === 'pending')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-500/10 text-amber-600 uppercase tracking-wider">Pending</span>
                        @elseif($b->status === 'completed')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-brand/10 text-brand uppercase tracking-wider">Completed</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-red-500/10 text-red-500 uppercase tracking-wider">Cancelled</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button @click="viewBooking({
                                id: 'BK-{{ str_pad($b->id, 3, '0', STR_PAD_LEFT) }}',
                                client: '{{ $b->user->name }}',
                                mua: '{{ $b->muaProfile->user->name ?? '-' }}',
                                date: '{{ $b->booking_date->format('d M Y') }} · {{ \Carbon\Carbon::parse($b->booking_time)->format('H:i') }}',
                                pkg: '{{ $b->package ?? '-' }}',
                                amount: 'Rp {{ number_format($b->amount, 0, ',', '.') }}',
                                status: '{{ $b->status }}'
                            })" class="w-8 h-8 rounded-lg bg-cream text-muted hover:bg-dark hover:text-white flex items-center justify-center transition-colors" title="View">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                            <button @click="editStatus({{ $b->id }}, 'BK-{{ str_pad($b->id, 3, '0', STR_PAD_LEFT) }}', '{{ $b->user->name }}', '{{ $b->status }}')" class="w-8 h-8 rounded-lg bg-brand/10 text-brand hover:bg-brand hover:text-white flex items-center justify-center transition-colors" title="Edit Status">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-12 text-center text-[14px] text-muted">No bookings yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div x-show="viewModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display:none">
    <div class="absolute inset-0 bg-dark/40 backdrop-blur-sm" @click="viewModal = false"></div>
    <div x-show="viewModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="relative bg-white rounded-2xl border border-border shadow-xl w-full max-w-lg overflow-hidden">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Booking Details</h4>
            <button @click="viewModal = false" class="w-8 h-8 rounded-lg bg-cream text-muted hover:bg-dark hover:text-white flex items-center justify-center transition-colors">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <template x-for="field in [['Booking ID', selected.id], ['Client', selected.client], ['MUA Artist', selected.mua], ['Date & Time', selected.date], ['Package', selected.pkg], ['Amount', selected.amount]]" :key="field[0]">
                <div>
                    <div class="flex items-center justify-between">
                        <span class="text-[13px] font-bold text-muted" x-text="field[0]"></span>
                        <span class="text-[14px] font-bold text-dark" x-text="field[1]"></span>
                    </div>
                    <div class="h-px bg-border mt-4"></div>
                </div>
            </template>
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

<div x-show="editModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display:none">
    <div class="absolute inset-0 bg-dark/40 backdrop-blur-sm" @click="editModal = false"></div>
    <div x-show="editModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="relative bg-white rounded-2xl border border-border shadow-xl w-full max-w-md overflow-hidden">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Update Status</h4>
            <button @click="editModal = false" class="w-8 h-8 rounded-lg bg-cream text-muted hover:bg-dark hover:text-white flex items-center justify-center transition-colors">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form :action="'/admin/bookings/' + editing.bookingId + '/status'" method="POST">
            @csrf @method('PATCH')
            <div class="p-6 space-y-5">
                <div>
                    <div class="text-[13px] font-bold text-muted mb-1">Booking</div>
                    <div class="text-[15px] font-bold text-dark"><span x-text="editing.label"></span> — <span x-text="editing.client"></span></div>
                </div>
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">New Status</label>
                    <div class="grid grid-cols-2 gap-3">
                        <template x-for="s in ['pending','confirmed','completed','cancelled']" :key="s">
                            <button type="button" @click="editing.newStatus = s" class="py-2.5 rounded-xl border text-[13px] font-bold transition-all capitalize" :class="editing.newStatus === s ? 'border-brand bg-brand/10 text-brand' : 'border-border text-muted hover:border-brand/50'" x-text="s"></button>
                        </template>
                    </div>
                    <input type="hidden" name="status" :value="editing.newStatus">
                </div>
            </div>
            <div class="px-6 py-4 border-t border-border bg-cream/30 flex items-center justify-end gap-3">
                <button type="button" @click="editModal = false" class="px-5 py-2.5 rounded-xl text-[13px] font-bold text-muted hover:text-dark hover:bg-cream transition-colors">Cancel</button>
                <button type="submit" class="px-5 py-2.5 rounded-xl bg-brand text-white text-[13px] font-bold hover:bg-brand-dark transition-colors">Save Changes</button>
            </div>
        </form>
    </div>
</div>

</div>
@endsection

@push('scripts')
<script>
function filterTable() {
    const q = document.getElementById('search-input').value.toLowerCase();
    const s = document.getElementById('status-filter').value;
    const m = document.getElementById('mua-filter').value.toLowerCase();
    document.querySelectorAll('#bookings-table tbody tr').forEach(row => {
        const text = row.textContent.toLowerCase();
        const status = row.dataset.status;
        row.style.display = (text.includes(q) && (!s || status === s) && (!m || text.includes(m))) ? '' : 'none';
    });
}

function bookingsPage() {
    return {
        viewModal: false,
        editModal: false,
        selected: { id:'', client:'', mua:'', date:'', pkg:'', amount:'', status:'' },
        editing: { bookingId: 0, label:'', client:'', newStatus:'' },

        viewBooking(data) {
            this.selected = data;
            this.viewModal = true;
        },

        editStatus(bookingId, label, client, status) {
            this.editing = { bookingId, label, client, newStatus: status };
            this.editModal = true;
        },

        statusClass(s) {
            return {
                confirmed: 'bg-emerald-500/10 text-emerald-500',
                pending: 'bg-amber-500/10 text-amber-600',
                completed: 'bg-brand/10 text-brand',
                cancelled: 'bg-red-500/10 text-red-500'
            }[s] || '';
        }
    }
}
</script>
@endpush
