<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Beautique</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,700&family=Inter:wght@300;400;500;600;700&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-dark min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-[420px]">
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-brand/10 mb-5">
                <svg width="28" height="28" fill="none" stroke="#C79B84" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z"/>
                </svg>
            </div>
            <h1 class="font-serif text-[28px] font-bold text-white mb-2">Admin Portal</h1>
            <p class="text-[13.5px] text-white/40">Administrator access only</p>
        </div>

        <div class="bg-dark-muted border border-white/[0.06] rounded-2xl p-8">
            @if(session('sukses'))
                <div class="bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 px-4 py-3 rounded-xl text-[13px] font-medium mb-6">{{ session('sukses') }}</div>
            @endif
            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/20 text-red-400 px-4 py-3 rounded-xl text-[13px] font-medium mb-6">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-[13px] font-semibold text-white/60 mb-2" for="admin-email">Email</label>
                    <input id="admin-email" name="email" type="email" value="{{ old('email') }}"
                        class="w-full px-4 py-3.5 bg-white/[0.04] border border-white/[0.08] rounded-xl text-[14px] text-white placeholder:text-white/20 focus:border-brand focus:ring-2 focus:ring-brand/20 focus:bg-white/[0.06] transition-all outline-none"
                        placeholder="Email" required autocomplete="email">
                </div>

                <div>
                    <label class="block text-[13px] font-semibold text-white/60 mb-2" for="admin-password">Password</label>
                    <div class="relative">
                        <input id="admin-password" name="password" type="password"
                            class="w-full px-4 py-3.5 pr-12 bg-white/[0.04] border border-white/[0.08] rounded-xl text-[14px] text-white placeholder:text-white/20 focus:border-brand focus:ring-2 focus:ring-brand/20 focus:bg-white/[0.06] transition-all outline-none"
                            placeholder="Password" required autocomplete="current-password">
                        <button type="button" onclick="togglePass()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-white/30 hover:text-brand transition-colors">
                            <svg id="pass-icon" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path></svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-center pt-1">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-white/10 bg-white/5 text-brand focus:ring-brand/30">
                        <span class="text-[13px] text-white/40 group-hover:text-white/60 transition-colors">Remember me</span>
                    </label>
                </div>

                <button type="submit" class="w-full flex items-center justify-center gap-2 bg-brand hover:bg-brand-dark text-white py-3.5 rounded-xl font-bold text-[14px] transition-all hover:shadow-[0_8px_24px_rgba(199,155,132,0.25)] mt-2">
                    Sign In
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7"></path></svg>
                </button>
            </form>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('landing') }}" class="text-[13px] text-white/30 hover:text-brand transition-colors">← Back to website</a>
        </div>
    </div>

<script>
function togglePass() {
    const inp = document.getElementById('admin-password');
    const icon = document.getElementById('pass-icon');
    if (inp.type === 'password') {
        inp.type = 'text';
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>';
    } else {
        inp.type = 'password';
        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>';
    }
}
</script>
</body>
</html>
