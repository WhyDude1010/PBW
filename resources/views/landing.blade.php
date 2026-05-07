@extends('layouts.app')

@section('title', 'Beautique MUA — Book Your Makeup Artist')
@section('meta_description', 'Connect with Indonesia\'s top professional makeup artists. Book seamlessly for bridal, party, and editorial looks.')

@section('content')
<style>
/* HERO */
.hero {
    min-height: 100vh;
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: end;
    padding: 0 6%;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, var(--cream) 55%, var(--cream-dark) 100%);
}
.hero::before {
    content:''; position:absolute; top:-180px; right:-160px;
    width:580px; height:580px; border-radius:50%;
    background:radial-gradient(circle,rgba(198,147,126,.14) 0%,transparent 70%);
    animation: pulse 7s ease-in-out infinite;
}
.hero::after {
    content:''; position:absolute; bottom:-80px; left:8%;
    width:360px; height:360px; border-radius:50%;
    background:radial-gradient(circle,rgba(238,215,206,.45) 0%,transparent 70%);
    animation: pulse 9s ease-in-out infinite reverse;
}
.hero-visual { align-self:end; position:relative; z-index:2; animation:slideUp .9s ease .1s both; }
.hero-visual img { width:100%; max-width:500px; height:580px; object-fit:cover; border-radius:24px 24px 0 0; display:block; }
.hero-badge {
    position:absolute; top:36px; right:-16px;
    background:rgba(255,255,255,.92); backdrop-filter:blur(12px);
    padding:14px 18px; border-radius:16px;
    box-shadow:0 8px 28px rgba(0,0,0,.1);
    animation:float 4s ease-in-out infinite;
}
.hero-badge strong { display:block; font-size:20px; font-weight:700; color:var(--rose); font-family:var(--font-serif); }
.hero-badge small { font-size:11px; color:var(--muted); }
.hero-text { padding:0 0 80px 56px; z-index:2; animation:slideUp .9s ease .3s both; }
.hero-text .eyebrow { margin-bottom:20px; }
.hero-text h1 { font-family:var(--font-serif); font-size:clamp(52px,6vw,78px); line-height:1.04; font-weight:700; color:var(--dark); margin-bottom:20px; }
.hero-text h1 em { font-style:italic; color:var(--rose); }
.hero-text > p { font-size:15.5px; line-height:1.85; color:var(--muted); max-width:390px; margin-bottom:36px; }
.hero-actions { display:flex; gap:16px; align-items:center; flex-wrap:wrap; }
.btn-ghost-hero { color:var(--dark); font-size:14px; font-weight:500; display:flex; align-items:center; gap:8px; transition:var(--transition); }
.btn-ghost-hero:hover { color:var(--rose); gap:12px; }
.btn-ghost-hero .circle { width:38px; height:38px; border-radius:50%; border:1.5px solid currentColor; display:inline-flex; align-items:center; justify-content:center; font-size:18px; transition:var(--transition); }

