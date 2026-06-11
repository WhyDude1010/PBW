@extends('layouts.admin')
@section('title', $package ? 'Edit Package' : 'New Package')
@section('page_title', $package ? 'Edit Package' : 'New Package')
@section('page_meta', $package ? 'Update package details and pricing' : 'Create a new pricing package')

@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-border flex items-center justify-between bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Package Details</h4>
            <a href="{{ route('admin.packages.index') }}" class="text-[13px] font-bold text-muted hover:text-dark flex items-center gap-1 transition-colors">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to list
            </a>
        </div>

        <div class="p-6 md:p-8">
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-[13px] font-medium mb-6">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ $package ? route('admin.packages.update', $package) : route('admin.packages.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @if($package) @method('PUT') @endif

                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2" for="pkg-name">Package Name <span class="text-red-500">*</span></label>
                    <input id="pkg-name" name="name" type="text" value="{{ old('name', $package->name ?? '') }}" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-brand-dark/60" placeholder="e.g. Basic Beauty" required>
                </div>

                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2" for="pkg-desc">Description</label>
                    <textarea id="pkg-desc" name="description" rows="2" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-brand-dark/60 resize-y" placeholder="Short description…">{{ old('description', $package->description ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2" for="pkg-features">Features <span class="text-red-500">*</span></label>
                    <textarea id="pkg-features" name="features" rows="4" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-brand-dark/60 resize-y" placeholder="One feature per line" required>{{ old('features', $package ? implode("\n", $package->features ?? []) : '') }}</textarea>
                    <p class="text-[11px] text-muted mt-1">One feature per line</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2" for="pkg-price">Price (Rp) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-muted font-bold text-[14px]">Rp</span>
                            <input id="pkg-price" name="price" type="number" value="{{ old('price', $package->price ?? '') }}" class="w-full pl-11 pr-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark" placeholder="500000" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2" for="pkg-order">Sort Order</label>
                        <input id="pkg-order" name="sort_order" type="number" value="{{ old('sort_order', $package->sort_order ?? 0) }}" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                    </div>
                </div>

                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Package Image</label>
                    <input type="file" name="image" accept="image/*" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 text-[14px] text-dark file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-[12px] file:font-bold file:bg-brand/10 file:text-brand">
                    @if($package && $package->image)
                        <img src="{{ asset('storage/' . $package->image) }}" alt="" class="mt-3 h-24 rounded-xl object-cover">
                    @endif
                </div>

                <div class="pt-2">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $package->is_featured ?? false) ? 'checked' : '' }} class="w-5 h-5 text-brand border-border rounded focus:ring-brand">
                        <span class="text-[14px] font-bold text-dark group-hover:text-brand transition-colors">Mark as Featured (Best Choice)</span>
                    </label>
                </div>

                <div class="flex items-center gap-4 pt-4 border-t border-border">
                    <button type="submit" class="inline-flex items-center justify-center gap-2 bg-dark hover:bg-black text-white px-8 py-3.5 rounded-xl font-bold text-[14px] transition-all shadow-md hover:-translate-y-0.5">
                        {{ $package ? 'Update Package' : 'Create Package' }}
                    </button>
                    <a href="{{ route('admin.packages.index') }}" class="px-6 py-3.5 rounded-xl text-[14px] font-bold text-muted hover:text-dark hover:bg-cream transition-all">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
