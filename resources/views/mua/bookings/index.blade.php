@extends('layouts.mua')
@section('title','My Bookings')
@section('page_title','My Bookings')
@section('page_meta','Manage your upcoming and past appointments')

@section('content')
<div x-data="muaBookings()" x-cloak>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-brand/10 text-brand flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[24px] font-serif font-bold text-dark leading-none mb-1">{{ $stats['confirmed'] }}</div>
            <div class="text-[13px] font-bold text-muted">Upcoming</div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </div>
        <div>
            <div class="text-[24px] font-serif font-bold text-dark leading-none mb-1">{{ $stats['pending'] }}</div>
            <div class="text-[13px] font-bold text-muted">Pending</div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[24px] font-serif font-bold text-dark leading-none mb-1">{{ $stats['completed'] }}</div>
            <div class="text-[13px] font-bold text-muted">Completed</div>
        </div>
    </div>
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4">
        <div class="w-12 h-12 rounded-xl bg-red-500/10 text-red-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[24px] font-serif font-bold text-dark leading-none mb-1">{{ $stats['cancelled'] }}</div>
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
                <input type="text" placeholder="Search client…" id="mua-search" oninput="filterMuaBookings()" class="pl-9 pr-4 py-2 w-full sm:w-64 rounded-xl border border-border bg-cream/50 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark placeholder:text-muted">
            </div>
            <select id="mua-status-filter" onchange="filterMuaBookings()" class="px-4 py-2 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark cursor-pointer">
                <option value="">All Status</option>
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table id="mua-bookings-table" class="w-full text-left border-collapse min-w-[800px]">
            <thead>
                <tr class="bg-cream/50 border-b border-border">
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Client</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Date & Time</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Package</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Status</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">
                @forelse($bookings as $b)
                <tr data-status="{{ $b->status }}" class="hover:bg-cream/30 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-brand/10 flex items-center justify-center text-[13px] font-bold text-brand shrink-0">{{ substr($b->user->name, 0, 1) }}</div>
                            <span class="text-[14px] font-bold text-dark">{{ $b->user->name }}</span>
                        </div>
                    </td>
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
                                client: '{{ $b->user->name }}',
                                date: '{{ $b->booking_date->format('d M Y') }} · {{ \Carbon\Carbon::parse($b->booking_time)->format('H:i') }}',
                                pkg: '{{ $b->package ?? '-' }}',
                                amount: 'Rp {{ number_format($b->amount, 0, ',', '.') }}',
                                status: '{{ $b->status }}',
                                notes: '{{ addslashes($b->notes ?? '') }}'
                            })" class="w-8 h-8 rounded-lg bg-cream text-muted hover:bg-dark hover:text-white flex items-center justify-center transition-colors" title="View">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                            @if($b->status === 'pending')
                            <form action="{{ route('mua.bookings.status', $b->id) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="confirmed">
                                <button type="submit" class="w-8 h-8 rounded-lg bg-emerald-500/10 text-emerald-500 hover:bg-emerald-500 hover:text-white flex items-center justify-center transition-colors" title="Accept">
                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                                </button>
                            </form>
                            <form action="{{ route('mua.bookings.status', $b->id) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <input type="hidden" name="status" value="cancelled">
                                <button type="submit" class="w-8 h-8 rounded-lg bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white flex items-center justify-center transition-colors" title="Decline">
                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                                </button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-[14px] text-muted">No bookings yet.</td>
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
            <template x-for="field in [['Client', selected.client], ['Date & Time', selected.date], ['Package', selected.pkg], ['Amount', selected.amount]]" :key="field[0]">
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
            <template x-if="selected.notes">
                <div>
                    <div class="h-px bg-border mb-4"></div>
                    <div class="text-[13px] font-bold text-muted mb-1">Notes</div>
                    <p class="text-[14px] text-dark" x-text="selected.notes"></p>
                </div>
            </template>
        </div>
        <div class="px-6 py-4 border-t border-border bg-cream/30 flex justify-end">
            <button @click="viewModal = false" class="px-5 py-2.5 rounded-xl bg-dark text-white text-[13px] font-bold hover:bg-black transition-colors">Close</button>
        </div>
    </div>
</div>

</div>
@endsection

@push('scripts')
<script>
function filterMuaBookings() {
    const q = document.getElementById('mua-search').value.toLowerCase();
    const s = document.getElementById('mua-status-filter').value;
    document.querySelectorAll('#mua-bookings-table tbody tr').forEach(row => {
        const text = row.textContent.toLowerCase();
        const status = row.dataset.status;
        row.style.display = (text.includes(q) && (!s || status === s)) ? '' : 'none';
    });
}

function muaBookings() {
    return {
        viewModal: false,
        selected: { client:'', date:'', pkg:'', amount:'', status:'', notes:'' },

        viewBooking(data) {
            this.selected = data;
            this.viewModal = true;
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
