@extends('layouts.mua')
@section('title','Schedule')
@section('page_title','Schedule')
@section('page_meta','Manage your availability and blocked dates')

@section('content')
<div x-data="schedulePage()" x-cloak>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

    <div class="xl:col-span-2 bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between">
            <h4 class="font-bold text-[16px] text-dark">Weekly Availability</h4>
            <span class="px-3 py-1 rounded-full bg-brand/10 text-brand text-[11px] font-bold uppercase tracking-wider">This Week</span>
        </div>
        <div class="divide-y divide-border">
            @php
            $days = [
                ['Monday', '09:00 – 18:00', true, 2],
                ['Tuesday', '09:00 – 18:00', true, 1],
                ['Wednesday', '10:00 – 17:00', true, 3],
                ['Thursday', '09:00 – 18:00', true, 0],
                ['Friday', '09:00 – 20:00', true, 2],
                ['Saturday', '08:00 – 20:00', true, 4],
                ['Sunday', 'Day Off', false, 0],
            ];
            @endphp
            @foreach($days as $idx => $d)
            <div class="px-6 py-4 flex items-center justify-between hover:bg-cream/30 transition-colors" id="day-row-{{ $idx }}">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center text-[13px] font-bold shrink-0 {{ $d[2] ? 'bg-emerald-500/10 text-emerald-500' : 'bg-red-500/10 text-red-500' }}" id="day-icon-{{ $idx }}">
                        {{ substr($d[0], 0, 2) }}
                    </div>
                    <div>
                        <div class="font-bold text-[14px] text-dark">{{ $d[0] }}</div>
                        <div class="text-[12px] text-muted" id="day-hours-{{ $idx }}">{{ $d[1] }}</div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    @if($d[3] > 0)
                    <span class="px-2.5 py-1 rounded-full bg-brand/10 text-brand text-[11px] font-bold">{{ $d[3] }} bookings</span>
                    @endif
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" {{ $d[2] ? 'checked' : '' }} onchange="toggleDay({{ $idx }}, this.checked)">
                        <div class="w-11 h-6 bg-border rounded-full peer-checked:bg-emerald-500 transition-colors"></div>
                        <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow-sm peer-checked:translate-x-5 transition-transform"></div>
                    </label>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="space-y-8">

        <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
            <div class="px-6 py-5 border-b border-border">
                <h4 class="font-bold text-[16px] text-dark">Blocked Dates</h4>
            </div>
            <div class="p-5 space-y-3" id="blocked-dates-list">
                @php
                $blocked = [
                    ['25 May 2026', 'Personal Day'],
                    ['1 Jun 2026', 'Holiday'],
                    ['15 Jun 2026', 'Training Workshop'],
                ];
                @endphp
                @foreach($blocked as $bidx => $bl)
                <div class="flex items-center justify-between p-3 bg-cream/50 rounded-xl border border-border/50" id="blocked-{{ $bidx }}">
                    <div>
                        <div class="text-[13px] font-bold text-dark">{{ $bl[0] }}</div>
                        <div class="text-[11px] text-muted">{{ $bl[1] }}</div>
                    </div>
                    <button onclick="removeBlocked({{ $bidx }})" class="w-7 h-7 rounded-lg bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white flex items-center justify-center transition-colors" title="Remove">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
                @endforeach
            </div>
            <div class="px-5 pb-5">
                <button @click="addBlockModal = true" class="w-full py-2.5 rounded-xl border-2 border-dashed border-border text-[13px] font-bold text-muted hover:border-brand hover:text-brand transition-colors flex items-center justify-center gap-2">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                    Add Blocked Date
                </button>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
            <div class="px-6 py-5 border-b border-border">
                <h4 class="font-bold text-[16px] text-dark">Working Hours</h4>
            </div>
            <div class="p-5 space-y-4">
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Default Start Time</label>
                    <input type="time" value="09:00" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark cursor-pointer">
                </div>
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Default End Time</label>
                    <input type="time" value="18:00" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark cursor-pointer">
                </div>
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Max Bookings Per Day</label>
                    <select class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark cursor-pointer">
                        <option>2 bookings</option>
                        <option selected>3 bookings</option>
                        <option>4 bookings</option>
                        <option>5 bookings</option>
                    </select>
                </div>
                <button @click="saveSchedule()" class="w-full inline-flex items-center justify-center gap-2 bg-dark hover:bg-black text-white py-3 rounded-xl font-bold text-[14px] transition-all hover:-translate-y-0.5">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                    Save Settings
                </button>
            </div>
        </div>

    </div>

