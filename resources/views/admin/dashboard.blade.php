@extends('layouts.admin')
@section('title','Dashboard')
@section('page_title','Dashboard')
@section('page_meta', 'Welcome back, Admin · ' . date("l, d M Y"))

@section('content')

<!-- Stat Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4 hover:border-brand transition-colors">
        <div class="w-12 h-12 rounded-xl bg-brand/10 text-brand flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">24</div>
            <div class="text-[13px] font-bold text-muted mb-2">Bookings Today</div>
            <div class="text-[11px] font-bold text-emerald-500 flex items-center gap-1">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                12% vs yesterday
            </div>
        </div>
    </div>
    
    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4 hover:border-brand transition-colors">
        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">18M</div>
            <div class="text-[13px] font-bold text-muted mb-2">Revenue This Week</div>
            <div class="text-[11px] font-bold text-emerald-500 flex items-center gap-1">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                8% vs last week
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4 hover:border-brand transition-colors">
        <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">52</div>
            <div class="text-[13px] font-bold text-muted mb-2">Active MUAs</div>
            <div class="text-[11px] font-bold text-emerald-500 flex items-center gap-1">
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                3 new this month
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-6 border border-border shadow-sm flex items-start gap-4 hover:border-brand transition-colors">
        <div class="w-12 h-12 rounded-xl bg-violet-500/10 text-violet-500 flex items-center justify-center shrink-0">
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
        </div>
        <div>
            <div class="text-[28px] font-serif font-bold text-dark leading-none mb-1">4.9</div>
            <div class="text-[13px] font-bold text-muted mb-2">Avg Rating</div>
            <div class="text-[11px] font-medium text-muted">Based on 1,240 reviews</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mb-8">
    <!-- Weekly Bookings Chart -->
    <div class="bg-white rounded-2xl border border-border shadow-sm flex flex-col">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between">
            <h3 class="font-bold text-[16px] text-dark">Weekly Bookings</h3>
            <span class="px-3 py-1 rounded-full bg-brand/10 text-brand text-[11px] font-bold uppercase tracking-wider">This Week</span>
        </div>
        <div class="p-6 flex-1 flex flex-col">
            <div class="flex items-end justify-between gap-2 h-48 mt-auto">
                <div class="w-full bg-brand/20 hover:bg-brand transition-colors rounded-t-lg relative group cursor-pointer" style="height: 40%">
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[12px] font-medium text-muted">Mon</span>
                </div>
                <div class="w-full bg-brand/20 hover:bg-brand transition-colors rounded-t-lg relative group cursor-pointer" style="height: 65%">
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[12px] font-medium text-muted">Tue</span>
                </div>
                <div class="w-full bg-brand/20 hover:bg-brand transition-colors rounded-t-lg relative group cursor-pointer" style="height: 50%">
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[12px] font-medium text-muted">Wed</span>
                </div>
                <div class="w-full bg-brand transition-colors rounded-t-lg relative group cursor-pointer shadow-md" style="height: 90%">
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[12px] font-bold text-dark">Thu</span>
                </div>
                <div class="w-full bg-brand/20 hover:bg-brand transition-colors rounded-t-lg relative group cursor-pointer" style="height: 75%">
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[12px] font-medium text-muted">Fri</span>
                </div>
                <div class="w-full bg-brand/20 hover:bg-brand transition-colors rounded-t-lg relative group cursor-pointer" style="height: 85%">
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[12px] font-medium text-muted">Sat</span>
                </div>
                <div class="w-full bg-brand/20 hover:bg-brand transition-colors rounded-t-lg relative group cursor-pointer" style="height: 60%">
                    <span class="absolute -bottom-6 left-1/2 -translate-x-1/2 text-[12px] font-medium text-muted">Sun</span>
                </div>
            </div>
            <div class="h-6"></div> <!-- Spacer for labels -->
        </div>
    </div>

    <!-- Top MUAs -->
    <div class="bg-white rounded-2xl border border-border shadow-sm">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between">
            <h3 class="font-bold text-[16px] text-dark">Top MUAs This Week</h3>
            <a href="{{ route('admin.muas.index') }}" class="text-[13px] font-bold text-brand hover:text-brand-dark transition-colors">View all</a>
        </div>
        <div class="p-2">
            @foreach([['Sarah Wijaya','Bali','12'],['Mia Rahardjo','Jakarta','9'],['Dera Sanjaya','Surabaya','7']] as $mua)
            <div class="flex items-center justify-between p-4 hover:bg-cream/50 transition-colors rounded-xl">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('image/model-mua.jpeg') }}" alt="{{ $mua[0] }}" class="w-12 h-12 rounded-full object-cover border border-border">
                    <div>
                        <div class="font-bold text-[14.5px] text-dark">{{ $mua[0] }}</div>
                        <div class="text-[12px] text-muted">{{ $mua[1] }}</div>
                    </div>
                </div>
                <span class="px-3 py-1 rounded-full bg-brand/10 text-brand text-[12px] font-bold">{{ $mua[2] }} bookings</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Recent Bookings -->
<div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
    <div class="px-6 py-5 border-b border-border flex items-center justify-between bg-white">
        <h3 class="font-bold text-[16px] text-dark">Recent Bookings</h3>
        <a href="{{ route('admin.bookings.index') }}" class="text-[13px] font-bold text-brand hover:text-brand-dark transition-colors flex items-center gap-1">
            View all 
            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path></svg>
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[800px]">
            <thead>
                <tr class="bg-cream/50 border-b border-border">
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Client</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">MUA</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Date</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Package</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-4 text-[12px] font-bold text-muted uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-border">
                @foreach([
                    ['Rina Maharani','Sarah Wijaya','10 May 2026','Basic Beauty','Rp 550.000','confirmed'],
                    ['Delia Santoso','Mia Rahardjo','11 May 2026','Creative Glam','Rp 3.200.000','pending'],
                    ['Citra Dewi','Dera Sanjaya','12 May 2026','Editorial','Rp 2.100.000','confirmed'],
                    ['Ayu Pratiwi','Sarah Wijaya','13 May 2026','Signature Bridal','Rp 12.000.000','pending'],
                ] as $b)
                <tr class="hover:bg-cream/30 transition-colors">
                    <td class="px-6 py-4 text-[14px] font-bold text-dark">{{ $b[0] }}</td>
                    <td class="px-6 py-4 text-[14px] text-muted">{{ $b[1] }}</td>
                    <td class="px-6 py-4 text-[14px] text-muted">{{ $b[2] }}</td>
                    <td class="px-6 py-4 text-[14px] text-muted">{{ $b[3] }}</td>
                    <td class="px-6 py-4 text-[14px] font-bold text-brand">{{ $b[4] }}</td>
                    <td class="px-6 py-4">
                        @if($b[5] === 'confirmed')
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-emerald-500/10 text-emerald-500 uppercase tracking-wider">Confirmed</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px] font-bold bg-amber-500/10 text-amber-600 uppercase tracking-wider">Pending</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
