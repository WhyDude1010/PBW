@extends('layouts.admin')
@section('title','Settings')
@section('page_title','Settings')
@section('page_meta','Configure your admin panel preferences')

@section('content')
<div x-data="settingsPage()" x-cloak>

<div class="max-w-3xl space-y-8">

    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-border bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">General Settings</h4>
        </div>
        <div class="p-6 md:p-8 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Business Name</label>
                    <input type="text" value="Beautique MUA" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                </div>
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Contact Email</label>
                    <input type="email" value="hello@beautique.com" class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Currency</label>
                    <select class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark cursor-pointer">
                        <option selected>IDR — Indonesian Rupiah</option>
                        <option>USD — US Dollar</option>
                        <option>SGD — Singapore Dollar</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Timezone</label>
                    <select class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark cursor-pointer">
                        <option selected>Asia/Jakarta (WIB, UTC+7)</option>
                        <option>Asia/Makassar (WITA, UTC+8)</option>
                        <option>Asia/Jayapura (WIT, UTC+9)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-border bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Notifications</h4>
        </div>
        <div class="divide-y divide-border">
            <label class="flex items-center justify-between p-6 cursor-pointer hover:bg-cream/30 transition-colors">
                <div>
                    <div class="font-bold text-[14px] text-dark mb-1">New Booking Alerts</div>
                    <div class="text-[12px] text-muted">Receive notifications when a new booking is made</div>
                </div>
                <div class="relative">
                    <input type="checkbox" checked class="sr-only peer">
                    <div class="w-11 h-6 bg-border rounded-full peer-checked:bg-brand transition-colors"></div>
                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow-sm peer-checked:translate-x-5 transition-transform"></div>
                </div>
            </label>
            <label class="flex items-center justify-between p-6 cursor-pointer hover:bg-cream/30 transition-colors">
                <div>
                    <div class="font-bold text-[14px] text-dark mb-1">Review Submissions</div>
                    <div class="text-[12px] text-muted">Get notified when clients submit new reviews</div>
                </div>
                <div class="relative">
                    <input type="checkbox" checked class="sr-only peer">
                    <div class="w-11 h-6 bg-border rounded-full peer-checked:bg-brand transition-colors"></div>
                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow-sm peer-checked:translate-x-5 transition-transform"></div>
                </div>
            </label>
            <label class="flex items-center justify-between p-6 cursor-pointer hover:bg-cream/30 transition-colors">
                <div>
                    <div class="font-bold text-[14px] text-dark mb-1">Payment Confirmations</div>
                    <div class="text-[12px] text-muted">Receive email when payments are completed</div>
                </div>
                <div class="relative">
                    <input type="checkbox" class="sr-only peer">
                    <div class="w-11 h-6 bg-border rounded-full peer-checked:bg-brand transition-colors"></div>
                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow-sm peer-checked:translate-x-5 transition-transform"></div>
                </div>
            </label>
            <label class="flex items-center justify-between p-6 cursor-pointer hover:bg-cream/30 transition-colors">
                <div>
                    <div class="font-bold text-[14px] text-dark mb-1">Weekly Summary Report</div>
                    <div class="text-[12px] text-muted">Receive a weekly digest of bookings and revenue</div>
                </div>
                <div class="relative">
                    <input type="checkbox" checked class="sr-only peer">
                    <div class="w-11 h-6 bg-border rounded-full peer-checked:bg-brand transition-colors"></div>
                    <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow-sm peer-checked:translate-x-5 transition-transform"></div>
                </div>
            </label>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-border shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-border bg-cream/30">
            <h4 class="font-bold text-[16px] text-dark">Booking Preferences</h4>
        </div>
        <div class="p-6 md:p-8 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Auto-confirm Bookings</label>
                    <select class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark cursor-pointer">
                        <option>Manual Approval Required</option>
                        <option>Auto-confirm All</option>
                        <option>Auto-confirm Returning Clients</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[13px] font-bold text-dark mb-2">Cancellation Policy</label>
                    <select class="w-full px-4 py-3 rounded-xl border border-border bg-cream/30 focus:bg-white focus:border-brand focus:ring-2 focus:ring-brand/20 transition-all text-[14px] text-dark cursor-pointer">
                        <option>24 hours before appointment</option>
                        <option>48 hours before appointment</option>
                        <option>72 hours before appointment</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="flex items-center gap-4 pb-8">
        <button @click="saveSettings()" class="inline-flex items-center gap-2 bg-dark hover:bg-black text-white px-8 py-3 rounded-xl font-bold text-[14px] transition-all hover:-translate-y-0.5 shadow-md">
            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
            Save Settings
        </button>
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
function settingsPage() {
    return {
        toast: false,
        toastMsg: '',
        saveSettings() {
            this.showToast('Settings saved successfully');
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
