@extends('layouts.admin')
@section('title','Profile')
@section('page_title','Profile')
@section('page_meta','Manage your admin account')

@section('content')
<div x-data="profilePage()" x-cloak>

<div class="max-w-3xl">
    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden mb-8">
        <div class="px-6 py-5 border-b border-border bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Account Information</h4>
        </div>
        <div class="p-6 md:p-8">
            <div class="flex flex-col sm:flex-row items-start gap-6 mb-8 pb-8 border-b border-border">
                <div class="relative group">
                    <div class="w-24 h-24 rounded-full bg-dark text-white flex items-center justify-center text-[32px] font-bold font-serif">A</div>
                    <label class="absolute inset-0 rounded-full bg-dark/50 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <input type="file" accept="image/*" class="hidden">
                    </label>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-[20px] text-dark mb-1">Administrator</h3>
                    <p class="text-[13px] text-muted mb-3">admin@beautique.com</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold bg-brand/10 text-brand uppercase tracking-wider">Super Admin</span>
                </div>
            </div>

            <form class="space-y-6" @submit.prevent="saveProfile()">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Full Name</label>
                        <div class="relative">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-muted w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <input type="text" value="Admin Beautique" class="w-full pl-11 pr-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Email Address</label>
                        <div class="relative">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-muted w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <input type="email" value="admin@beautique.com" class="w-full pl-11 pr-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Phone Number</label>
                        <div class="relative">
                            <svg class="absolute left-4 top-1/2 -translate-y-1/2 text-muted w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <input type="tel" value="+62 812-0000-0000" class="w-full pl-11 pr-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                        </div>
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Role</label>
                        <input type="text" value="Super Admin" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/50 text-[14px] text-muted cursor-not-allowed" readonly>
                    </div>
                </div>
                <div class="pt-4 flex items-center gap-4">
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
            <form class="space-y-6" @submit.prevent="changePassword()">
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Current Password</label>
                    <input type="password" placeholder="Enter current password" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-muted">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">New Password</label>
                        <input type="password" placeholder="Enter new password" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-muted">
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-dark mb-2">Confirm New Password</label>
                        <input type="password" placeholder="Confirm new password" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark placeholder:text-muted">
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

<div x-show="toast" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" class="fixed bottom-6 right-6 z-50 flex items-center gap-3 bg-dark text-white px-5 py-3.5 rounded-xl shadow-lg" style="display:none">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    <span class="text-[13px] font-bold" x-text="toastMsg"></span>
</div>

</div>
@endsection

@push('scripts')
<script>
function profilePage() {
    return {
        toast: false,
        toastMsg: '',
        saveProfile() {
            this.showToast('Profile updated successfully');
        },
        changePassword() {
            this.showToast('Password changed successfully');
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
