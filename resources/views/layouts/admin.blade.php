<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Beautique MUA — Admin Dashboard">
    <title>@yield('title', 'Admin') — Beautique</title>
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
    <!-- Alpine.js for Mobile Sidebar Toggle -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-cream font-sans text-dark antialiased min-h-screen flex" x-data="{ sidebarOpen: false }">

    <!-- Mobile Sidebar Overlay -->
    <div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-dark/50 z-40 lg:hidden" @click="sidebarOpen = false"></div>

    <!-- ── SIDEBAR ────────────────────────────────── -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-white border-r border-border transition-transform duration-300 ease-in-out lg:translate-x-0 flex flex-col">
        
        <div class="h-20 flex items-center px-6 border-b border-border">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-brand/10 text-brand flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M12 8v4l3 3"/></svg>
                </div>
                <div>
                    <h1 class="font-serif font-bold text-[18px] leading-tight text-dark">Beautique</h1>
                    <span class="text-[10px] uppercase tracking-wider text-brand font-bold block">Admin Console</span>
                </div>
            </a>
            <button @click="sidebarOpen = false" class="ml-auto lg:hidden text-muted">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div class="flex-1 overflow-y-auto py-6 px-4 space-y-8">
            
            <!-- Overview -->
            <div>
                <div class="text-[11px] font-bold text-muted uppercase tracking-wider mb-3 px-3">Overview</div>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-brand/10 text-brand font-semibold' : 'text-muted hover:bg-cream hover:text-dark' }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="text-[14px]">Dashboard</span>
                </a>
            </div>

            <!-- Management -->
            <div>
                <div class="text-[11px] font-bold text-muted uppercase tracking-wider mb-3 px-3">Management</div>
                <div class="space-y-1">
                    <a href="{{ route('admin.bookings.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.bookings.*') ? 'bg-brand/10 text-brand font-semibold' : 'text-muted hover:bg-cream hover:text-dark' }}">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="text-[14px]">Bookings</span>
                    </a>
                    <a href="{{ route('admin.muas.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.muas.*') ? 'bg-brand/10 text-brand font-semibold' : 'text-muted hover:bg-cream hover:text-dark' }}">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                        <span class="text-[14px]">MUA Artists</span>
                    </a>
                    <a href="{{ route('admin.clients.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.clients.*') ? 'bg-brand/10 text-brand font-semibold' : 'text-muted hover:bg-cream hover:text-dark' }}">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        <span class="text-[14px]">Clients</span>
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div>
                <div class="text-[11px] font-bold text-muted uppercase tracking-wider mb-3 px-3">Content</div>
                <div class="space-y-1">
                    <a href="{{ route('admin.reviews.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-all {{ request()->routeIs('admin.reviews.*') ? 'bg-brand/10 text-brand font-semibold' : 'text-muted hover:bg-cream hover:text-dark' }}">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                        <span class="text-[14px]">Reviews</span>
                    </a>
                </div>
            </div>

        </div>
        
        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-border">
            <a href="{{ route('landing') }}" target="_blank" class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl text-[13px] font-bold text-muted border border-border hover:border-brand hover:text-brand transition-all">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                View Live Site
            </a>
        </div>
    </aside>

    <!-- ── MAIN ──────────────────────────────────── -->
    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <!-- Topbar -->
        <header class="h-20 bg-white border-b border-border flex items-center justify-between px-6 lg:px-10 shrink-0">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = true" class="lg:hidden text-dark">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div>
                    <h2 class="font-serif text-[20px] lg:text-[24px] font-bold text-dark">@yield('page_title', 'Dashboard')</h2>
                    <p class="text-[13px] text-muted hidden sm:block">@yield('page_meta', 'Beautique MUA Admin Panel')</p>
                </div>
            </div>

            <div class="flex items-center gap-3 px-3 py-1.5 rounded-full border border-border hover:border-brand cursor-pointer transition-colors bg-cream/50">
                <div class="w-8 h-8 rounded-full bg-dark text-white flex items-center justify-center font-bold text-[13px]">A</div>
                <span class="text-[13.5px] font-bold text-dark hidden sm:block">Admin</span>
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="text-muted"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
            </div>
        </header>

        <!-- Content Area -->
        <div class="flex-1 overflow-y-auto p-6 lg:p-10">
            <div class="max-w-6xl mx-auto">
                @yield('content')
            </div>
        </div>

    </main>

    @stack('scripts')
</body>
</html>
