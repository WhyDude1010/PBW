<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Beautique MUA — Admin Dashboard">
    <title>@yield('title', 'Admin') — Beautique</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/beautique.css') }}">
    @stack('head')
    <style>
        body { background: var(--cream); }
        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 6px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--rose-light); }
        /* User avatar pill */
        .admin-user {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            padding: 7px 12px;
            border-radius: var(--radius-pill);
            border: 1px solid var(--border);
            transition: var(--transition);
            background: var(--white);
        }
        .admin-user:hover { border-color: var(--rose); box-shadow: var(--shadow-sm); }
        .admin-avatar {
            width: 32px; height: 32px;
            border-radius: 50%;
            background: var(--rose);
            color: var(--white);
            font-size: 13px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .admin-user-name { font-size: 13px; font-weight: 600; color: var(--dark); }
        /* Section header */
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            gap: 16px;
            flex-wrap: wrap;
        }
        .section-header h3 {
            font-size: 18px;
            font-weight: 700;
            color: var(--dark);
        }
        /* Search */
        .search-bar {
            position: relative;
        }
        .search-bar input {
            padding: 10px 16px 10px 40px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-pill);
            font-size: 13px;
            color: var(--dark);
            background: var(--white);
            outline: none;
            width: 240px;
            transition: var(--transition);
        }
        .search-bar input:focus { border-color: var(--rose); }
        .search-bar .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 17px;
            color: var(--muted);
        }
        /* Filter tabs */
        .filter-tabs {
            display: flex;
            gap: 4px;
            background: var(--cream);
            padding: 4px;
            border-radius: var(--radius-pill);
            margin-bottom: 20px;
            overflow-x: auto;
        }
        .filter-tab {
            padding: 7px 18px;
            border-radius: var(--radius-pill);
            font-size: 12px;
            font-weight: 600;
            color: var(--muted);
            cursor: pointer;
            white-space: nowrap;
            transition: var(--transition);
        }
        .filter-tab.active, .filter-tab:hover { background: var(--white); color: var(--rose); box-shadow: var(--shadow-sm); }
        /* Page card */
        .page-card {
            background: var(--white);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            border: 1px solid var(--border);
            margin-bottom: 24px;
        }
        .page-card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .page-card-header h4 { font-size: 15px; font-weight: 700; color: var(--dark); }
    </style>
</head>
<body>
<div class="admin-layout">
    <!-- ── SIDEBAR ────────────────────────────────── -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-logo">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color:var(--rose)"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M12 8v4l3 3"/></svg>
            <div>
                Beautique
                <span>Admin Console</span>
            </div>
        </div>
        <nav class="admin-nav">
            <div class="admin-nav-section">Overview</div>
            <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="material-icons-round">dashboard</span> Dashboard
            </a>

            <div class="admin-nav-section">Management</div>
            <a href="{{ route('admin.bookings.index') }}" class="admin-nav-link {{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
                <span class="material-icons-round">event_note</span> Bookings
            </a>
            <a href="{{ route('admin.muas.index') }}" class="admin-nav-link {{ request()->routeIs('admin.muas.*') ? 'active' : '' }}">
                <span class="material-icons-round">face_retouching_natural</span> MUA Artists
            </a>
            <a href="{{ route('admin.clients.index') }}" class="admin-nav-link {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                <span class="material-icons-round">people</span> Clients
            </a>

            <div class="admin-nav-section">Content</div>
            <a href="{{ route('admin.reviews.index') }}" class="admin-nav-link {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                <span class="material-icons-round">star_rate</span> Reviews
            </a>
        </nav>
        <div class="admin-sidebar-footer">
            <a href="{{ route('landing') }}" class="admin-nav-link" style="border-left:none; padding-left:0;">
                <span class="material-icons-round">open_in_new</span> View Site
            </a>
        </div>
    </aside>

    <!-- ── MAIN ──────────────────────────────────── -->
    <div class="admin-main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <div>
                <h2>@yield('page_title', 'Dashboard')</h2>
                <p class="admin-topbar-meta">@yield('page_meta', 'Beautique MUA Admin Panel')</p>
            </div>
            <div class="admin-user">
                <div class="admin-avatar">A</div>
                <span class="admin-user-name">Admin</span>
                <span class="material-icons-round" style="font-size:16px;color:var(--muted)">expand_more</span>
            </div>
        </header>

        <!-- Content -->
        <main class="admin-content">
            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
