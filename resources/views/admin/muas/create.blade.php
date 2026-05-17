@extends('layouts.admin')
@section('title','Add New MUA')
@section('page_title','Add New MUA')
@section('page_meta','Create a new makeup artist profile')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Artist Profile</h4>
            <a href="{{ route('admin.muas.index') }}" class="text-[13px] font-bold text-muted hover:text-dark flex items-center gap-1 transition-colors">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to list
            </a>
        </div>
        
        <div class="p-6 md:p-8">
            <form action="{{ route('admin.muas.index') }}" method="POST" enctype="multipart/form-data" class="space-y-6 md:space-y-8">
                @csrf
                
                <!-- Photo Upload -->
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-3">Profile Photo</label>
                    <div id="drop-zone" class="border-2 border-dashed border-border rounded-2xl p-10 text-center cursor-pointer hover:border-brand hover:bg-cream/50 transition-all group" onclick="document.getElementById('photo-input').click()">
                        <div class="w-16 h-16 mx-auto bg-cream rounded-full flex items-center justify-center text-muted group-hover:text-brand group-hover:bg-brand/10 transition-colors mb-3">
                            <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <p class="text-[14px] font-medium text-muted mb-1">Click to upload photo or drag &amp; drop</p>
                        <p class="text-[12px] text-brand-dark/60">PNG, JPG up to 5MB</p>
                        <input type="file" id="photo-input" name="photo" accept="image/*" class="hidden" onchange="previewPhoto(this)">
                    </div>
                    <div class="mt-4 hidden" id="photo-preview-container">
                        <img id="photo-preview" src="" alt="Preview" class="w-24 h-24 rounded-full object-cover border-4 border-cream shadow-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2" for="mua-name">Full Name <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-muted w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <input id="mua-name" name="name" type="text" class="w-full pl-11 pr-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-brand-dark/60" placeholder="e.g. Sarah Wijaya" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2" for="mua-location">Location <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-muted w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <select id="mua-location" name="location" class="w-full pl-11 pr-10 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark appearance-none cursor-pointer" required>
                                <option value="">Select city…</option>
                                <option>Bali</option><option>Jakarta</option><option>Surabaya</option>
                                <option>Bandung</option><option>Yogyakarta</option><option>Medan</option>
                            </select>
                            <svg class="absolute right-4 top-1/2 -translate-y-1/2 text-muted w-4 h-4 pointer-events-none" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2" for="mua-email">Contact Email <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-muted w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <input id="mua-email" name="email" type="email" class="w-full pl-11 pr-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-brand-dark/60" placeholder="artist@example.com" required>
                    </div>
                </div>

                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2" for="mua-bio">Bio / About</label>
                    <textarea id="mua-bio" name="bio" rows="4" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-brand-dark/60 resize-y" placeholder="Write a short introduction about this artist…"></textarea>
                </div>

                <div>
                    <label class="block text-[13px] font-bold text-dark mb-3">Makeup Styles <span class="text-red-500">*</span></label>
                    <div class="flex flex-wrap gap-3">
                        @foreach(['Natural','Korean Dewy','Soft Glam','Full Glam','Bridal','Editorial','Bold / Latina','Party','Traditional'] as $style)
                        <label class="style-check-wrap flex items-center gap-2 px-4 py-2 border border-border rounded-full cursor-pointer text-[13px] font-medium text-muted transition-colors select-none">
                            <input type="checkbox" name="styles[]" value="{{ $style }}" class="w-4 h-4 text-brand border-border rounded focus:ring-brand"> 
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
                            <input name="price_min" type="number" class="w-full pl-11 pr-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-brand-dark/60" placeholder="500000">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Price Up To (Rp)</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-muted font-bold text-[14px]">Rp</span>
                            <input name="price_max" type="number" class="w-full pl-11 pr-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-brand-dark/60" placeholder="15000000">
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-border">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="is_available" value="1" checked class="w-5 h-5 text-emerald-500 border-border rounded focus:ring-emerald-500"> 
                        <span class="text-[14px] font-bold text-dark group-hover:text-emerald-500 transition-colors">Mark as Available immediately</span>
                    </label>
                </div>

                <div class="flex items-center gap-4 pt-4">
                    <button type="submit" class="inline-flex items-center justify-center gap-2 bg-dark hover:bg-black text-white px-8 py-3.5 rounded-xl font-bold text-[14px] transition-all shadow-md hover:-translate-y-0.5">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                        Save Artist
                    </button>
                    <a href="{{ route('admin.muas.index') }}" class="px-6 py-3.5 rounded-xl text-[14px] font-bold text-muted hover:text-dark hover:bg-cream transition-all">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewPhoto(input){
    if(!input.files || !input.files[0]) return;
    const reader = new FileReader();
    reader.onload = e => {
        const prev = document.getElementById('photo-preview');
        const container = document.getElementById('photo-preview-container');
        prev.src = e.target.result;
        container.classList.remove('hidden');
    };
    reader.readAsDataURL(input.files[0]);
}

// Style checkbox visual
document.querySelectorAll('.style-check-wrap').forEach(el => {
    const input = el.querySelector('input');
    
    // Initial state
    if(input.checked) {
        el.classList.add('border-brand', 'bg-brand/10', 'text-brand');
        el.classList.remove('border-border', 'text-muted');
    }

    input.addEventListener('change', () => {
        if(input.checked) {
            el.classList.add('border-brand', 'bg-brand/10', 'text-brand');
            el.classList.remove('border-border', 'text-muted');
        } else {
            el.classList.remove('border-brand', 'bg-brand/10', 'text-brand');
            el.classList.add('border-border', 'text-muted');
        }
    });
});
</script>
@endpush
