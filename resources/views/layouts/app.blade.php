<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Beautique MUA — Connect with Indonesia\'s top professional makeup artists. Book seamlessly for bridal, party, and editorial looks.')">
    <title>@yield('title', 'Beautique MUA — Book Your Makeup Artist')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('css/beautique.css') }}">

    @stack('head')

    <style>
        /* ── NAV ─────────────────────────────────────── */
        #site-nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 200;
            padding: 20px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all .4s ease;
        }
        #site-nav.scrolled {
            background: rgba(250,245,240,.92);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            box-shadow: 0 2px 30px rgba(0,0,0,.07);
            padding: 13px 6%;
        }
        .nav-logo {
            font-family: var(--font-serif);
            font-size: 26px;
            font-weight: 700;
            color: var(--rose);
            letter-spacing: 1px;
        }
        .nav-links {
            display: flex;
            align-items: center;
            gap: 32px;
        }
        .nav-links a {
            font-size: 13.5px;
            font-weight: 500;
            color: var(--dark);
            position: relative;
            transition: color .3s;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px; left: 0;
            width: 0; height: 2px;
            background: var(--rose);
            transition: width .3s;
        }
        .nav-links a:hover { color: var(--rose); }
        .nav-links a:hover::after { width: 100%; }
        .nav-cta {
            background: var(--rose) !important;
            color: var(--white) !important;
            padding: 10px 24px;
            border-radius: var(--radius-pill);
            transition: all .3s !important;
        }
        .nav-cta::after { display: none !important; }
        .nav-cta:hover {
            background: var(--rose-dark) !important;
            transform: translateY(-2px);
            box-shadow: var(--shadow-rose);
        }
        /* Hamburger */
        .nav-hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            padding: 4px;
        }
        .nav-hamburger span {
            display: block;
            width: 24px; height: 2px;
            background: var(--dark);
            border-radius: 2px;
            transition: var(--transition);
        }
        .nav-hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .nav-hamburger.open span:nth-child(2) { opacity: 0; }
        .nav-hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }
        /* Mobile nav drawer */
        .nav-drawer {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(26,16,16,.6);
            backdrop-filter: blur(4px);
            z-index: 199;
            opacity: 0;
            transition: opacity .3s;
        }
        .nav-drawer.open { opacity: 1; }
        .nav-drawer-panel {
            position: absolute;
            right: 0; top: 0; bottom: 0;
            width: 280px;
            background: var(--white);
            padding: 80px 32px 40px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            transform: translateX(100%);
            transition: transform .35s cubic-bezier(.25,.8,.25,1);
            box-shadow: -10px 0 40px rgba(0,0,0,.12);
        }
        .nav-drawer.open .nav-drawer-panel { transform: translateX(0); }
        .nav-drawer a {
            padding: 12px 0;
            font-size: 16px;
            font-weight: 500;
            color: var(--dark);
            border-bottom: 1px solid var(--border);
            transition: color .25s;
        }
        .nav-drawer a:hover { color: var(--rose); }
        /* ── FOOTER ──────────────────────────────────── */
        #site-footer {
            background: var(--dark);
            padding: 64px 6% 32px;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr 1fr 1fr;
            gap: 48px;
            margin-bottom: 48px;
        }
        .footer-brand .nav-logo { display: block; margin-bottom: 16px; color: var(--rose); }
        .footer-brand p { font-size: 13px; color: rgba(255,255,255,.45); line-height: 1.8; max-width: 240px; }
        .footer-socials { display: flex; gap: 12px; margin-top: 20px; }
        .footer-socials a {
            width: 38px; height: 38px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,.15);
            display: flex; align-items: center; justify-content: center;
            color: rgba(255,255,255,.5);
            font-size: 16px;
            transition: var(--transition);
        }
        .footer-socials a:hover { border-color: var(--rose); color: var(--rose); background: rgba(198,147,126,.1); }
        .footer-col h4 { font-size: 13px; font-weight: 700; color: var(--white); letter-spacing: 1px; text-transform: uppercase; margin-bottom: 18px; }
        .footer-col a { display: block; font-size: 13px; color: rgba(255,255,255,.45); margin-bottom: 10px; transition: color .25s; }
        .footer-col a:hover { color: var(--rose); }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.08);
            padding-top: 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: rgba(255,255,255,.28);
        }
        /* ── RESPONSIVE ─────────────────────────────── */
        @media (max-width: 768px) {
            .nav-links { display: none; }
            .nav-hamburger { display: flex; }
            .nav-drawer { display: block; }
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 36px; }
        }
        @media (max-width: 480px) {
            .footer-grid { grid-template-columns: 1fr; }
            .footer-bottom { flex-direction: column; gap: 8px; text-align: center; }
        }
    </style>
