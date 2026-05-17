@extends('layouts.admin')
@section('title', 'Clients')
@section('page_title', 'Clients')
@section('page_meta', 'All registered clients')

@section('content')
    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden flex flex-col">
        <div
            class="px-6 py-5 border-b border-border bg-white flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <h4 class="font-bold text-[16px] text-dark">
                All Clients <span class="text-[13px] font-medium text-muted">(5 total)</span>
            </h4>
            <div class="relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-muted w-4 h-4" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                    </path>
                </svg>
                <input type="text" placeholder="Search by name or email…" oninput="filterClients(this.value)"
                    class="pl-9 pr-4 py-2 w-full sm:w-64 rounded-xl border border-border bg-cream/50 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-darkeholder:text-[#7A6560]">
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
                        <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider text-right">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border">
                    @php
                        $clients = [
                            ['Rina Maharani', 'rina@example.com', '+62 812-3456', '8', 'Rp 4.4M', 'Jan 2026'],
                            ['Delia Santoso', 'delia@example.com', '+62 817-7890', '5', 'Rp 16M', 'Feb 2026'],
                            ['Citra Dewi', 'citra@example.com', '+62 821-1122', '3', 'Rp 6.3M', 'Mar 2026'],
                            ['Ayu Pratiwi', 'ayu@example.com', '+62 813-4455', '12', 'Rp 48M', 'Nov 2025'],
                            ['Sari Indah', 'sari@example.com', '+62 815-6677', '2', 'Rp 1M', 'Apr 2026'],
                        ];
                    @endphp
                    @foreach($clients as $c)
                        <tr class="hover:bg-cream/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-10 h-10 rounded-full bg-brand/10 flex items-center justify-center text-[14px] font-bold text-brand shrink-0">
                                        {{ substr($c[0], 0, 1) }}
                                    </div>
                                    <div class="font-bold text-dark text-[14px]">{{ $c[0] }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-[13px] text-muted">{{ $c[1] }}</td>
                            <td class="px-6 py-4 text-[13px] text-dark">{{ $c[2] }}</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-dark/5 text-dark uppercase tracking-wider">{{ $c[3] }}</span>
                            </td>
                            <td class="px-6 py-4 text-[14px] font-bold text-brand">{{ $c[4] }}</td>
                            <td class="px-6 py-4 text-[13px] text-muted">{{ $c[5] }}</td>
                            <td class="px-6 py-4 text-right">
                                <button
                                    class="inline-flex items-center justify-center gap-1.5 px-3 py-1.5 rounded-lg bg-cream text-muteder:bg-[#1A1010] hover:text-white font-bold text-[12px] transition-colors">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                    View
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
        function filterClients(q) {
            q = q.toLowerCase();
            document.querySelectorAll('#clients-table tbody tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
            });
        }
    </script>
@endpush