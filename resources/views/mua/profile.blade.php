@extends('layouts.mua')
@section('title','My Profile')
@section('page_title','My Profile')
@section('page_meta','Edit your artist profile and portfolio')

@section('content')
<div x-data="muaProfile()" x-cloak>

<div class="max-w-3xl space-y-8">

    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-border bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Profile Information</h4>
        </div>
        <div class="p-6 md:p-8">
            <div class="flex flex-col sm:flex-row items-start gap-6 mb-8 pb-8 border-b border-border">
                <div class="relative group">
                    <div class="w-24 h-24 rounded-full bg-brand/10 flex items-center justify-center text-[28px] font-bold text-brand border-4 border-cream shadow-sm">
                        {{ substr($user->name, 0, 1) }}
                    </div>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-[20px] text-dark mb-1">{{ $user->name }}</h3>
                    <p class="text-[13px] text-muted mb-3 flex items-center gap-1">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="text-brand"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        {{ $muaProfile->location ?? 'Not set' }}
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-1">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-amber-500)"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <span class="text-[13px] font-bold text-dark">{{ $avgRating ?: '-' }}</span>
                            <span class="text-[12px] text-muted">({{ $totalReviews }})</span>
                        </div>
                        @if($muaProfile && $muaProfile->is_available)
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-500 uppercase tracking-wider">Available</span>
                        @else
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-red-500/10 text-red-500 uppercase tracking-wider">Unavailable</span>
                        @endif
                    </div>
                </div>
            </div>

            <form class="space-y-6" action="{{ route('mua.profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="packages" :value="JSON.stringify(packages)">
                <input type="hidden" name="add_ons" :value="JSON.stringify(addons)">
                <input type="hidden" name="available_hours" :value="JSON.stringify(hours)">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Location</label>
                        <input type="text" name="location" value="{{ $muaProfile->location ?? '' }}" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark" placeholder="e.g. Bali">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Email</label>
                        <input type="email" value="{{ $user->email }}" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/50 text-[14px] text-muted cursor-not-allowed" readonly>
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Phone</label>
                        <input type="tel" name="phone" value="{{ $user->phone ?? '' }}" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                    </div>
                </div>
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Bio</label>
                    <textarea name="bio" rows="4" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark resize-y">{{ $muaProfile->bio ?? '' }}</textarea>
                </div>

                <div>
                    <label class="block text-[13px] font-bold text-dark mb-3">Makeup Styles</label>
                    <div class="flex flex-wrap gap-3">
                        @php $currentStyles = $muaProfile->styles ?? []; @endphp
                        @foreach(['Natural','Korean Dewy','Soft Glam','Full Glam','Bridal','Editorial','Bold / Latina','Party','Traditional'] as $style)
                        <label class="style-tag flex items-center gap-2 px-4 py-2 border rounded-full cursor-pointer text-[13px] font-medium transition-colors select-none {{ in_array($style, $currentStyles) ? 'border-brand bg-brand/10 text-brand' : 'border-border text-muted' }}">
                            <input type="checkbox" name="styles[]" value="{{ $style }}" class="w-4 h-4 text-brand border-border rounded focus:ring-brand" {{ in_array($style, $currentStyles) ? 'checked' : '' }}>
                            {{ $style }}
                        </label>
                        @endforeach
                    </div>
                </div>

                <div>
                    <label class="block text-[13px] font-bold text-dark mb-3">Service Packages & Pricing</label>
                    <div class="space-y-4 mb-4">
                        <template x-for="(pkg, index) in packages" :key="index">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4 bg-cream/30 p-4 rounded-xl border border-border">
                                <div class="flex-1">
                                    <input type="text" x-model="pkg.name" placeholder="Package Name" required class="w-full px-4 py-3 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                                </div>
                                <div class="flex-1 relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-muted font-bold text-[14px]">Rp</span>
                                    <input type="number" x-model="pkg.price" placeholder="500000" required min="0" class="w-full pl-11 pr-4 py-3 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                                </div>
                                <button type="button" @click="removePackage(index)" class="w-11 h-11 shrink-0 rounded-xl bg-red-500/10 text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white transition-colors" title="Remove">
                                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </template>
                    </div>
                    <button type="button" @click="addPackage()" class="inline-flex items-center gap-2 bg-cream border border-border hover:border-brand hover:text-brand text-dark px-5 py-2.5 rounded-xl font-bold text-[13px] transition-all">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                        Add New Package
                    </button>
                </div>

                <div>
                    <label class="block text-[13px] font-bold text-dark mb-3">Add-ons</label>
                    <div class="space-y-4 mb-4">
                        <template x-for="(addon, index) in addons" :key="'a'+index">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4 bg-cream/30 p-4 rounded-xl border border-border">
                                <div class="flex-1">
                                    <input type="text" x-model="addon.name" placeholder="Add-on Name" required class="w-full px-4 py-3 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                                </div>
                                <div class="flex-1 relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-muted font-bold text-[14px]">Rp</span>
                                    <input type="number" x-model="addon.price" placeholder="150000" required min="0" class="w-full pl-11 pr-4 py-3 rounded-xl border border-border bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                                </div>
                                <button type="button" @click="removeAddon(index)" class="w-11 h-11 shrink-0 rounded-xl bg-red-500/10 text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white transition-colors" title="Remove">
                                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </template>
                    </div>
                    <button type="button" @click="addAddon()" class="inline-flex items-center gap-2 bg-cream border border-border hover:border-brand hover:text-brand text-dark px-5 py-2.5 rounded-xl font-bold text-[13px] transition-all">
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                        Add New Add-on
                    </button>
                </div>

                <div>
                    <label class="block text-[13px] font-bold text-dark mb-3">Available Booking Hours</label>
                    <div class="flex flex-wrap gap-3">
                        <template x-for="h in allHours" :key="h">
                            <label class="flex items-center gap-2 px-4 py-2 border rounded-full cursor-pointer text-[13px] font-medium transition-colors select-none"
                                   :class="hours.includes(h) ? 'border-brand bg-brand/10 text-brand' : 'border-border text-muted hover:border-brand'">
                                <input type="checkbox" :value="h" @change="toggleHour(h)" :checked="hours.includes(h)" class="hidden">
                                <span x-text="h"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <div class="pt-4 border-t border-border">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="is_available" value="1" {{ ($muaProfile && $muaProfile->is_available) ? 'checked' : '' }} class="w-5 h-5 text-emerald-500 border-border rounded focus:ring-emerald-500">
                        <span class="text-[14px] font-bold text-dark group-hover:text-emerald-500 transition-colors">Available for new bookings</span>
                    </label>
                </div>

                <div class="pt-4 flex items-center gap-4">
                    <button type="submit" class="inline-flex items-center gap-2 bg-dark hover:bg-black text-white px-8 py-3 rounded-xl font-bold text-[14px] transition-all hover:-translate-y-0.5 shadow-md">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                        Save Profile
                    </button>
                </div>
            </form>
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
document.querySelectorAll('.style-tag').forEach(el => {
    const input = el.querySelector('input');
    input.addEventListener('change', () => {
        if (input.checked) {
            el.classList.add('border-brand', 'bg-brand/10', 'text-brand');
            el.classList.remove('border-border', 'text-muted');
        } else {
            el.classList.remove('border-brand', 'bg-brand/10', 'text-brand');
            el.classList.add('border-border', 'text-muted');
        }
    });
});

function muaProfile() {
    let savedPackages = @json($muaProfile->packages ?? [
        ['name' => 'Basic Beauty', 'price' => 500000],
        ['name' => 'Creative Glam', 'price' => 2500000]
    ]);
    let savedAddons = @json($muaProfile->add_ons ?? [
        ['name' => 'Hair Styling', 'price' => 150000]
    ]);
    let savedHours = @json($muaProfile->available_hours ?? ['08:00','09:00','10:00','11:00','13:00','14:00','15:00','16:00']);

    return {
        packages: savedPackages,
        addons: savedAddons,
        hours: savedHours,
        allHours: ['08:00','09:00','10:00','11:00','13:00','14:00','15:00','16:00'],
        addPackage() { this.packages.push({ name: '', price: '' }); },
        removePackage(i) { if(this.packages.length>1) this.packages.splice(i,1); },
        addAddon() { this.addons.push({ name: '', price: '' }); },
        removeAddon(i) { this.addons.splice(i,1); },
        toggleHour(h) {
            if (this.hours.includes(h)) {
                this.hours = this.hours.filter(x => x !== h);
            } else {
                this.hours.push(h);
            }
            this.hours.sort();
        }
    }
}
</script>
@endpush
