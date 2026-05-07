<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Beautique MUA — Seamless makeup artist booking')">
    <title>@yield('title', 'Beautique MUA')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/beautique.css') }}">
    @stack('head')
    <style>
        body {
            background: linear-gradient(160deg, var(--cream) 0%, #ede3db 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 32px 16px 60px;
        }
        /* Ambient blobs */
        body::before, body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            z-index: 0;
        }
        body::before {
            width: 500px; height: 500px;
            top: -180px; right: -180px;
            background: radial-gradient(circle, rgba(198,147,126,.18) 0%, transparent 70%);
        }
        body::after {
            width: 400px; height: 400px;
            bottom: -120px; left: -120px;
            background: radial-gradient(circle, rgba(238,215,206,.35) 0%, transparent 70%);
        }
        /* Branding pill at top */
        .app-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 28px;
            position: relative;
            z-index: 1;
        }
        .app-brand-logo {
            font-family: var(--font-serif);
            font-size: 22px;
            font-weight: 700;
            color: var(--rose);
        }
        .app-brand-sep { width: 4px; height: 4px; border-radius: 50%; background: var(--rose-light); }
        .app-brand-step {
            font-size: 11px;
            font-weight: 600;
            color: var(--muted);
            letter-spacing: .5px;
        }
        /* Card */
        .mobile-card {
            position: relative;
            z-index: 1;
            animation: slideUp .5s ease both;
        }
    </style>
</head>
<body>
    <!-- Brand strip -->
    <div class="app-brand">
        <a href="{{ route('landing') }}" class="app-brand-logo">Beautique</a>
        <div class="app-brand-sep"></div>
        <span class="app-brand-step">@yield('flow_step', '')</span>
    </div>

    <!-- Mobile Card -->
    <div class="mobile-card">
        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
