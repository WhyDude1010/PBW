@extends('layouts.admin')
@section('title', 'MUA Artists')
@section('page_title', 'MUA Artists')
@section('page_meta', 'Manage your roster of makeup artists')

@section('content')
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <h3 class="font-bold text-[18px] text-dark">
            All Artists <span class="text-[14px] font-medium text-muted">(52 total)</span>
        </h3>

        <div class="flex flex-col sm:flex-row gap-3 sm:items-center">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-muted w-4 h-4" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                    </path>
                </svg>
                <input type="text" placeholder="Search artist…" oninput="filterMua(this.value)"
                    class="pl-9 pr-4 py-2.5 w-full sm:w-64 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark placeholder:text-muted">
            </div>
            <a href="{{ route('admin.muas.create') }}"
                class="inline-flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-xl font-bold text-[13px] transition-all hover:shadow-[0_4px_12px_rgba(199,155,132,0.3)] hover:-translate-y-0.5">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                </svg>
                Add New MUA
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="mua-grid">
        @php
            $muas = [
                ['Sarah Wijaya', 'Bali', 'Bridal, Natural, Korean Dewy', '4.9', '152', 'model-mua.jpeg', true],
                ['Mia Rahardjo', 'Jakarta', 'Glam, Soft Glam, Editorial', '4.8', '98', 'about-mua.jpeg', true],
                ['Dera Sanjaya', 'Surabaya', 'Bold, Latina, Party', '5.0', '74', 'makeup1.jpeg', true],
                ['Nadia Kusuma', 'Bandung', 'Natural, Korean Dewy', '4.7', '45', 'model-mua.jpeg', false],
                ['Rara Amelia', 'Yogyakarta', 'Bridal, Traditional', '4.8', '60', 'about-mua.jpeg', true],
                ['Luna Santosa', 'Bali', 'Editorial, Fashion', '4.9', '88', 'makeup1.jpeg', true],
            ];
        @endphp
        @foreach($muas as $m)
            <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden group hover:border-brand transition-all mua-card-admin"
                data-name="{{ strtolower($m[0]) }}">
                <!-- Cover -->
                <div class="h-32 relative overflow-hidden">
                    <img src="{{ asset('image/' . $m[5]) }}" alt="{{ $m[0] }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-linear-to-t from-black/50 to-transparent"></div>
                    <div class="absolute top-3 right-3">
                        @if($m[6])
                            <span
                                class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/90 backdrop-blur-md text-white shadow-sm tracking-wider uppercase">Available</span>
                        @else
                            <span
                                class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-red-500/90 backdrop-blur-md text-white shadow-sm tracking-wider uppercase">Unavailable</span>
                        @endif
                    </div>
                </div>

                <!-- Info -->
                <div class="p-5 pt-0 relative">
                    <!-- Avatar overlapping -->
                    <div class="flex items-end gap-3 mb-4 -mt-6">
                        <img src="{{ asset('image/' . $m[5]) }}" alt="{{ $m[0] }}"
                            class="w-16 h-16 rounded-full object-cover border-4 border-white shadow-sm relative z-10 shrink-0">
                        <div class="pb-1">
                            <div class="font-bold text-[16px] text-dark leading-tight mb-1">{{ $m[0] }}</div>
                            <div class="text-[12px] text-muted flex items-center gap-1 font-medium">
                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" class="text-brand">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z">
                                    </path>
                                </svg>
                                {{ $m[1] }}
                            </div>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-1.5 mb-4">
                        @foreach(explode(', ', $m[2]) as $tag)
                            <span
                                class="px-2.5 py-1 rounded-full bg-cream text-muted text-[10px] font-bold tracking-wide">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <!-- Stats -->
                    <div
                        class="flex items-center justify-between mb-5 px-3 py-2 bg-cream/50 rounded-xl border border-border/50">
                        <div class="flex items-center gap-1.5">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-amber-500)">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            <span class="text-[13px] font-bold text-dark">{{ $m[3] }}</span>
                        </div>
                        <div class="w-px h-4 bg-border"></div>
                        <div class="text-[12px] font-medium text-muted">
                            <span class="font-bold text-dark">{{ $m[4] }}</span> bookings
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="flex gap-2">
                        <button
                            class="flex-1 py-2.5 rounded-xl border border-border bg-white text-[13px] font-bold text-dark hover:border-brand hover:text-brand transition-colors">
                            Edit
                        </button>
                        <button
                            class="flex-1 py-2.5 rounded-xl bg-brand/10 text-[13px] font-bold text-brand hover:bg-brand hover:text-white transition-colors">
                            {{ $m[6] ? 'Deactivate' : 'Activate' }}
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('scripts')
    <script>
        function filterMua(q) {
            q = q.toLowerCase();
            document.querySelectorAll('.mua-card-admin').forEach(c => {
                c.style.display = c.dataset.name.includes(q) ? '' : 'none';
            });
        }
    </script>
@endpush