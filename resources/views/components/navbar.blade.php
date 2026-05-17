<nav
    id="site-nav"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 ease-in-out"
    style="padding: 20px 6%;"
    aria-label="Main navigation"
>
    <div class="flex items-center justify-between w-full">

        <a href="{{ route('landing') }}" class="flex items-center gap-2 shrink-0" aria-label="Beautique Home">
            <svg width="32" height="32" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="24" cy="30" rx="14" ry="10" fill="var(--color-brand)" opacity="0.18"/>
                <path d="M24 8 C18 8, 12 14, 12 21 C12 27, 16 31, 20 33 C22 34, 24 34.5, 24 34.5 C24 34.5, 26 34, 28 33 C32 31, 36 27, 36 21 C36 14, 30 8, 24 8Z" fill="var(--color-brand)"/>
                <path d="M20 22 Q24 18 28 22 Q24 28 20 22Z" fill="#fff" opacity="0.5"/>
                <circle cx="24" cy="20" r="3" fill="#fff" opacity="0.35"/>
            </svg>
            <span style="font-family: 'Cormorant Garamond', Georgia, serif; font-size: 22px; font-weight: 700; color: var(--color-brand); letter-spacing: 1px;">Beautique</span>
        </a>

        <ul class="hidden lg:flex items-center gap-8" id="nav-links-desktop">
            @php $isLanding = request()->routeIs('landing'); @endphp
            <li><a href="{{ $isLanding ? '#about' : route('landing') . '#about' }}"        class="nav-link text-sm font-medium text-dark relative hover:text-brand transition-colors duration-200">About</a></li>
            <li><a href="{{ $isLanding ? '#services' : route('landing') . '#services' }}"     class="nav-link text-sm font-medium text-dark relative hover:text-brand transition-colors duration-200">Services</a></li>
            <li><a href="{{ $isLanding ? '#packages' : route('landing') . '#packages' }}"     class="nav-link text-sm font-medium text-dark relative hover:text-brand transition-colors duration-200">Packages</a></li>
            <li><a href="{{ $isLanding ? '#gallery' : route('landing') . '#gallery' }}"      class="nav-link text-sm font-medium text-dark relative hover:text-brand transition-colors duration-200">Gallery</a></li>
            <li><a href="{{ $isLanding ? '#testimonials' : route('landing') . '#testimonials' }}" class="nav-link text-sm font-medium text-dark relative hover:text-brand transition-colors duration-200">Reviews</a></li>
        </ul>

        <div class="hidden lg:flex items-center gap-3">
            <a href="{{ route('login') }}" class="text-sm font-medium text-muted hover:text-brand transition-colors duration-200 px-3 py-2">Log In</a>
            <a href="{{ route('register') }}" class="text-sm font-medium text-dark hover:text-brand transition-colors duration-200 px-3 py-2">Sign Up</a>
            <a href="{{ route('booking.choose-mua') }}" class="btn-primary text-sm ml-2">
                Book Now
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        <button
            class="lg:hidden flex flex-col gap-1.5 p-2 cursor-pointer"
            id="hamburger"
            aria-label="Open menu"
            aria-expanded="false"
            aria-controls="nav-drawer"
        >
            <span class="block w-6 h-0.5 bg-dark rounded transition-all duration-300" id="bar1"></span>
            <span class="block w-6 h-0.5 bg-dark rounded transition-all duration-300" id="bar2"></span>
            <span class="block w-5 h-0.5 bg-dark rounded transition-all duration-300" id="bar3"></span>
        </button>
    </div>
</nav>

<div
    class="fixed inset-0 z-40 bg-black/50 backdrop-blur-sm opacity-0 pointer-events-none transition-opacity duration-300"
    id="nav-drawer"
    role="dialog"
    aria-modal="true"
    aria-label="Mobile navigation"
>
    <div
        class="absolute right-0 top-0 bottom-0 w-72 bg-white shadow-2xl flex flex-col translate-x-full transition-transform duration-300 ease-in-out"
        id="nav-drawer-panel"
    >
        <div class="flex items-center justify-between px-6 py-5 border-b border-border">
            <span style="font-family: 'Cormorant Garamond', Georgia, serif; font-size: 20px; font-weight: 700; color: var(--color-brand);">Beautique</span>
            <button id="drawer-close" aria-label="Close menu" class="p-1">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--color-muted)" stroke-width="2" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="flex flex-col p-6 gap-1 flex-1">
            @php $isLandingMobile = request()->routeIs('landing'); @endphp
            <a href="{{ $isLandingMobile ? '#about' : route('landing') . '#about' }}"        class="drawer-link py-3 text-base font-medium text-dark border-b border-border hover:text-brand transition-colors">About</a>
            <a href="{{ $isLandingMobile ? '#services' : route('landing') . '#services' }}"     class="drawer-link py-3 text-base font-medium text-dark border-b border-border hover:text-brand transition-colors">Services</a>
            <a href="{{ $isLandingMobile ? '#packages' : route('landing') . '#packages' }}"     class="drawer-link py-3 text-base font-medium text-dark border-b border-border hover:text-brand transition-colors">Packages</a>
            <a href="{{ $isLandingMobile ? '#gallery' : route('landing') . '#gallery' }}"      class="drawer-link py-3 text-base font-medium text-dark border-b border-border hover:text-brand transition-colors">Gallery</a>
            <a href="{{ $isLandingMobile ? '#testimonials' : route('landing') . '#testimonials' }}" class="drawer-link py-3 text-base font-medium text-dark border-b border-border hover:text-brand transition-colors">Reviews</a>
        </div>
        <div class="p-6 flex flex-col gap-3">
            <a href="{{ route('login') }}"                class="btn-outline w-full text-center justify-center">Log In</a>
            <a href="{{ route('booking.choose-mua') }}"   class="btn-primary w-full text-center justify-center">Book Now</a>
        </div>
    </div>
</div>

<style>
    #site-nav.scrolled {
        background: rgba(246, 241, 238, 0.92);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        box-shadow: 0 2px 32px rgba(0,0,0,0.06);
        padding: 13px 6% !important;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: -3px;
        left: 0;
        width: 0;
        height: 1.5px;
        background: var(--color-brand);
        transition: width 0.3s ease;
    }

    .nav-link:hover::after { width: 100%; }

    #nav-drawer.open {
        opacity: 1;
        pointer-events: auto;
    }

    #nav-drawer.open #nav-drawer-panel {
        transform: translateX(0);
    }

    #hamburger.open #bar1 { transform: translateY(8px) rotate(45deg); }
    #hamburger.open #bar2 { opacity: 0; }
    #hamburger.open #bar3 { transform: translateY(-8px) rotate(-45deg); width: 24px; }
</style>

<script>
    const siteNav   = document.getElementById('site-nav');
    const hamburger = document.getElementById('hamburger');
    const drawer    = document.getElementById('nav-drawer');
    const drawerClose = document.getElementById('drawer-close');
    const drawerLinks = document.querySelectorAll('.drawer-link');

    window.addEventListener('scroll', () => {
        siteNav.classList.toggle('scrolled', window.scrollY > 50);
    });

    function openDrawer() {
        drawer.classList.add('open');
        hamburger.classList.add('open');
        hamburger.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        drawer.classList.remove('open');
        hamburger.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    hamburger.addEventListener('click', () => {
        drawer.classList.contains('open') ? closeDrawer() : openDrawer();
    });

    drawerClose.addEventListener('click', closeDrawer);

    drawer.addEventListener('click', e => {
        if (e.target === drawer) closeDrawer();
    });

    drawerLinks.forEach(link => link.addEventListener('click', closeDrawer));
</script>