</head>
<body>

<!-- ── NAVBAR ──────────────────────────────────────────── -->
<nav id="site-nav">
    <a href="{{ route('landing') }}" class="nav-logo">Beautique</a>
    <ul class="nav-links">
        <li><a href="{{ route('landing') }}#about">About</a></li>
        <li><a href="{{ route('landing') }}#services">Services</a></li>
        <li><a href="{{ route('landing') }}#packages">Packages</a></li>
        <li><a href="{{ route('landing') }}#gallery">Gallery</a></li>
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('booking.choose-mua') }}" class="nav-cta btn">Book Now</a></li>
    </ul>
    <!-- Hamburger -->
    <button class="nav-hamburger" id="hamburger" aria-label="Open menu" aria-expanded="false">
        <span></span><span></span><span></span>
    </button>
</nav>

<!-- Mobile drawer -->
<div class="nav-drawer" id="nav-drawer" role="dialog" aria-modal="true" aria-label="Mobile navigation">
    <div class="nav-drawer-panel">
        <a href="{{ route('landing') }}#about">About</a>
        <a href="{{ route('landing') }}#services">Services</a>
        <a href="{{ route('landing') }}#packages">Packages</a>
        <a href="{{ route('landing') }}#gallery">Gallery</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Sign Up</a>
        <a href="{{ route('booking.choose-mua') }}" style="color: var(--rose); font-weight: 700; margin-top: 8px;">Book Now →</a>
    </div>
</div>

<!-- ── PAGE CONTENT ────────────────────────────────────── -->
<main>
    @yield('content')
</main>

<!-- ── FOOTER ──────────────────────────────────────────── -->
<footer id="site-footer">
    <div class="footer-grid">
        <div class="footer-brand">
            <a href="{{ route('landing') }}" class="nav-logo">Beautique</a>
            <p>Indonesia's premium makeup artist booking platform. Connecting beauty with technology, one booking at a time.</p>
            <div class="footer-socials">
                <a href="#" aria-label="Instagram">
                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                <a href="#" aria-label="TikTok">
                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                </a>
                <a href="#" aria-label="WhatsApp">
                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </a>
            </div>
        </div>
        <div class="footer-col">
            <h4>Company</h4>
            <a href="{{ route('landing') }}#about">About Us</a>
            <a href="{{ route('landing') }}#services">Our Services</a>
            <a href="{{ route('landing') }}#packages">Packages</a>
            <a href="#">Careers</a>
        </div>
        <div class="footer-col">
            <h4>Clients</h4>
            <a href="{{ route('booking.choose-mua') }}">Book a MUA</a>
            <a href="{{ route('login') }}">My Bookings</a>
            <a href="#">FAQ</a>
            <a href="#">Contact</a>
        </div>
        <div class="footer-col">
            <h4>Legal</h4>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Refund Policy</a>
        </div>
    </div>
    <div class="footer-bottom">
        <span>&copy; {{ date('Y') }} Beautique MUA. All rights reserved.</span>
        <span>Made with ♥ in Indonesia</span>
    </div>
</footer>

<script>
    /* Sticky nav */
    const nav = document.getElementById('site-nav');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 50);
    });

    /* Hamburger / drawer */
    const hamburger = document.getElementById('hamburger');
    const drawer    = document.getElementById('nav-drawer');
    hamburger.addEventListener('click', () => {
        const isOpen = drawer.classList.toggle('open');
        hamburger.classList.toggle('open', isOpen);
        hamburger.setAttribute('aria-expanded', isOpen);
        document.body.style.overflow = isOpen ? 'hidden' : '';
    });
    drawer.addEventListener('click', e => {
        if (e.target === drawer) {
            drawer.classList.remove('open');
            hamburger.classList.remove('open');
            document.body.style.overflow = '';
        }
    });

    /* Intersection observer for reveal animations */
    const revealEls = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
    if (revealEls.length) {
        const observer = new IntersectionObserver(entries => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    observer.unobserve(e.target);
                }
            });
        }, { threshold: 0.12 });
        revealEls.forEach(el => observer.observe(el));
    }
</script>

@stack('scripts')
</body>
</html>