/* STATS */
.stats-bar { background:var(--dark); padding:32px 6%; display:flex; justify-content:center; gap:80px; flex-wrap:wrap; }
.stat { text-align:center; }
.stat strong { display:block; font-family:var(--font-serif); font-size:40px; font-weight:700; color:var(--rose); }
.stat small { font-size:11px; opacity:.55; letter-spacing:1.5px; text-transform:uppercase; color:#fff; }

/* SECTIONS */
section { padding:100px 6%; }

/* ABOUT */
.about { background:var(--white); }
.about-inner { display:grid; grid-template-columns:1fr 1fr; gap:72px; align-items:center; }
.about-imgs { position:relative; }
.about-imgs .main-img { width:100%; height:480px; object-fit:cover; border-radius:20px; }
.about-imgs .accent-img { position:absolute; bottom:-28px; right:-28px; width:190px; height:190px; border-radius:16px; object-fit:cover; border:6px solid var(--white); box-shadow:var(--shadow-lg); animation:float 5s ease-in-out infinite; }
.about-text p { font-size:15px; line-height:2; color:var(--muted); margin:22px 0 32px; }
.about-feature { display:flex; gap:14px; align-items:flex-start; margin-bottom:14px; }
.feat-icon { width:44px; height:44px; border-radius:12px; background:var(--rose-light); display:flex; align-items:center; justify-content:center; flex-shrink:0; }
.feat-icon .material-icons-round { font-size:20px; color:var(--rose); }
.feat-text strong { display:block; font-size:13.5px; font-weight:700; color:var(--dark); }
.feat-text span { font-size:12.5px; color:#aaa; }

/* SERVICES */
.services { background:var(--cream); }
.services-head { display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:52px; flex-wrap:wrap; gap:20px; }
.services-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:22px; }
.service-card { background:var(--white); border-radius:var(--radius-lg); padding:38px 28px; transition:all .4s cubic-bezier(.25,.8,.25,1); position:relative; overflow:hidden; }
.service-card::before { content:''; position:absolute; inset:0; border-radius:var(--radius-lg); background:linear-gradient(135deg,var(--rose),var(--rose-dark)); opacity:0; transition:opacity .4s; }
.service-card:hover { transform:translateY(-14px); box-shadow:0 30px 60px rgba(198,147,126,.22); }
.service-card:hover::before { opacity:1; }
.service-card > * { position:relative; z-index:1; }
.s-icon { width:62px; height:62px; border-radius:16px; background:var(--rose-light); display:flex; align-items:center; justify-content:center; margin-bottom:22px; transition:.4s; }
.s-icon .material-icons-round { font-size:28px; color:var(--rose); transition:.4s; }
.service-card:hover .s-icon { background:rgba(255,255,255,.18); }
.service-card:hover .s-icon .material-icons-round { color:#fff; }
.service-card h3 { font-size:19px; font-weight:700; margin-bottom:10px; color:var(--dark); transition:color .4s; }
.service-card p { font-size:13.5px; line-height:1.75; color:#999; transition:color .4s; }
.service-card:hover h3, .service-card:hover p { color:#fff; }

/* GALLERY */
.gallery { background:var(--white); }
.gallery-head { text-align:center; margin-bottom:52px; }
.gallery-head .section-sub { margin:12px auto 0; }
.gallery-grid { display:grid; grid-template-columns:repeat(4,1fr); grid-template-rows:auto auto; gap:14px; }
.gallery-item { overflow:hidden; border-radius:var(--radius-md); position:relative; cursor:pointer; }
.gallery-item img { width:100%; height:220px; object-fit:cover; transition:transform .5s ease; }
.gallery-item:hover img { transform:scale(1.08); }
.gallery-item.tall img { height:454px; }
.gallery-item::after { content:''; position:absolute; inset:0; background:linear-gradient(to top,rgba(26,16,16,.5) 0%,transparent 50%); opacity:0; transition:opacity .4s; }
.gallery-item:hover::after { opacity:1; }

/* PACKAGES */
.packages { background:var(--cream); }
.packages-head { text-align:center; margin-bottom:52px; }
.packages-head .section-sub { margin:12px auto 0; }
.pkg-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:22px; align-items:start; }
.pkg-card { border-radius:var(--radius-lg); overflow:hidden; background:var(--white); border:1.5px solid var(--border); transition:all .4s; position:relative; }
.pkg-card:hover { transform:translateY(-8px); box-shadow:var(--shadow-lg); border-color:var(--rose); }
.pkg-card.featured { border-color:var(--rose); box-shadow:0 8px 40px rgba(198,147,126,.18); }
.pkg-badge { background:var(--rose); color:#fff; font-size:10.5px; font-weight:700; letter-spacing:1.5px; text-align:center; padding:9px; text-transform:uppercase; }
.pkg-img img { width:100%; height:185px; object-fit:cover; }
.pkg-body { padding:26px; }
.pkg-body h3 { font-size:16px; font-weight:700; color:var(--dark); margin-bottom:14px; }
.pkg-list { margin-bottom:20px; }
.pkg-list li { font-size:12.5px; color:var(--muted); padding:5px 0 5px 18px; position:relative; border-bottom:1px solid #f0e8e3; }
.pkg-list li::before { content:'✦'; position:absolute; left:0; color:var(--rose); font-size:8px; top:8px; }
.pkg-price { font-size:12px; color:#bbb; margin-bottom:4px; }
.pkg-amount { font-size:15px; font-weight:700; color:var(--rose); margin-bottom:18px; }
.btn-pkg { display:block; text-align:center; background:var(--rose-light); color:var(--rose); padding:12px; border-radius:10px; font-weight:700; font-size:13px; transition:.3s; }
.btn-pkg:hover { background:var(--rose); color:#fff; }

/* TESTIMONIALS */
.testimonials { background:var(--white); }
.testimonials-head { text-align:center; margin-bottom:52px; }
.testimonials-head .section-sub { margin:12px auto 0; }
.testimonials-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:22px; }
.testi-card { background:var(--cream); border-radius:var(--radius-lg); padding:32px 26px; position:relative; transition:var(--transition); border:1px solid transparent; }
.testi-card:hover { border-color:var(--rose-light); box-shadow:var(--shadow-md); transform:translateY(-4px); }
.testi-card::before { content:'\201C'; position:absolute; top:18px; right:22px; font-family:var(--font-serif); font-size:64px; color:var(--rose-light); line-height:1; }
.testi-stars { display:flex; gap:3px; margin-bottom:14px; }
.testi-stars span { font-size:15px; color:#F59E0B; }
.testi-card p { font-size:14px; line-height:1.85; color:var(--text); margin-bottom:22px; }
.testi-author { display:flex; align-items:center; gap:12px; }
.testi-avatar { width:42px; height:42px; border-radius:50%; object-fit:cover; border:2px solid var(--rose-light); }
.testi-name { font-size:13.5px; font-weight:700; color:var(--dark); }
.testi-sub { font-size:11.5px; color:var(--muted); }

/* CTA */
.cta-section { background:linear-gradient(135deg,var(--dark) 0%,#2d1a14 100%); text-align:center; position:relative; overflow:hidden; }
.cta-section::before { content:''; position:absolute; top:-50%; left:50%; transform:translateX(-50%); width:800px; height:800px; border-radius:50%; background:radial-gradient(circle,rgba(198,147,126,.13) 0%,transparent 70%); }
.cta-section h2 { font-family:var(--font-serif); font-size:clamp(38px,5vw,58px); font-weight:700; color:#fff; margin-bottom:18px; position:relative; }
.cta-section h2 em { color:var(--rose); font-style:italic; }
.cta-section p { font-size:15.5px; color:rgba(255,255,255,.6); max-width:460px; margin:0 auto 38px; position:relative; line-height:1.8; }
.cta-section .btn { position:relative; font-size:15px; }

/* RESPONSIVE */
@media(max-width:900px) {
    .hero { grid-template-columns:1fr; padding-top:100px; text-align:center; }
    .hero-visual { display:none; }
    .hero-text { padding:40px 0 70px; }
    .hero-text .eyebrow { justify-content:center; }
    .hero-actions { justify-content:center; }
    .about-inner, .services-grid, .pkg-grid, .testimonials-grid { grid-template-columns:1fr; }
    .gallery-grid { grid-template-columns:repeat(2,1fr); }
    .gallery-item.tall img { height:220px; }
    .stats-bar { gap:40px; }
    .services-head { flex-direction:column; }
}
@media(max-width:600px) {
    section { padding:70px 5%; }
    .gallery-grid { grid-template-columns:1fr 1fr; }
}
</style>

<!-- HERO -->
<section class="hero" id="home">
    <div class="hero-visual">
        <img src="{{ asset('image/model-mua.jpeg') }}" alt="Professional Makeup Artist">
        <div class="hero-badge">
            <strong>500+</strong>
            <small>Happy Clients</small>
        </div>
    </div>
    <div class="hero-text">
        <div class="eyebrow">Premium MUA Platform</div>
        <h1>Your Beauty,<br><em>Crafted</em><br>Perfectly.</h1>
        <p>Connect with Indonesia's finest makeup artists. Book effortlessly, look stunning — at your studio or doorstep.</p>
        <div class="hero-actions">
            <a href="{{ route('booking.choose-mua') }}" class="btn btn-primary btn-lg">
                Book Now <span class="material-icons-round" style="font-size:19px">arrow_forward</span>
            </a>
            <a href="#about" class="btn-ghost-hero">
                Learn More
                <span class="circle"><span class="material-icons-round" style="font-size:16px">south</span></span>
            </a>
        </div>
    </div>
</section>

<!-- STATS -->
<div class="stats-bar">
    <div class="stat reveal delay-1"><strong data-count="500">500+</strong><small>Clients Served</small></div>
    <div class="stat reveal delay-2"><strong data-count="50">50+</strong><small>Expert MUAs</small></div>
    <div class="stat reveal delay-3"><strong>4.9★</strong><small>Avg Rating</small></div>
    <div class="stat reveal delay-4"><strong data-count="6">6+</strong><small>Years Active</small></div>
</div>

<!-- ABOUT -->
<section class="about" id="about">
    <div class="about-inner">
        <div class="about-imgs reveal-left">
            <img class="main-img" src="{{ asset('image/about-mua.jpeg') }}" alt="About Beautique">
            <img class="accent-img" src="{{ asset('image/makeup1.jpeg') }}" alt="Makeup Detail">
        </div>
        <div class="about-text reveal-right">
            <div class="section-label">Who We Are</div>
            <h2 class="section-title">Beauty Meets<br>Technology</h2>
            <p>Beautique is Indonesia's premium platform connecting clients with professional makeup artists. From intimate bridal preparations to large-scale editorial shoots, we make every beauty experience seamless, transparent, and extraordinary.</p>
            <div class="about-feature">
                <div class="feat-icon"><span class="material-icons-round">verified</span></div>
                <div class="feat-text"><strong>Curated Artists</strong><span>Vetted, certified professionals only</span></div>
            </div>
            <div class="about-feature">
                <div class="feat-icon"><span class="material-icons-round">location_on</span></div>
                <div class="feat-text"><strong>Anywhere in Indonesia</strong><span>Studio visit or doorstep service</span></div>
            </div>
            <div class="about-feature">
                <div class="feat-icon"><span class="material-icons-round">lock</span></div>
                <div class="feat-text"><strong>Secure & Transparent</strong><span>Clear pricing, no hidden fees</span></div>
            </div>
            <div class="about-feature">
                <div class="feat-icon"><span class="material-icons-round">support_agent</span></div>
                <div class="feat-text"><strong>24/7 Support</strong><span>We're here whenever you need us</span></div>
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
            <p>Timeless, radiant looks crafted for your most important day — tailored precisely to your vision and skin tone.</p>
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

<!-- GALLERY -->
<section class="gallery" id="gallery">
    <div class="gallery-head reveal">
        <div class="section-label">Portfolio</div>
        <h2 class="section-title">Our Work</h2>
        <p class="section-sub">A glimpse of the artistry our MUAs bring to every booking.</p>
    </div>
    <div class="gallery-grid">
        <div class="gallery-item tall reveal delay-1">
            <img src="{{ asset('image/model-mua.jpeg') }}" alt="Bridal look">
        </div>
        <div class="gallery-item reveal delay-2">
            <img src="{{ asset('image/makeup1.jpeg') }}" alt="Party glam">
        </div>
        <div class="gallery-item reveal delay-3">
            <img src="{{ asset('image/about-mua.jpeg') }}" alt="Natural look">
        </div>
        <div class="gallery-item tall reveal delay-1">
            <img src="{{ asset('image/makeup1.jpeg') }}" alt="Editorial">
        </div>
        <div class="gallery-item reveal delay-4">
            <img src="{{ asset('image/model-mua.jpeg') }}" alt="Studio session">
        </div>
        <div class="gallery-item reveal delay-2">
            <img src="{{ asset('image/about-mua.jpeg') }}" alt="Event makeup">
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
                <a href="{{ route('booking.choose-mua') }}" class="btn-pkg">Book This Package</a>
            </div>
        </div>
        <div class="pkg-card featured reveal delay-2">
            <div class="pkg-badge">★ Best Choice ★</div>
            <div class="pkg-img"><img src="{{ asset('image/model-mua.jpeg') }}" alt="Creative Glam"></div>
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
                <a href="{{ route('booking.choose-mua') }}" class="btn-pkg">Book This Package</a>
            </div>
        </div>
        <div class="pkg-card reveal delay-3">
            <div class="pkg-img"><img src="{{ asset('image/about-mua.jpeg') }}" alt="Signature Bridal"></div>
            <div class="pkg-body">
                <h3>Signature Bridal &amp; Luxury</h3>
                <ul class="pkg-list">
                    <li>Makeup + premium bridal hairdo</li>
                    <li>Trial makeup before the day</li>
                    <li>Multiple looks (akad, reception)</li>
                    <li>Full-day touch-up service</li>
                    <li>Assistant &amp; stylist team</li>
                </ul>
                <div class="pkg-price">Starting Price</div>
                <div class="pkg-amount">Rp 7.000.000 – Rp 25.000.000+</div>
                <a href="{{ route('booking.choose-mua') }}" class="btn-pkg">Book This Package</a>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials" id="testimonials">
    <div class="testimonials-head reveal">
        <div class="section-label">Reviews</div>
        <h2 class="section-title">What Clients Say</h2>
        <p class="section-sub">Real stories from brides, celebrants, and creators who trusted Beautique.</p>
    </div>
    <div class="testimonials-grid">
        <div class="testi-card reveal delay-1">
            <div class="testi-stars">
                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
            </div>
            <p>"Absolutely stunning work for my wedding. Sarah understood exactly what I wanted — natural yet glowing. Everyone kept complimenting my look all day long!"</p>
            <div class="testi-author">
                <img class="testi-avatar" src="{{ asset('image/model-mua.jpeg') }}" alt="Rina">
                <div><div class="testi-name">Rina Maharani</div><div class="testi-sub">Bride · Jakarta</div></div>
            </div>
        </div>
        <div class="testi-card reveal delay-2">
            <div class="testi-stars">
                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
            </div>
            <p>"I booked a glam look for my company gala and the artist arrived on time, was incredibly professional, and the makeup lasted 10+ hours perfectly. Will definitely rebook!"</p>
            <div class="testi-author">
                <img class="testi-avatar" src="{{ asset('image/about-mua.jpeg') }}" alt="Delia">
                <div><div class="testi-name">Delia Santoso</div><div class="testi-sub">Event Client · Bali</div></div>
            </div>
        </div>
        <div class="testi-card reveal delay-3">
            <div class="testi-stars">
                <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
            </div>
            <p>"The booking process was so smooth — I found, booked, and paid within minutes. The editorial look for my brand campaign exceeded all expectations. Highly recommend!"</p>
            <div class="testi-author">
                <img class="testi-avatar" src="{{ asset('image/makeup1.jpeg') }}" alt="Citra">
                <div><div class="testi-name">Citra Dewi</div><div class="testi-sub">Content Creator · Surabaya</div></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <h2 class="reveal">Ready to Look<br><em>Breathtaking?</em></h2>
    <p class="reveal delay-1">Book your professional makeup artist today. Your perfect look is just a few taps away.</p>
    <a href="{{ route('booking.choose-mua') }}" class="btn btn-primary btn-lg reveal delay-2">
        Book Your MUA <span class="material-icons-round" style="font-size:19px">arrow_forward</span>
    </a>
</section>
@endsection

@push('scripts')
<script>
// Counter animation for stats
document.querySelectorAll('[data-count]').forEach(el => {
    const target = parseInt(el.dataset.count);
    const suffix = el.textContent.replace(/[0-9]/g,'');
    let count = 0;
    const step = Math.ceil(target / 50);
    const observer = new IntersectionObserver(entries => {
        if(entries[0].isIntersecting) {
            const t = setInterval(() => {
                count = Math.min(count + step, target);
                el.textContent = count + suffix;
                if(count >= target) clearInterval(t);
            }, 25);
            observer.disconnect();
        }
    });
    observer.observe(el);
});
</script>
@endpush