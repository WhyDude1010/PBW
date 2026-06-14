@extends('layouts.admin')
@section('title', 'Clients')
@section('page_title', 'Clients')
@section('page_meta', 'All registered clients')

@section('content')
<div x-data="clientsPage()" x-cloak>

    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden flex flex-col">
        <div class="px-6 py-5 border-b border-border bg-white flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h4 class="font-bold text-[16px] text-dark">
                All Clients <span class="text-[13px] font-medium text-muted">({{ $clients->count() }} total)</span>
            </h4>
            <div class="relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-muted w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" placeholder="Search by name or email…" oninput="filterClients(this.value)" class="pl-9 pr-4 py-2 w-full sm:w-64 rounded-xl border border-border bg-cream/50 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark placeholder:text-muted">
            </div>
        </div>
        <div class="overflow-x-auto">
            <table id="clients-table" class="w-full text-left border-collapse min-w-[900px]">
                <thead>
                    <tr class="bg-cream/50 border-b border-border">
                        <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Client</th>
                        <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Bookings</th>
                        <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Total Spent</th>
                        <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Joined</th>
                        <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @forelse($clients as $c)
                        <tr class="hover:bg-cream/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-brand/10 flex items-center justify-center text-[14px] font-bold text-brand shrink-0">
                                        {{ substr($c->name, 0, 1) }}
                                    </div>
                                    <div class="font-bold text-dark text-[14px]">{{ $c->name }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-[13px] text-muted">{{ $c->email }}</td>
                            <td class="px-6 py-4 text-[13px] text-dark">{{ $c->phone ?? '-' }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-dark/5 text-dark uppercase tracking-wider">{{ $c->bookings_count }}</span>
                            </td>
                            <td class="px-6 py-4 text-[14px] font-bold text-brand">Rp {{ number_format($c->bookings_sum_amount ?? 0, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-[13px] text-muted">{{ $c->created_at->format('M Y') }}</td>
                            <td class="px-6 py-4 text-right">
                                <button @click="viewClient('{{ $c->name }}', '{{ $c->email }}', '{{ $c->phone ?? '-' }}', '{{ $c->bookings_count }}', 'Rp {{ number_format($c->bookings_sum_amount ?? 0, 0, ',', '.') }}', '{{ $c->created_at->format('M Y') }}')" class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-lg bg-cream text-muted hover:bg-dark hover:text-white font-bold text-[12px] transition-colors">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                    View
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-[14px] text-muted">No clients registered yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div x-show="viewModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display:none">
        <div class="absolute inset-0 bg-dark/40 backdrop-blur-sm" @click="viewModal = false"></div>
        <div x-show="viewModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="relative bg-white rounded-2xl border border-border shadow-xl w-full max-w-md overflow-hidden">
            <div class="px-6 py-5 border-b border-border flex items-center justify-between bg-cream/30">
                <h4 class="font-bold text-[16px] text-dark">Client Profile</h4>
                <button @click="viewModal = false" class="w-8 h-8 rounded-lg bg-cream text-muted hover:bg-dark hover:text-white flex items-center justify-center transition-colors">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="p-6">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 rounded-full bg-brand/10 flex items-center justify-center text-[22px] font-bold text-brand shrink-0" x-text="selected.name.charAt(0)"></div>
                    <div>
                        <div class="font-bold text-[18px] text-dark" x-text="selected.name"></div>
                        <div class="text-[13px] text-muted">Member since <span x-text="selected.joined"></span></div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between py-3 border-b border-border">
                        <span class="text-[13px] font-bold text-muted flex items-center gap-2">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Email
                        </span>
                        <span class="text-[14px] text-dark" x-text="selected.email"></span>
                    </div>
                    <div class="flex items-center justify-between py-3 border-b border-border">
                        <span class="text-[13px] font-bold text-muted flex items-center gap-2">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            Phone
                        </span>
                        <span class="text-[14px] text-dark" x-text="selected.phone"></span>
                    </div>
                    <div class="flex items-center justify-between py-3 border-b border-border">
                        <span class="text-[13px] font-bold text-muted flex items-center gap-2">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Total Bookings
                        </span>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-brand/10 text-brand" x-text="selected.bookings"></span>
                    </div>
                    <div class="flex items-center justify-between py-3">
                        <span class="text-[13px] font-bold text-muted flex items-center gap-2">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Total Spent
                        </span>
                        <span class="text-[14px] font-bold text-brand" x-text="selected.spent"></span>
                    </div>
                </div>
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
function filterClients(q) {
    q = q.toLowerCase();
    document.querySelectorAll('#clients-table tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
    });
}

function clientsPage() {
    return {
        viewModal: false,
        selected: { name: '', email: '', phone: '', bookings: '', spent: '', joined: '' },

        viewClient(name, email, phone, bookings, spent, joined) {
            this.selected = { name, email, phone, bookings, spent, joined };
            this.viewModal = true;
        }
    }
}
</script>
@endpush