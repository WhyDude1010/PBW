@extends('layouts.app')
@section('title', 'Create Account — Beautique MUA')

@section('content')
<div class="min-h-screen grid grid-cols-1 lg:grid-cols-2 bg-cream pt-[72px] lg:pt-[80px]">
    <!-- Left branding panel -->
    <div class="hidden lg:flex flex-col justify-between p-12 relative overflow-hidden bg-linear-to-br from-dark to-dark-muted">
        <div class="absolute top-[-120px] right-[-120px] w-[400px] h-[400px] rounded-full bg-[radial-gradient(circle,rgba(198,147,126,0.2)_0%,transparent_70%)] pointer-events-none"></div>
        <div class="absolute bottom-[-80px] left-[-80px] w-[300px] h-[300px] rounded-full bg-[radial-gradient(circle,rgba(238,215,206,0.12)_0%,transparent_70%)] pointer-events-none"></div>
        
        <div class="relative z-10 flex-1 flex flex-col justify-center max-w-lg mx-auto w-full">
            <h2 class="font-serif text-[44px] font-bold text-white leading-[1.15] mb-6">Join<br>Beautique,<br><em class="text-brand not-italic">Today.</em></h2>
            <p class="text-[15px] text-white/50 leading-[1.85] mb-12">Create your account in under a minute and start discovering Indonesia's finest makeup artists.</p>
            
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-brand"></div>
                    <span class="text-[14px] text-white/60">Free to sign up</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-brand"></div>
                    <span class="text-[14px] text-white/60">Track all your bookings in one place</span>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-2 h-2 rounded-full bg-brand"></div>
                    <span class="text-[14px] text-white/60">Exclusive member-only offers</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right form -->
    <div class="flex flex-col justify-center p-8 sm:p-12 lg:p-16 bg-white w-full overflow-y-auto">
        <div class="w-full max-w-md mx-auto py-8">
            <h3 class="font-serif text-[32px] font-bold text-dark mb-2">Create Account</h3>
            <p class="text-[14.5px] text-muted mb-10">Already have one? <a href="{{ route('login') }}" class="text-brand font-semibold hover:underline">Sign in</a></p>

            <form action="{{ route('register') }}" method="POST" class="space-y-5">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[13.5px] font-bold text-dark mb-2" for="first_name">First Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-muted">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <input id="first_name" name="first_name" type="text" class="w-full pl-11 pr-4 py-3.5 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-4 focus:ring-brand/10 transition-all text-[14.5px] text-dark placeholder:text-muted/60" placeholder="Sari" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-[13.5px] font-bold text-dark mb-2" for="last_name">Last Name</label>
                        <input id="last_name" name="last_name" type="text" class="w-full px-4 py-3.5 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-4 focus:ring-brand/10 transition-all text-[14.5px] text-dark placeholder:text-muted/60" placeholder="Dewi" required>
                    </div>
                </div>

                <div>
                    <label class="block text-[13.5px] font-bold text-dark mb-2" for="reg-email">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-muted">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <input id="reg-email" name="email" type="email" class="w-full pl-11 pr-4 py-3.5 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-4 focus:ring-brand/10 transition-all text-[14.5px] text-dark placeholder:text-muted/60" placeholder="hello@example.com" required autocomplete="email">
                    </div>
                </div>

                <div>
                    <label class="block text-[13.5px] font-bold text-dark mb-2" for="phone">Phone Number</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-muted">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <input id="phone" name="phone" type="tel" class="w-full pl-11 pr-4 py-3.5 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-4 focus:ring-brand/10 transition-all text-[14.5px] text-dark placeholder:text-muted/60" placeholder="+62 812 3456 7890">
                    </div>
                </div>

                <div>
                    <label class="block text-[13.5px] font-bold text-dark mb-2" for="reg-password">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-muted">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input id="reg-password" name="password" type="password" class="w-full pl-11 pr-12 py-3.5 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-4 focus:ring-brand/10 transition-all text-[14.5px] text-dark placeholder:text-muted/60" placeholder="Min 8 characters" required>
                        <button type="button" class="absolute inset-y-0 right-0 pr-4 flex items-center text-muted hover:text-brand focus:outline-none" onclick="togglePass('reg-password', 'reg-icon')" id="show-reg-pass-btn">
                            <svg id="reg-icon" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-[13.5px] font-bold text-dark mb-2" for="password_confirm">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-muted">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <input id="password_confirm" name="password_confirmation" type="password" class="w-full pl-11 pr-4 py-3.5 bg-cream border border-transparent rounded-xl focus:border-brand focus:bg-white focus:ring-4 focus:ring-brand/10 transition-all text-[14.5px] text-dark placeholder:text-muted/60" placeholder="Repeat password" required>
                    </div>
                </div>

                <div class="pt-2">
                    <label class="flex items-start gap-3 cursor-pointer group">
                        <input type="checkbox" name="terms" required class="w-4 h-4 mt-0.5 rounded border-border text-brand focus:ring-brand bg-cream">
                        <span class="text-[13px] text-muted leading-relaxed group-hover:text-dark transition-colors">I agree to the <a href="#" class="text-brand hover:underline font-medium">Terms of Service</a> and <a href="#" class="text-brand hover:underline font-medium">Privacy Policy</a></span>
                    </label>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white py-3.5 rounded-xl font-bold text-[14.5px] transition-all hover:shadow-[0_8px_20px_rgba(199,155,132,0.3)] hover:-translate-y-0.5">
                        Create My Account
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function togglePass(inputId, iconId) {
    const inp = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (inp.type === 'password') { 
        inp.type = 'text'; 
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
    } else { 
        inp.type = 'password'; 
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>';
    }
}
</script>
@endpush