</div>

<div x-show="addBlockModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display:none">
    <div class="absolute inset-0 bg-dark/40 backdrop-blur-sm" @click="addBlockModal = false"></div>
    <div x-show="addBlockModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="relative bg-white rounded-2xl border border-border shadow-xl w-full max-w-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-border bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Block a Date</h4>
        </div>
        <div class="p-6 space-y-5">
            <div>
                <label class="block text-[13px] font-bold text-dark mb-2">Date</label>
                <input type="date" x-model="newBlock.date" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark cursor-pointer">
            </div>
            <div>
                <label class="block text-[13px] font-bold text-dark mb-2">Reason</label>
                <input type="text" x-model="newBlock.reason" placeholder="e.g. Personal Day, Holiday…" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-muted">
            </div>
        </div>
        <div class="px-6 py-4 border-t border-border bg-cream/30 flex items-center justify-end gap-3">
            <button @click="addBlockModal = false" class="px-5 py-2.5 rounded-xl text-[13px] font-bold text-muted hover:text-dark transition-colors">Cancel</button>
            <button @click="addBlocked()" class="px-5 py-2.5 rounded-xl bg-brand text-white text-[13px] font-bold hover:bg-brand-dark transition-colors">Block Date</button>
        </div>
    </div>
</div>

<div x-show="toast" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-dark text-white px-5 py-3.5 rounded-xl shadow-lg" style="display:none">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <span class="text-[13px] font-bold" x-text="toastMsg"></span>
</div>

</div>
@endsection

@push('scripts')
<script>
function toggleDay(idx, checked) {
    const icon = document.getElementById('day-icon-' + idx);
    const hours = document.getElementById('day-hours-' + idx);
    if (checked) {
        icon.className = 'w-10 h-10 rounded-xl flex items-center justify-center text-[13px] font-bold shrink-0 bg-emerald-500/10 text-emerald-500';
        hours.textContent = '09:00 – 18:00';
    } else {
        icon.className = 'w-10 h-10 rounded-xl flex items-center justify-center text-[13px] font-bold shrink-0 bg-red-500/10 text-red-500';
        hours.textContent = 'Day Off';
    }
}

function removeBlocked(idx) {
    const el = document.getElementById('blocked-' + idx);
    if (el) {
        el.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
        el.style.opacity = '0';
        el.style.transform = 'translateX(10px)';
        setTimeout(() => el.remove(), 300);
    }
}

function schedulePage() {
    return {
        addBlockModal: false,
        toast: false,
        toastMsg: '',
        newBlock: { date: '', reason: '' },

        addBlocked() {
            if (!this.newBlock.date) return;
            const list = document.getElementById('blocked-dates-list');
            const dateStr = new Date(this.newBlock.date).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
            const reason = this.newBlock.reason || 'Blocked';
            const id = 'blocked-' + Date.now();
            const html = '<div class="flex items-center justify-between p-3 bg-cream/50 rounded-xl border border-border/50" id="' + id + '"><div><div class="text-[13px] font-bold text-dark">' + dateStr + '</div><div class="text-[11px] text-muted">' + reason + '</div></div><button onclick="document.getElementById(\'' + id + '\').remove()" class="w-7 h-7 rounded-lg bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white flex items-center justify-center transition-colors"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg></button></div>';
            list.insertAdjacentHTML('beforeend', html);
            this.addBlockModal = false;
            this.newBlock = { date: '', reason: '' };
            this.showToast('Date blocked successfully');
        },

        saveSchedule() {
            this.showToast('Schedule settings saved');
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
