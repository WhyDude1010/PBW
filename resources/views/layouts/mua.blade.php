<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Beautique MUA — Artist Studio">
    <title>@yield('title', 'Studio') — Beautique</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @stack('head')
    <style>
        [x-cloak] { display: none !important; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--color-border); border-radius: 6px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--color-brand); }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-cream font-sans text-dark antialiased min-h-screen flex" x-data="{ sidebarOpen: false }">

    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-dark/50 z-40 lg:hidden" @click="sidebarOpen = false"></div>

    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-white border-r border-border transition-transform duration-300 ease-in-out lg:translate-x-0 flex flex-col">

        <div class="h-20 flex items-center px-6 border-b border-border">
            <a href="{{ route('mua.dashboard') }}" class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-brand/10 text-brand flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg>
                </div>
                <div>
                    <h1 class="font-serif font-bold text-[18px] leading-tight text-dark">Beautique</h1>
                    <span class="text-[10px] uppercase tracking-wider text-brand font-bold block">Artist Studio</span>
                </div>
            </a>
            <button @click="sidebarOpen = false" class="ml-auto lg:hidden text-muted">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-8">

            <div>
                <div class="text-[11px] font-bold text-muted uppercase tracking-wider mb-3 px-3">Overview</div>
                <a href="{{ route('mua.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('mua.dashboard') ? 'bg-brand/10 text-brand font-semibold' : 'text-muted hover:bg-cream hover:text-dark' }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="text-[14px]">Dashboard</span>
                </a>
            </div>

            <div>
                <div class="text-[11px] font-bold text-muted uppercase tracking-wider mb-3 px-3">Work</div>
                <div class="space-y-1">
                    <a href="{{ route('mua.bookings') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('mua.bookings') ? 'bg-brand/10 text-brand font-semibold' : 'text-muted hover:bg-cream hover:text-dark' }}">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="text-[14px]">My Bookings</span>
                    </a>
                    <a href="{{ route('mua.schedule') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('mua.schedule') ? 'bg-brand/10 text-brand font-semibold' : 'text-muted hover:bg-cream hover:text-dark' }}">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-[14px]">Schedule</span>
                    </a>
                </div>
            </div>

            <div>
                <div class="text-[11px] font-bold text-muted uppercase tracking-wider mb-3 px-3">Account</div>
                <div class="space-y-1">
                    <a href="{{ route('mua.profile') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('mua.profile') ? 'bg-brand/10 text-brand font-semibold' : 'text-muted hover:bg-cream hover:text-dark' }}">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="text-[14px]">My Profile</span>
                    </a>
                    <a href="{{ route('mua.reviews') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('mua.reviews') ? 'bg-brand/10 text-brand font-semibold' : 'text-muted hover:bg-cream hover:text-dark' }}">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                        <span class="text-[14px]">My Reviews</span>
                    </a>
                </div>
            </div>

        </div>

        <div class="p-4 border-t border-border">
            <a href="{{ route('landing') }}" target="_blank" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl text-[13px] font-bold text-muted border border-border hover:border-brand hover:text-brand transition-all">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                View Live Site
            </a>
        </div>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">

        <header class="h-20 bg-white border-b border-border flex items-center justify-between px-6 lg:px-10 shrink-0">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" class="lg:hidden text-dark">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div>
                    <h2 class="font-serif text-[20px] lg:text-[24px] font-bold text-dark">@yield('page_title', 'Dashboard')</h2>
                    <p class="text-[13px] text-muted hidden sm:block">@yield('page_meta', 'Beautique Artist Studio')</p>
                </div>
            </div>

            <div class="relative" x-data="{ profileOpen: false }">
                <button @click="profileOpen = !profileOpen" class="flex items-center gap-3 px-3 py-1.5 rounded-full border border-border hover:border-brand cursor-pointer transition-colors bg-cream/50">
                    <div class="w-8 h-8 rounded-full bg-brand text-white flex items-center justify-center font-bold text-[13px]">{{ substr(auth()->user()->name, 0, 1) }}</div>
                    <span class="text-[13.5px] font-bold text-dark hidden sm:block">{{ auth()->user()->name }}</span>
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="text-muted transition-transform" :class="profileOpen ? 'rotate-180' : ''"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div x-show="profileOpen" @click.away="profileOpen = false" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 scale-95 -translate-y-1" x-transition:enter-end="opacity-100 scale-100 translate-y-0" x-transition:leave="transition ease-in duration-100" class="absolute right-0 mt-2 w-56 bg-white rounded-xl border border-border shadow-lg overflow-hidden z-50" style="display:none">
                    <div class="px-4 py-3 border-b border-border">
                        <div class="text-[13px] font-bold text-dark">{{ auth()->user()->name }}</div>
                        <div class="text-[12px] text-muted">{{ auth()->user()->email }}</div>
                    </div>
                    <div class="py-1">
                        <a href="{{ route('mua.profile') }}" class="flex items-center gap-3 px-4 py-2.5 text-[13px] text-muted hover:bg-cream hover:text-dark transition-colors">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            My Profile
                        </a>
                        <a href="{{ route('mua.schedule') }}" class="flex items-center gap-3 px-4 py-2.5 text-[13px] text-muted hover:bg-cream hover:text-dark transition-colors">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Schedule
                        </a>
                    </div>
                    <div class="border-t border-border py-1">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="flex items-center gap-3 px-4 py-2.5 text-[13px] text-red-500 hover:bg-red-500/5 transition-colors w-full">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 lg:p-10">
            <div class="max-w-6xl mx-auto">
                @yield('content')
            </div>
        </div>

    </main>

    @stack('scripts')
</body>
</html>
