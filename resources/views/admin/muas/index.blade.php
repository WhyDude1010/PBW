@extends('layouts.admin')
@section('title', 'MUA Artists')
@section('page_title', 'MUA Artists')
@section('page_meta', 'Manage your roster of makeup artists')

@section('content')

@if(session('sukses'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-[13px] font-medium mb-6">{{ session('sukses') }}</div>
@endif

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
    <h3 class="font-bold text-[18px] text-dark">
        All Artists <span class="text-[14px] font-medium text-muted">({{ $muas->count() }} total)</span>
    </h3>
    <div class="flex flex-col sm:flex-row gap-3 sm:items-center">
        <div class="relative">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-muted w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Search artist…" id="mua-search-input" oninput="filterMuaList()" class="pl-9 pr-4 py-2.5 w-full sm:w-64 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark placeholder:text-muted">
        </div>
        <a href="{{ route('admin.muas.create') }}" class="inline-flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-xl font-bold text-[13px] transition-all hover:shadow-[0_4px_12px_rgba(199,155,132,0.3)] hover:-translate-y-0.5">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
            Add New MUA
        </a>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="mua-grid">
    @forelse($muas as $mua)
        <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden group hover:border-brand transition-all mua-card-admin" data-name="{{ strtolower($mua->user->name) }}" data-category="{{ strtolower(implode(', ', $mua->styles ?? [])) }}">
            <div class="h-32 relative overflow-hidden">
                @if($mua->user->photo)
                    <img src="{{ asset('storage/' . $mua->user->photo) }}" alt="{{ $mua->user->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-brand/20 to-brand/5 flex items-center justify-center">
                        <span class="text-[48px] font-serif font-bold text-brand/30">{{ substr($mua->user->name, 0, 1) }}</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                <div class="absolute top-3 right-3">
                    @if($mua->is_available)
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/90 backdrop-blur-md text-white shadow-sm tracking-wider uppercase">Available</span>
                    @else
                        <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-red-500/90 backdrop-blur-md text-white shadow-sm tracking-wider uppercase">Unavailable</span>
                    @endif
                </div>
            </div>

            <div class="p-5 pt-2 relative">
                <div class="flex items-end gap-3 mb-4 -mt-5">
                    @if($mua->user->photo)
                        <img src="{{ asset('storage/' . $mua->user->photo) }}" alt="{{ $mua->user->name }}" class="w-16 h-16 rounded-full object-cover border-4 border-white shadow-sm relative z-10 shrink-0">
                    @else
                        <div class="w-16 h-16 rounded-full bg-brand/10 border-4 border-white shadow-sm relative z-10 shrink-0 flex items-center justify-center text-brand font-bold text-[20px]">{{ substr($mua->user->name, 0, 1) }}</div>
                    @endif
                    <div class="pb-1">
                        <div class="font-bold text-[16px] text-dark leading-tight mb-1">{{ $mua->user->name }}</div>
                        <div class="text-[12px] text-muted flex items-center gap-1 font-medium">
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="text-brand"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            {{ $mua->location }}
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap gap-1.5 mb-4">
                    @foreach($mua->styles ?? [] as $style)
                        <span class="px-2.5 py-1 rounded-full bg-cream text-muted text-[10px] font-bold tracking-wide">{{ $style }}</span>
                    @endforeach
                </div>

                <div class="flex items-center justify-between mb-5 px-3 py-2 bg-cream/50 rounded-xl border border-border/50">
                    <div class="flex items-center gap-1.5">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-amber-500)"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        <span class="text-[13px] font-bold text-dark">{{ $mua->reviews_avg_rating ? number_format($mua->reviews_avg_rating, 1) : '-' }}</span>
                    </div>
                    <div class="w-px h-4 bg-border"></div>
                    <div class="text-[12px] font-medium text-muted">
                        <span class="font-bold text-dark">{{ $mua->bookings_count }}</span> bookings
                    </div>
                </div>

                <div class="text-[12px] text-muted mb-4 truncate" title="{{ $mua->user->email }}">
                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="inline -mt-0.5 mr-1 text-brand"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    {{ $mua->user->email }}
                </div>

                <div x-data="{ showCred: false }" class="mb-4">
                    <button @click="showCred = !showCred" type="button" class="w-full py-2 rounded-xl bg-cream border border-border text-[12px] font-bold text-muted hover:border-brand hover:text-brand transition-colors">
                        <span x-text="showCred ? 'Close' : 'Edit Credentials'"></span>
                    </button>
                    <div x-show="showCred" x-transition class="mt-3" style="display:none">
                        <form action="{{ route('admin.muas.credentials', $mua) }}" method="POST" class="space-y-3">
                            @csrf
                            @method('PUT')
                            <input type="email" name="email" value="{{ $mua->user->email }}" placeholder="Email" class="w-full px-3 py-2.5 rounded-lg border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark" required>
                            <input type="password" name="password" placeholder="New Password (leave blank to keep)" class="w-full px-3 py-2.5 rounded-lg border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark placeholder:text-muted">
                            <button type="submit" class="w-full py-2.5 rounded-xl bg-dark hover:bg-black text-white text-[12px] font-bold transition-colors">Save Credentials</button>
                        </form>
                    </div>
                </div>

                <div class="flex gap-2">
                    <form action="{{ route('admin.muas.toggle', $mua) }}" method="POST" class="flex-1">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="w-full py-2.5 rounded-xl {{ $mua->is_available ? 'bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white' : 'bg-emerald-500/10 text-emerald-500 hover:bg-emerald-500 hover:text-white' }} text-[13px] font-bold transition-colors">
                            {{ $mua->is_available ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-16">
            <div class="w-16 h-16 rounded-full bg-cream mx-auto mb-4 flex items-center justify-center text-muted">
                <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            </div>
            <p class="text-[14px] text-muted mb-4">No MUAs added yet</p>
            <a href="{{ route('admin.muas.create') }}" class="inline-flex items-center gap-2 bg-brand text-white px-5 py-2.5 rounded-xl font-bold text-[13px]">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                Add Your First MUA
            </a>
        </div>
    @endforelse
</div>

@endsection

@push('scripts')
<script>
function filterMuaList() {
    const q = document.getElementById('mua-search-input').value.toLowerCase();
    document.querySelectorAll('.mua-card-admin').forEach(card => {
        const matchQ = card.dataset.name.includes(q);
        card.style.display = matchQ ? '' : 'none';
    });
}
</script>
@endpush