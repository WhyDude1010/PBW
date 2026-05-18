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
                    <img src="{{ asset('image/model-mua.jpeg') }}" alt="Sarah Wijaya" class="w-24 h-24 rounded-full object-cover border-4 border-cream shadow-sm">
                    <label class="absolute inset-0 rounded-full bg-dark/50 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <input type="file" accept="image/*" class="hidden">
                    </label>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-[20px] text-dark mb-1">Sarah Wijaya</h3>
                    <p class="text-[13px] text-muted mb-3 flex items-center gap-1">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="text-brand"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        Bali, Indonesia
                    </p>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-1">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="var(--color-amber-500)"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <span class="text-[13px] font-bold text-dark">4.9</span>
                            <span class="text-[12px] text-muted">(152)</span>
                        </div>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-500/10 text-emerald-500 uppercase tracking-wider">Available</span>
                    </div>
                </div>
            </div>

            <form class="space-y-6" @submit.prevent="saveProfile()">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Full Name</label>
                        <input type="text" value="Sarah Wijaya" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Location</label>
                        <select class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark cursor-pointer">
                            <option selected>Bali</option><option>Jakarta</option><option>Surabaya</option>
                            <option>Bandung</option><option>Yogyakarta</option><option>Medan</option>
                        </select>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Email</label>
                        <input type="email" value="sarah@beautique.com" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Phone</label>
                        <input type="tel" value="+62 812-3456-7890" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                    </div>
                </div>
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Bio</label>
                    <textarea rows="4" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark resize-y">Professional makeup artist based in Bali with 8+ years of experience specializing in bridal, natural, and Korean dewy looks. Passionate about making every client feel confident and beautiful on their special day.</textarea>
                </div>

                <div>
                    <label class="block text-[13px] font-bold text-dark mb-3">Makeup Styles</label>
                    <div class="flex flex-wrap gap-3">
                        @foreach(['Natural','Korean Dewy','Soft Glam','Full Glam','Bridal','Editorial','Bold / Latina','Party','Traditional'] as $style)
                        <label class="style-tag flex items-center gap-2 px-4 py-2 border rounded-full cursor-pointer text-[13px] font-medium transition-colors select-none {{ in_array($style, ['Natural','Korean Dewy','Bridal']) ? 'border-brand bg-brand/10 text-brand' : 'border-border text-muted' }}">
                            <input type="checkbox" name="styles[]" value="{{ $style }}" class="w-4 h-4 text-brand border-border rounded focus:ring-brand" {{ in_array($style, ['Natural','Korean Dewy','Bridal']) ? 'checked' : '' }}>
                            {{ $style }}
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Price From (Rp)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-muted font-bold text-[14px]">Rp</span>
                            <input type="number" value="500000" class="w-full pl-11 pr-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Price Up To (Rp)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-muted font-bold text-[14px]">Rp</span>
                            <input type="number" value="15000000" class="w-full pl-11 pr-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-border">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" checked class="w-5 h-5 text-emerald-500 border-border rounded focus:ring-emerald-500">
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

    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-border bg-cream/30 flex items-center justify-between">
            <h4 class="font-bold text-[16px] text-dark">Portfolio</h4>
            <label class="inline-flex items-center gap-2 bg-brand hover:bg-brand-dark text-white px-4 py-2 rounded-xl font-bold text-[13px] transition-all cursor-pointer">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                Add Photo
                <input type="file" accept="image/*" class="hidden" multiple>
            </label>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach(['model-mua.jpeg','about-mua.jpeg','makeup1.jpeg','model-mua.jpeg','about-mua.jpeg','makeup1.jpeg'] as $img)
                <div class="relative group rounded-xl overflow-hidden aspect-square">
                    <img src="{{ asset('image/' . $img) }}" alt="Portfolio" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <div class="absolute inset-0 bg-dark/0 group-hover:bg-dark/40 transition-colors flex items-center justify-center">
                        <button class="w-9 h-9 rounded-full bg-white/90 text-red-500 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity" title="Remove">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </div>
                </div>
                @endforeach
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
    return {
        toast: false,
        toastMsg: '',
        saveProfile() {
            this.showToast('Profile saved successfully');
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
