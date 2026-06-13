@extends('layouts.admin')
@section('title','Profile')
@section('page_title','Profile')
@section('page_meta','Manage your admin account')

@section('content')
<div class="max-w-3xl">

    @if(session('sukses'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-[13px] font-medium mb-6">{{ session('sukses') }}</div>
    @endif

    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden mb-8">
        <div class="px-6 py-5 border-b border-border bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Account Information</h4>
        </div>
        <div class="p-6 md:p-8">
            <div class="flex flex-col sm:flex-row items-start gap-6 mb-8 pb-8 border-b border-border">
                <div class="w-24 h-24 rounded-full bg-dark text-white flex items-center justify-center text-[32px] font-bold font-serif">{{ substr($user->name, 0, 1) }}</div>
                <div class="flex-1">
                    <h3 class="font-bold text-[20px] text-dark mb-1">{{ $user->name }}</h3>
                    <p class="text-[13px] text-muted mb-3">{{ $user->email }}</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-brand/10 text-brand uppercase tracking-wider">Admin</span>
                </div>
            </div>

            <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark" required>
                        @error('name')<p class="text-red-500 text-[12px] mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark" required>
                        @error('email')<p class="text-red-500 text-[12px] mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Phone Number</label>
                        <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Role</label>
                        <input type="text" value="Administrator" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/50 text-[14px] text-muted cursor-not-allowed" readonly>
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit" class="inline-flex items-center gap-2 bg-dark hover:bg-black text-white px-8 py-3 rounded-xl font-bold text-[14px] transition-all hover:-translate-y-0.5 shadow-md">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-border bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Change Password</h4>
        </div>
        <div class="p-6 md:p-8">
            <form action="{{ route('admin.profile.password') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Current Password</label>
                    <input type="password" name="current_password" placeholder="Current Password" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-muted" required>
                    @error('current_password')<p class="text-red-500 text-[12px] mt-1">{{ $message }}</p>@enderror
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">New Password</label>
                        <input type="password" name="password" placeholder="New Password" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-muted" required>
                        @error('password')<p class="text-red-500 text-[12px] mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Confirm New Password</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-muted" required>
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit" class="inline-flex items-center gap-2 bg-brand hover:bg-brand-dark text-white px-8 py-3 rounded-xl font-bold text-[14px] transition-all hover:-translate-y-0.5">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
