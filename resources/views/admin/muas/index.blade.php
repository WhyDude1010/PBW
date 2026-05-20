@extends('layouts.admin')
@section('title', 'MUA Artists')
@section('page_title', 'MUA Artists')
@section('page_meta', 'Manage your roster of makeup artists')

@section('content')
<div x-data="muaPage()" x-cloak>

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-8">
        <h3 class="font-bold text-[18px] text-dark">
            All Artists <span class="text-[14px] font-medium text-muted">(52 total)</span>
        </h3>
        <div class="flex flex-col sm:flex-row gap-3 sm:items-center">
            <div class="relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-muted w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <input type="text" placeholder="Search artist…" id="mua-search-input" oninput="filterMuaList()" class="pl-9 pr-4 py-2.5 w-full sm:w-64 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark placeholder:text-muted">
            </div>
            <select id="mua-category-filter" onchange="filterMuaList()" class="px-4 py-2.5 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[13px] text-dark cursor-pointer">
                <option value="">All Categories</option>
                <option value="Bridal">Bridal</option>
                <option value="Natural">Natural</option>
                <option value="Korean Dewy">Korean Dewy</option>
                <option value="Glam">Glam</option>
                <option value="Soft Glam">Soft Glam</option>
                <option value="Editorial">Editorial</option>
                <option value="Bold">Bold</option>
                <option value="Party">Party</option>
                <option value="Traditional">Traditional</option>
                <option value="Fashion">Fashion</option>
            </select>
            <a href="{{ route('admin.muas.create') }}" class="inline-flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white px-5 py-2.5 rounded-xl font-bold text-[13px] transition-all hover:shadow-[0_4px_12px_rgba(199,155,132,0.3)] hover:-translate-y-0.5">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
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
        @foreach($muas as $idx => $m)
            <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden group hover:border-brand transition-all mua-card-admin" data-name="{{ strtolower($m[0]) }}" data-category="{{ strtolower($m[2]) }}" id="mua-card-{{ $idx }}">
                <div class="h-32 relative overflow-hidden">
                    <img src="{{ asset('image/' . $m[5]) }}" alt="{{ $m[0] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-linear-to-t from-black/50 to-transparent"></div>
                    <div class="absolute top-3 right-3" id="mua-badge-{{ $idx }}">
                        @if($m[6])
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/90 backdrop-blur-md text-white shadow-sm tracking-wider uppercase">Available</span>
                        @else
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-red-500/90 backdrop-blur-md text-white shadow-sm tracking-wider uppercase">Unavailable</span>
                        @endif
                    </div>
                </div>

                <div class="p-5 pt-2 relative">
                    <div class="flex items-end gap-3 mb-4 -mt-5">
                        <img src="{{ asset('image/' . $m[5]) }}" alt="{{ $m[0] }}" class="w-16 h-16 rounded-full object-cover border-4 border-white shadow-sm relative z-10 shrink-0">
                        <div class="pb-1">
                            <div class="font-bold text-[16px] text-dark leading-tight mb-1">{{ $m[0] }}</div>
                            <div class="text-[12px] text-muted flex items-center gap-1 font-medium">
                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="text-brand"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $m[1] }}
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap gap-1.5 mb-4">
                        @foreach(explode(', ', $m[2]) as $tag)
                            <span class="px-2.5 py-1 rounded-full bg-cream text-muted text-[10px] font-bold tracking-wide">{{ $tag }}</span>
                        @endforeach
                    </div>

                    <div class="flex items-center justify-between mb-5 px-3 py-2 bg-cream/50 rounded-xl border border-border/50">
                        <div class="flex items-center gap-1.5">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-amber-500)"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <span class="text-[13px] font-bold text-dark">{{ $m[3] }}</span>
                        </div>
                        <div class="w-px h-4 bg-border"></div>
                        <div class="text-[12px] font-medium text-muted">
                            <span class="font-bold text-dark">{{ $m[4] }}</span> bookings
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button @click="openEdit({{ $idx }}, '{{ $m[0] }}', '{{ $m[1] }}', '{{ $m[2] }}', '{{ $m[3] }}', '{{ $m[4] }}', {{ $m[6] ? 'true' : 'false' }})" class="flex-1 py-2.5 rounded-xl border border-border bg-white text-[13px] font-bold text-dark hover:border-brand hover:text-brand transition-colors">
                            Edit
                        </button>
                        <button @click="toggleAvailability({{ $idx }}, '{{ $m[0] }}', {{ $m[6] ? 'true' : 'false' }})" class="flex-1 py-2.5 rounded-xl bg-brand/10 text-[13px] font-bold text-brand hover:bg-brand hover:text-white transition-colors" id="mua-toggle-btn-{{ $idx }}">
                            {{ $m[6] ? 'Deactivate' : 'Activate' }}
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div x-show="editModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display:none">
        <div class="absolute inset-0 bg-dark/40 backdrop-blur-sm" @click="editModal = false"></div>
        <div x-show="editModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="relative bg-white rounded-2xl border border-border shadow-xl w-full max-w-lg overflow-hidden max-h-[90vh] overflow-y-auto">
            <div class="px-6 py-5 border-b border-border flex items-center justify-between bg-cream/30 sticky top-0 z-10">
                <h4 class="font-bold text-[16px] text-dark">Edit MUA Profile</h4>
                <button @click="editModal = false" class="w-8 h-8 rounded-lg bg-cream text-muted hover:bg-dark hover:text-white flex items-center justify-center transition-colors">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Full Name</label>
                    <input type="text" x-model="form.name" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                </div>
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Location</label>
                    <select x-model="form.location" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark cursor-pointer">
                        <option>Bali</option><option>Jakarta</option><option>Surabaya</option>
                        <option>Bandung</option><option>Yogyakarta</option><option>Medan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Specialties</label>
                    <input type="text" x-model="form.styles" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                    <p class="text-[11px] text-muted mt-1">Separate with commas</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Rating</label>
                        <input type="text" x-model="form.rating" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 text-[14px] text-dark" readonly>
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Total Bookings</label>
                        <input type="text" x-model="form.bookings" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 text-[14px] text-dark" readonly>
                    </div>
                </div>
            </div>
            <div class="px-6 py-4 border-t border-border bg-cream/30 flex items-center justify-end gap-3 sticky bottom-0">
                <button @click="editModal = false" class="px-5 py-2.5 rounded-xl text-[13px] font-bold text-muted hover:text-dark hover:bg-cream transition-colors">Cancel</button>
                <button @click="saveEdit()" class="px-5 py-2.5 rounded-xl bg-dark text-white text-[13px] font-bold hover:bg-black transition-colors">Save Changes</button>
            </div>
        </div>
    </div>

    <div x-show="confirmModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" class="fixed inset-0 z-50 flex items-center justify-center p-4" style="display:none">
        <div class="absolute inset-0 bg-dark/40 backdrop-blur-sm" @click="confirmModal = false"></div>
        <div x-show="confirmModal" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="relative bg-white rounded-2xl border border-border shadow-xl w-full max-w-sm overflow-hidden">
            <div class="p-6 text-center">
                <div class="w-14 h-14 rounded-full mx-auto mb-4 flex items-center justify-center" :class="confirmAction.active ? 'bg-red-500/10 text-red-500' : 'bg-emerald-500/10 text-emerald-500'">
                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path></svg>
                </div>
                <h4 class="font-bold text-[16px] text-dark mb-2" x-text="confirmAction.active ? 'Deactivate Artist?' : 'Activate Artist?'"></h4>
                <p class="text-[13px] text-muted mb-6">Are you sure you want to <span x-text="confirmAction.active ? 'deactivate' : 'activate'"></span> <span class="font-bold text-dark" x-text="confirmAction.name"></span>?</p>
                <div class="flex gap-3">
                    <button @click="confirmModal = false" class="flex-1 py-2.5 rounded-xl border border-border text-[13px] font-bold text-muted hover:text-dark hover:border-dark/30 transition-colors">Cancel</button>
                    <button @click="confirmToggle()" class="flex-1 py-2.5 rounded-xl text-[13px] font-bold text-white transition-colors" :class="confirmAction.active ? 'bg-red-500 hover:bg-red-600' : 'bg-emerald-500 hover:bg-emerald-600'" x-text="confirmAction.active ? 'Deactivate' : 'Activate'"></button>
                </div>
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
function filterMuaList() {
    const q = document.getElementById('mua-search-input').value.toLowerCase();
    const c = document.getElementById('mua-category-filter') ? document.getElementById('mua-category-filter').value.toLowerCase() : '';
    document.querySelectorAll('.mua-card-admin').forEach(card => {
        const matchQ = card.dataset.name.includes(q);
        const matchC = !c || (card.dataset.category && card.dataset.category.includes(c));
        card.style.display = (matchQ && matchC) ? '' : 'none';
    });
}

