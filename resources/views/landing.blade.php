<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautique MUA — Book Your Makeup Artist</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <style>
        .material-icons-round { vertical-align: middle; }
        .s-icon { width:64px; height:64px; border-radius:18px; background:var(--rose-light); display:flex; align-items:center; justify-content:center; margin-bottom:24px; transition:.4s; }
        .s-icon .material-icons-round { font-size:30px; color:var(--rose); transition:.4s; }
        .service-card:hover .s-icon { background:rgba(255,255,255,.2); }
        .service-card:hover .s-icon .material-icons-round { color:#fff; }
        .feat-icon .material-icons-round { font-size:22px; color:var(--rose); }
        :root {
            --rose: #C6937E;
            --rose-light: #EED7CE;
            --rose-dark: #a07060;
            --cream: #FAF5F0;
            --dark: #1a1010;
            --text: #4a3a35;
        }
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Poppins', sans-serif; background: var(--cream); color: var(--text); overflow-x: hidden; }

        /* NAVBAR */
        nav {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            padding: 18px 6%;
            display: flex; justify-content: space-between; align-items: center;
            transition: all .4s ease;
        }
        nav.scrolled {
            background: rgba(250,245,240,.85);
            backdrop-filter: blur(16px);
            box-shadow: 0 2px 30px rgba(0,0,0,.08);
            padding: 12px 6%;
        }
        .logo { font-family: 'Cormorant Garamond', serif; font-size: 26px; font-weight: 700; color: var(--rose); letter-spacing: 1px; text-decoration: none; }
        .nav-links { display: flex; align-items: center; gap: 36px; list-style: none; }
        .nav-links a { text-decoration: none; color: var(--dark); font-size: 14px; font-weight: 500; position: relative; transition: color .3s; }
        .nav-links a::after { content:''; position:absolute; bottom:-3px; left:0; width:0; height:2px; background:var(--rose); transition: width .3s; }
        .nav-links a:hover { color: var(--rose); }
        .nav-links a:hover::after { width: 100%; }
        .btn-nav { background: var(--rose); color: #fff !important; padding: 10px 24px; border-radius: 50px; transition: all .3s !important; }
        .btn-nav::after { display: none !important; }
        .btn-nav:hover { background: var(--rose-dark) !important; transform: translateY(-2px); box-shadow: 0 8px 20px rgba(198,147,126,.4); }

        /* HERO */
        .hero {
            min-height: 100vh;
            display: grid; grid-template-columns: 1fr 1fr; align-items: end;
            padding: 0 6%; gap: 0;
            position: relative; overflow: hidden;
            background: linear-gradient(135deg, #FAF5F0 60%, #f2e5dc 100%);
        }
        .hero::before {
            content:''; position:absolute; top:-200px; right:-200px;
            width:600px; height:600px; border-radius:50%;
            background: radial-gradient(circle, rgba(198,147,126,.15) 0%, transparent 70%);
            animation: pulse 6s ease-in-out infinite;
        }
        .hero::after {
            content:''; position:absolute; bottom:-100px; left:10%;
            width:400px; height:400px; border-radius:50%;
            background: radial-gradient(circle, rgba(238,215,206,.4) 0%, transparent 70%);
            animation: pulse 8s ease-in-out infinite reverse;
        }
        @keyframes pulse { 0%,100%{transform:scale(1) translate(0,0)} 50%{transform:scale(1.1) translate(20px,-20px)} }

        .hero-img { align-self: end; position:relative; z-index:2; animation: slideUp 1s ease .2s both; }
        .hero-img img { width:100%; max-width:520px; height:600px; object-fit:cover; border-radius:24px 24px 0 0; display:block; }
        .hero-img .badge {
            position:absolute; top:40px; right:-20px;
            background:rgba(255,255,255,.9); backdrop-filter:blur(10px);
            padding:14px 20px; border-radius:16px;
            box-shadow: 0 8px 32px rgba(0,0,0,.1);
            animation: float 4s ease-in-out infinite;
        }
        .hero-img .badge span { display:block; font-size:22px; font-weight:700; color:var(--rose); }
        .hero-img .badge small { font-size:11px; color:#888; }
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }

        .hero-text { padding: 0 0 80px 60px; z-index:2; animation: slideUp 1s ease .4s both; }
        @keyframes slideUp { from{opacity:0; transform:translateY(40px)} to{opacity:1; transform:translateY(0)} }
        .hero-text .eyebrow { font-size:12px; font-weight:600; letter-spacing:4px; text-transform:uppercase; color:var(--rose); margin-bottom:18px; display:flex; align-items:center; gap:10px; }
        .hero-text .eyebrow::before { content:''; width:30px; height:1px; background:var(--rose); }
        .hero-text h1 { font-family:'Cormorant Garamond',serif; font-size:72px; line-height:1.05; font-weight:700; color:var(--dark); margin-bottom:22px; }
        .hero-text h1 em { font-style:italic; color:var(--rose); }
        .hero-text p { font-size:16px; line-height:1.8; color:#7a6560; max-width:400px; margin-bottom:38px; }
        .hero-actions { display:flex; gap:16px; align-items:center; }
        .btn-primary {
            background: var(--rose); color:#fff; padding:16px 36px; border-radius:50px;
            text-decoration:none; font-weight:600; font-size:15px;
            transition: all .3s; display:inline-flex; align-items:center; gap:8px;
            box-shadow: 0 8px 30px rgba(198,147,126,.4);
        }
        .btn-primary:hover { background:var(--rose-dark); transform:translateY(-3px); box-shadow:0 16px 40px rgba(198,147,126,.5); }
        .btn-ghost { color:var(--dark); text-decoration:none; font-size:14px; font-weight:500; display:flex; align-items:center; gap:8px; transition:.3s; }
        .btn-ghost:hover { color:var(--rose); gap:12px; }
        .arrow { display:inline-block; width:36px; height:36px; border-radius:50%; border:1.5px solid currentColor; display:inline-flex; align-items:center; justify-content:center; font-size:18px; transition:.3s; }

        /* STATS */
        .stats-bar {
            background: var(--dark); color:#fff; padding:28px 6%;
            display:flex; justify-content:center; gap:80px;
        }
        .stat { text-align:center; animation: slideUp .8s ease both; }
        .stat strong { display:block; font-family:'Cormorant Garamond',serif; font-size:38px; font-weight:700; color:var(--rose); }
        .stat small { font-size:12px; opacity:.7; letter-spacing:1px; }

        /* SECTION BASE */
        section { padding: 100px 6%; }
        .section-label { font-size:12px; font-weight:600; letter-spacing:4px; text-transform:uppercase; color:var(--rose); margin-bottom:12px; }
        .section-title { font-family:'Cormorant Garamond',serif; font-size:48px; font-weight:700; color:var(--dark); line-height:1.1; margin-bottom:16px; }
        .section-sub { font-size:15px; color:#7a6560; line-height:1.8; max-width:520px; }

        /* ABOUT */
        .about { background:#fff; }
        .about-inner { display:grid; grid-template-columns:1fr 1fr; gap:70px; align-items:center; }
        .about-imgs { position:relative; }
        .about-imgs img { width:100%; height:480px; object-fit:cover; border-radius:20px; }
        .about-imgs .img-accent {
            position:absolute; bottom:-30px; right:-30px;
            width:200px; height:200px; border-radius:16px; object-fit:cover;
            border:6px solid #fff; box-shadow:0 10px 40px rgba(0,0,0,.12);
            animation: float 5s ease-in-out infinite;
        }
        .about-text { padding:20px 0; }
        .about-text p { font-size:15px; line-height:2; color:#7a6560; margin:24px 0 36px; }
        .about-feature { display:flex; gap:12px; align-items:flex-start; margin-bottom:16px; }
        .feat-icon { width:44px; height:44px; border-radius:12px; background:var(--rose-light); display:flex; align-items:center; justify-content:center; flex-shrink:0; }
        .feat-text strong { display:block; font-size:14px; font-weight:600; color:var(--dark); }
        .feat-text span { font-size:13px; color:#999; }

        /* SERVICES */
        .services { background:var(--cream); }
        .services-head { display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:56px; }
        .services-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:24px; }
        .service-card {
            background:#fff; border-radius:24px; padding:40px 30px;
            transition: all .4s cubic-bezier(.25,.8,.25,1);
            cursor:default; position:relative; overflow:hidden;
        }
        .service-card::before {
            content:''; position:absolute; inset:0; border-radius:24px;
            background: linear-gradient(135deg, var(--rose), var(--rose-dark));
            opacity:0; transition: opacity .4s;
        }
        .service-card:hover { transform:translateY(-12px); box-shadow:0 30px 60px rgba(198,147,126,.25); }
        .service-card:hover::before { opacity:1; }
        .service-card > * { position:relative; z-index:1; transition: color .4s; }
        .service-card:hover .s-icon, .service-card:hover h3, .service-card:hover p { color:#fff; }
        /* s-icon styles moved to top */
        .service-card h3 { font-size:20px; font-weight:600; margin-bottom:12px; color:var(--dark); }
        .service-card p { font-size:14px; line-height:1.7; color:#888; }

        /* PACKAGES */
        .packages { background:#fff; }
        .packages-head { text-align:center; margin-bottom:56px; }
        .packages-head .section-sub { margin: 0 auto; }
        .pkg-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:24px; align-items:start; }
        .pkg-card {
            border-radius:24px; overflow:hidden; background:var(--cream);
            border:1.5px solid #ede0d8;
            transition: all .4s; position:relative;
        }
        .pkg-card:hover { transform:translateY(-8px); box-shadow:0 24px 50px rgba(0,0,0,.1); border-color:var(--rose); }
        .pkg-card.featured { border-color:var(--rose); background:#fff; box-shadow:0 8px 40px rgba(198,147,126,.2); }
        .pkg-badge { background:var(--rose); color:#fff; font-size:11px; font-weight:600; letter-spacing:1px; text-align:center; padding:8px; }
        .pkg-img img { width:100%; height:190px; object-fit:cover; }
        .pkg-body { padding:28px; }
        .pkg-body h3 { font-size:17px; font-weight:700; color:var(--dark); margin-bottom:16px; }
        .pkg-list { list-style:none; margin-bottom:24px; }
        .pkg-list li { font-size:13px; color:#888; padding:5px 0 5px 20px; position:relative; border-bottom:1px solid #f0e8e3; }
        .pkg-list li::before { content:'✦'; position:absolute; left:0; color:var(--rose); font-size:9px; top:7px; }
        .pkg-price { font-size:13px; color:#aaa; margin-bottom:6px; }
        .pkg-amount { font-size:16px; font-weight:700; color:var(--rose); margin-bottom:20px; }
        .btn-pkg {
            display:block; text-align:center; background:var(--rose-light); color:var(--rose);
            padding:13px; border-radius:12px; text-decoration:none; font-weight:600; font-size:14px;
            transition:.3s;
        }
        .btn-pkg:hover { background:var(--rose); color:#fff; }

        /* CTA */
        .cta {
            background: linear-gradient(135deg, var(--dark) 0%, #2d1a14 100%);
            text-align:center; position:relative; overflow:hidden;
        }
        .cta::before { content:''; position:absolute; top:-50%; left:50%; transform:translateX(-50%); width:800px; height:800px; border-radius:50%; background:radial-gradient(circle, rgba(198,147,126,.15) 0%, transparent 70%); }
        .cta h2 { font-family:'Cormorant Garamond',serif; font-size:56px; font-weight:700; color:#fff; margin-bottom:20px; position:relative; }
        .cta h2 em { color:var(--rose); font-style:italic; }
        .cta p { font-size:16px; color:rgba(255,255,255,.65); max-width:480px; margin:0 auto 40px; position:relative; }
        .cta .btn-primary { position:relative; font-size:16px; padding:18px 48px; }

        /* FOOTER */
        footer { background:var(--dark); padding:40px 6%; display:flex; justify-content:space-between; align-items:center; }
        footer .logo { color:var(--rose); }
        footer p { font-size:13px; color:rgba(255,255,255,.4); }

        /* REVEAL ANIMATION */
        .reveal { opacity:0; transform:translateY(30px); transition: opacity .7s ease, transform .7s ease; }
        .reveal.visible { opacity:1; transform:translateY(0); }
        .reveal-left { opacity:0; transform:translateX(-40px); transition: opacity .8s ease, transform .8s ease; }
        .reveal-left.visible { opacity:1; transform:translateX(0); }
        .reveal-right { opacity:0; transform:translateX(40px); transition: opacity .8s ease, transform .8s ease; }
        .reveal-right.visible { opacity:1; transform:translateX(0); }
        .delay-1 { transition-delay: .1s; }
        .delay-2 { transition-delay: .2s; }
        .delay-3 { transition-delay: .3s; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav id="navbar">
    <a href="#" class="logo">Beautique</a>
    <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#packages">Packages</a></li>
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}" class="btn-nav">Sign Up</a></li>
    </ul>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-img">
        <img src="{{ asset('image/model-mua.jpeg') }}" alt="MUA Model">
        <div class="badge">
            <span>500+</span>
            <small>Happy Clients</small>
        </div>
    </div>
    <div class="hero-text">
        <div class="eyebrow">Premium MUA Platform</div>
        <h1>Your Beauty,<br><em>Crafted</em><br>Perfectly.</h1>
        <p>Connect with Indonesia's top makeup artists. Book seamlessly, look stunning — at your studio or doorstep.</p>
        <div class="hero-actions">
            <a href="{{ route('booking.choose-mua') }}" class="btn-primary">Book Now <span class="material-icons-round" style="font-size:18px">arrow_forward</span></a>
            <a href="#about" class="btn-ghost">Learn More <span class="material-icons-round" style="font-size:18px;width:36px;height:36px;border:1.5px solid currentColor;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;transition:.3s">south</span></a>
        </div>
    </div>
</section>

<!-- STATS -->
<div class="stats-bar">
    <div class="stat reveal delay-1"><strong>500+</strong><small>Clients Served</small></div>
    <div class="stat reveal delay-2"><strong>50+</strong><small>Expert MUAs</small></div>
    <div class="stat reveal delay-3"><strong>4.9★</strong><small>Average Rating</small></div>
</div>

<!-- ABOUT -->
<section class="about" id="about">
    <div class="about-inner">
        <div class="about-imgs reveal-left">
            <img src="{{ asset('image/about-mua.jpeg') }}" alt="About Us">
            <img class="img-accent" src="{{ asset('image/makeup1.jpeg') }}" alt="Detail">
        </div>
        <div class="about-text reveal-right">
            <div class="section-label">Who We Are</div>
            <h2 class="section-title">Beauty Meets<br>Technology</h2>
            <p>A digital platform connecting clients with professional Makeup Artists for a seamless, personalized beauty experience — from bridal to editorial.</p>
            <div class="about-feature">
                <div class="feat-icon"><span class="material-icons-round">verified</span></div>
                <div class="feat-text"><strong>Curated Artists</strong><span>Vetted, skilled professionals only</span></div>
            </div>
            <div class="about-feature">
                <div class="feat-icon"><span class="material-icons-round">location_on</span></div>
                <div class="feat-text"><strong>Anywhere in Indonesia</strong><span>Studio or doorstep service</span></div>
            </div>
            <div class="about-feature">
                <div class="feat-icon"><span class="material-icons-round">lock</span></div>
                <div class="feat-text"><strong>Secure Booking</strong><span>Transparent pricing, no hidden fees</span></div>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="services" id="services">
    <div class="services-head">
        <div>
            <div class="section-label">What We Offer</div>
            <h2 class="section-title">Our Services</h2>
        </div>
        <p class="section-sub">Three core specialties, each delivered by artists who live and breathe beauty.</p>
    </div>
    <div class="services-grid">
        <div class="service-card reveal delay-1">
            <div class="s-icon"><span class="material-icons-round">auto_awesome</span></div>
            <h3>Bridal Makeup</h3>
            <p>Timeless, elegant looks for your most important day — tailored precisely to your vision and skin.</p>
        </div>
        <div class="service-card reveal delay-2">
            <div class="s-icon"><span class="material-icons-round">celebration</span></div>
            <h3>Party &amp; Event</h3>
            <p>Glamorous, long-lasting looks that photograph beautifully and endure every moment of celebration.</p>
        </div>
        <div class="service-card reveal delay-3">
            <div class="s-icon"><span class="material-icons-round">photo_camera</span></div>
            <h3>Editorial &amp; Photoshoot</h3>
            <p>High-impact, camera-ready artistry for portraits, campaigns, and creative content production.</p>
        </div>
    </div>
</section>

<!-- PACKAGES -->
<section class="packages" id="packages">
    <div class="packages-head reveal">
        <div class="section-label">Pricing</div>
        <h2 class="section-title">Featured Packages</h2>
        <p class="section-sub">Transparent, flexible packages for every occasion and budget.</p>
    </div>
    <div class="pkg-grid">
        <div class="pkg-card reveal delay-1">
            <div class="pkg-img"><img src="{{ asset('image/makeup1.jpeg') }}" alt="Basic Beauty"></div>
            <div class="pkg-body">
                <h3>Basic Beauty Package</h3>
                <ul class="pkg-list">
                    <li>Makeup 1x (party / event)</li>
                    <li>Hair styling / hijab styling</li>
                    <li>1 look, no changes</li>
                    <li>No touch-up included</li>
                </ul>
                <div class="pkg-price">Starting Price</div>
                <div class="pkg-amount">Rp 500.000 – Rp 2.000.000</div>
                <a href="{{ route('booking.choose-mua') }}" class="btn-pkg">View Package</a>
            </div>
        </div>
        <div class="pkg-card featured reveal delay-2">
            <div class="pkg-badge"><span class="material-icons-round" style="font-size:13px;vertical-align:middle">star</span> BEST CHOICE <span class="material-icons-round" style="font-size:13px;vertical-align:middle">star</span></div>
            <div class="pkg-img"><img src="{{ asset('image/makeup1.jpeg') }}" alt="Creative Glam"></div>
            <div class="pkg-body">
                <h3>Creative Glam Package</h3>
                <ul class="pkg-list">
                    <li>Makeup + premium hairdo</li>
                    <li>1–2 looks with touch-up</li>
                    <li>Light touch-up during event</li>
                    <li>Personal consultation</li>
                    <li>Photo-ready, long-lasting finish</li>
                </ul>
                <div class="pkg-price">Starting Price</div>
                <div class="pkg-amount">Rp 2.500.000 – Rp 6.000.000</div>
                <a href="{{ route('booking.choose-mua') }}" class="btn-pkg">View Package</a>
            </div>
        </div>
        <div class="pkg-card reveal delay-3">
            <div class="pkg-img"><img src="{{ asset('image/makeup1.jpeg') }}" alt="Signature Bridal"></div>
            <div class="pkg-body">
                <h3>Signature Bridal &amp; Luxury</h3>
                <ul class="pkg-list">
                    <li>Makeup + premium bridal hairdo</li>
                    <li>Trial makeup before the day</li>
                    <li>Multiple looks (akad, reception)</li>
                    <li>Full-day touch-up</li>
                    <li>Assistant &amp; stylist team</li>
                </ul>
                <div class="pkg-price">Starting Price</div>
                <div class="pkg-amount">Rp 7.000.000 – Rp 25.000.000+</div>
                <a href="{{ route('booking.choose-mua') }}" class="btn-pkg">View Package</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta">
    <h2 class="reveal">Ready to Look<br><em>Breathtaking?</em></h2>
    <p class="reveal delay-1">Book your professional makeup artist today. Your perfect look is just a few taps away.</p>
    <a href="{{ route('booking.choose-mua') }}" class="btn-primary reveal delay-2">Book Your MUA <span class="material-icons-round" style="font-size:18px;vertical-align:middle">arrow_forward</span></a>
</section>

<!-- FOOTER -->
<footer>
    <a href="#" class="logo">Beautique</a>
    <p>&copy; {{ date('Y') }} Beautique MUA. All rights reserved.</p>
</footer>

<script>
    // Sticky nav
    const nav = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        nav.classList.toggle('scrolled', window.scrollY > 60);
    });

    // Intersection Observer for reveal
    const reveals = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                observer.unobserve(e.target);
            }
        });
    }, { threshold: 0.15 });
    reveals.forEach(el => observer.observe(el));

    // Counter animation
    document.querySelectorAll('.stat strong').forEach(el => {
        const target = parseInt(el.textContent);
        if (isNaN(target)) return;
        let count = 0;
        const step = Math.ceil(target / 60);
        const suffix = el.textContent.replace(/[0-9]/g, '');
        const timer = setInterval(() => {
            count = Math.min(count + step, target);
            el.textContent = count + suffix;
            if (count >= target) clearInterval(timer);
        }, 20);
    });
</script>
</body>
</html>