function muaPage() {
    return {
        editModal: false,
        confirmModal: false,
        toast: false,
        toastMsg: '',
        form: { idx: 0, name: '', location: '', styles: '', rating: '', bookings: '', active: true },
        confirmAction: { idx: 0, name: '', active: true },

        openEdit(idx, name, location, styles, rating, bookings, active) {
            this.form = { idx, name, location, styles, rating, bookings, active };
            this.editModal = true;
        },

        saveEdit() {
            const card = document.getElementById('mua-card-' + this.form.idx);
            const nameEl = card.querySelector('.font-bold.text-\\[16px\\]');
            if (nameEl) nameEl.textContent = this.form.name;
            this.editModal = false;
            this.showToast('Profile updated for ' + this.form.name);
        },

        toggleAvailability(idx, name, active) {
            this.confirmAction = { idx, name, active };
            this.confirmModal = true;
        },

        confirmToggle() {
            const idx = this.confirmAction.idx;
            const wasActive = this.confirmAction.active;
            const badge = document.getElementById('mua-badge-' + idx);
            const btn = document.getElementById('mua-toggle-btn-' + idx);

            if (wasActive) {
                badge.innerHTML = '<span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-red-500/90 backdrop-blur-md text-white shadow-sm tracking-wider uppercase">Unavailable</span>';
                btn.textContent = 'Activate';
                btn.onclick = () => this.toggleAvailability(idx, this.confirmAction.name, false);
            } else {
                badge.innerHTML = '<span class="px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/90 backdrop-blur-md text-white shadow-sm tracking-wider uppercase">Available</span>';
                btn.textContent = 'Deactivate';
                btn.onclick = () => this.toggleAvailability(idx, this.confirmAction.name, true);
            }

            this.confirmModal = false;
            this.showToast(this.confirmAction.name + (wasActive ? ' deactivated' : ' activated'));
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