@extends('layouts.app')

@section('title', 'Beautique MUA — Book Your Makeup Artist')
@section('meta_description', 'Connect with Indonesia\'s top professional makeup artists. Book seamlessly for bridal, party, and editorial looks.')

@push('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .hero-bg {
            background: linear-gradient(135deg, var(--color-cream) 55%, var(--color-cream-dark) 100%);
        }
    </style>
@endpush

@section('content')

    <!-- HERO SECTION -->
    <section id="home"
        class="hero-bg relative min-h-screen flex items-center pt-24 lg:pt-0 overflow-hidden px-4 md:px-10 lg:px-20">
        <!-- Decorative Orbs -->
        <div
            class="absolute top-[-100px] right-[-100px] w-[500px] h-[500px] rounded-full bg-[radial-gradient(circle,rgba(198,147,126,0.15)_0%,transparent_70%)] animate-pulse hidden lg:block">
        </div>
        <div class="absolute bottom-[-50px] left-[5%] w-[300px] h-[300px] rounded-full bg-[radial-gradient(circle,rgba(238,215,206,0.4)_0%,transparent_70%)] animate-pulse hidden lg:block"
            style="animation-direction: reverse; animation-duration: 7s;"></div>

        <div class="max-w-7xl mx-auto w-full grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-8 items-center relative z-10">
            <!-- Text Content -->
            <div class="order-2 lg:order-1 text-center lg:text-left reveal pb-16 lg:pb-0">
                <div class="section-label justify-center lg:justify-start">Premium MUA Platform</div>
                <h1
                    class="text-4xl sm:text-5xl md:text-6xl lg:text-[70px] leading-[1.1] text-dark mb-6 font-bold font-serif">
                    Your Beauty,<br>
                    <em class="text-brand not-italic">Crafted</em><br>
                    Perfectly.
                </h1>
                <p class="text-[15px] sm:text-base leading-[1.8] text-muted max-w-[420px] mx-auto lg:mx-0 mb-10">
                    Connect with Indonesia's finest makeup artists. Book effortlessly, look stunning — at your studio or
                    doorstep.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="{{ route('booking.choose-mua') }}" class="btn-primary w-full sm:w-auto justify-center">
                        Book Your Makeup Artist
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </a>
                    <a href="#about"
                        class="group flex items-center justify-center gap-2 text-sm font-medium text-dark hover:text-brand transition-colors duration-300 w-full sm:w-auto py-3">
                        Learn More
                        <span
                            class="w-8 h-8 rounded-full border-2 border-current flex items-center justify-center transition-transform duration-300 group-hover:translate-y-1">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5v14M19 12l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>

            <!-- Visual -->
            <div class="order-1 lg:order-2 relative reveal-right flex justify-center lg:justify-end mt-8 lg:mt-0">
                <div class="relative w-full max-w-[380px] lg:max-w-[460px]">
                    <img src="{{ asset('image/model-mua.jpeg') }}" alt="Professional Makeup Artist"
                        class="w-full h-[400px] lg:h-[580px] object-cover rounded-[32px] rounded-bl-none shadow-2xl">
                    <!-- Floating Badge -->
                    <div
                        class="absolute -top-4 sm:top-8 -right-4 sm:-right-8 bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-[0_8px_30px_rgba(0,0,0,0.1)] animate-float border border-white/40">
                        <strong class="block text-xl lg:text-2xl font-serif font-bold text-brand">500+</strong>
                        <span class="text-[11px] text-muted font-medium uppercase tracking-wider">Happy Clients</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS BAR -->
    <div class="bg-dark py-12 px-4 md:px-10 lg:px-20 relative z-20">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-center gap-10 md:gap-16 lg:gap-24">
            <div class="text-center reveal delay-1"><strong
                    class="block font-serif text-3xl md:text-4xl font-bold text-brand mb-1"
                    data-count="500">500+</strong><span
                    class="text-[10px] md:text-[11px] opacity-60 tracking-[2px] uppercase text-white font-medium">Clients
                    Served</span></div>
            <div class="text-center reveal delay-2"><strong
                    class="block font-serif text-3xl md:text-4xl font-bold text-brand mb-1"
                    data-count="50">50+</strong><span
                    class="text-[10px] md:text-[11px] opacity-60 tracking-[2px] uppercase text-white font-medium">Expert
                    MUAs</span></div>
            <div class="text-center reveal delay-3"><strong
                    class="block font-serif text-3xl md:text-4xl font-bold text-brand mb-1">4.9★</strong><span
                    class="text-[10px] md:text-[11px] opacity-60 tracking-[2px] uppercase text-white font-medium">Avg
                    Rating</span></div>
            <div class="text-center reveal delay-4"><strong
                    class="block font-serif text-3xl md:text-4xl font-bold text-brand mb-1"
                    data-count="6">6+</strong><span
                    class="text-[10px] md:text-[11px] opacity-60 tracking-[2px] uppercase text-white font-medium">Years
                    Active</span></div>
        </div>
    </div>

    <!-- ABOUT SECTION -->
    <section id="about" class="py-24 lg:py-32 bg-white px-4 md:px-10 lg:px-20 overflow-hidden">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24 items-center">
            <div class="relative reveal-left">
                <img src="{{ asset('image/about-mua.jpeg') }}" alt="About Beautique"
                    class="w-full h-[400px] lg:h-[540px] object-cover rounded-3xl shadow-lg">
                <img src="{{ asset('image/makeup1.jpeg') }}" alt="Makeup Detail"
                    class="absolute -bottom-8 -right-8 w-40 lg:w-56 h-40 lg:h-56 object-cover rounded-2xl border-8 border-white shadow-xl animate-float hidden sm:block">
            </div>
            <div class="reveal-right">
                <div class="section-label">Who We Are</div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl leading-tight text-dark mb-6 font-bold font-serif">Beauty
                    Meets<br>Technology</h2>
                <p class="text-[15px] leading-relaxed text-muted mb-10">
                    Beautique is Indonesia's premium platform connecting clients with professional makeup artists. From
                    intimate bridal preparations to large-scale editorial shoots, we make every beauty experience seamless,
                    transparent, and extraordinary.
                </p>
                <div class="space-y-6">
                    <!-- Trust Indicator 1 -->
                    <div class="flex gap-4 items-start">
                        <div
                            class="w-12 h-12 rounded-2xl bg-brand-light flex items-center justify-center shrink-0 text-brand">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 12 2 2 4-4" />
                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" />
                            </svg>
                        </div>
                        <div>
                            <strong class="block text-[15px] font-bold text-dark mb-1">Verified Artists</strong>
                            <span class="text-[13.5px] text-muted">Vetted, certified professionals only</span>
                        </div>
                    </div>
                    <!-- Trust Indicator 2 -->
                    <div class="flex gap-4 items-start">
                        <div
                            class="w-12 h-12 rounded-2xl bg-brand-light flex items-center justify-center shrink-0 text-brand">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <div>
                            <strong class="block text-[15px] font-bold text-dark mb-1">Anywhere in Indonesia</strong>
                            <span class="text-[13.5px] text-muted">Studio visit or doorstep service</span>
                        </div>
                    </div>
                    <!-- Trust Indicator 3 -->
                    <div class="flex gap-4 items-start">
                        <div
                            class="w-12 h-12 rounded-2xl bg-brand-light flex items-center justify-center shrink-0 text-brand">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                        </div>
                        <div>
                            <strong class="block text-[15px] font-bold text-dark mb-1">Secure & Transparent</strong>
                            <span class="text-[13.5px] text-muted">Clear pricing, no hidden fees</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
    <section id="services" class="py-24 lg:py-32 bg-cream px-4 md:px-10 lg:px-20">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end mb-16 gap-6 reveal">
                <div>
                    <div class="section-label">What We Offer</div>
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-serif text-dark">Our Services</h2>
                </div>
                <p class="text-[15px] text-muted max-w-md lg:text-right">Three core specialties, each delivered by
                    artists who live and breathe beauty.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div
                    class="bg-white rounded-[24px] p-8 md:p-10 transition-all duration-500 hover:-translate-y-3 hover:shadow-[0_30px_60px_rgba(198,147,126,0.15)] group relative overflow-hidden reveal delay-1">
                    <div
                        class="absolute inset-0 bg-linear-to-br from-brand to-brand-dark opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 rounded-2xl bg-brand-light flex items-center justify-center text-brand mb-8 transition-colors duration-500 group-hover:bg-white/20 group-hover:text-white">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9.06 11.9 8.07-8.06a2.85 2.85 0 1 1 4.03 4.03l-8.06 8.08" />
                                <path
                                    d="M7.07 14.94c-1.66 0-3 1.35-3 3.02 0 1.33-2.5 1.52-2 2.02 1.08 1.1 2.49 2.02 4 2.02 2.2 0 4-1.8 4-4.04a3.01 3.01 0 0 0-3-3.02z" />
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold text-dark mb-4 transition-colors duration-500 group-hover:text-white font-serif">
                            Bridal Makeup</h3>
                        <p
                            class="text-[14px] leading-relaxed text-muted transition-colors duration-500 group-hover:text-white/90">
                            Timeless, radiant looks crafted for your most important day — tailored precisely to your vision
                            and skin tone.</p>
                    </div>
                </div>
                <!-- Service 2 -->
                <div
                    class="bg-white rounded-[24px] p-8 md:p-10 transition-all duration-500 hover:-translate-y-3 hover:shadow-[0_30px_60px_rgba(198,147,126,0.15)] group relative overflow-hidden reveal delay-2">
                    <div
                        class="absolute inset-0 bg-linear-to-br from-brand to-brand-dark opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 rounded-2xl bg-brand-light flex items-center justify-center text-brand mb-8 transition-colors duration-500 group-hover:bg-white/20 group-hover:text-white">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v14Z" />
                                <path d="M12 12h.01" />
                                <path d="M16 16h.01" />
                                <path d="M8 8h.01" />
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold text-dark mb-4 transition-colors duration-500 group-hover:text-white font-serif">
                            Party & Event</h3>
                        <p
                            class="text-[14px] leading-relaxed text-muted transition-colors duration-500 group-hover:text-white/90">
                            Glamorous, long-lasting looks that photograph beautifully and endure every moment of
                            celebration.</p>
                    </div>
                </div>
                <!-- Service 3 -->
                <div
                    class="bg-white rounded-[24px] p-8 md:p-10 transition-all duration-500 hover:-translate-y-3 hover:shadow-[0_30px_60px_rgba(198,147,126,0.15)] group relative overflow-hidden reveal delay-3">
                    <div
                        class="absolute inset-0 bg-linear-to-br from-brand to-brand-dark opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="relative z-10">
                        <div
                            class="w-16 h-16 rounded-2xl bg-brand-light flex items-center justify-center text-brand mb-8 transition-colors duration-500 group-hover:bg-white/20 group-hover:text-white">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                                <circle cx="9" cy="9" r="2" />
                                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                            </svg>
                        </div>
                        <h3
                            class="text-xl font-bold text-dark mb-4 transition-colors duration-500 group-hover:text-white font-serif">
                            Editorial & Photoshoot</h3>
                        <p
                            class="text-[14px] leading-relaxed text-muted transition-colors duration-500 group-hover:text-white/90">
                            High-impact, camera-ready artistry for portraits, campaigns, and creative content production.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PACKAGES SECTION -->
    <section id="packages" class="py-24 lg:py-32 bg-white px-4 md:px-10 lg:px-20">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 reveal">
                <div class="section-label mx-auto">Pricing</div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-serif text-dark mb-4">Featured Packages</h2>
                <p class="text-[15px] text-muted">Transparent, flexible packages for every occasion and budget.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-center">
                <!-- Package 1 -->
                <div
                    class="rounded-3xl border border-border bg-white overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2 reveal delay-1">
                    <img src="{{ asset('image/makeup1.jpeg') }}" alt="Basic" class="w-full h-56 object-cover">
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-dark mb-6 font-serif">Basic Beauty</h3>
                        <ul class="space-y-4 mb-8">
                            <li class="flex gap-3 text-[13.5px] text-muted"><span class="text-brand">✦</span> Makeup
                                1x (party / event)</li>
                            <li class="flex gap-3 text-[13.5px] text-muted"><span class="text-brand">✦</span> Hair
                                styling / hijab styling</li>
                            <li class="flex gap-3 text-[13.5px] text-muted"><span class="text-brand">✦</span> 1
                                look, no changes</li>
                        </ul>
                        <div class="text-[12px] text-[#999] mb-1">Starting Price</div>
                        <div class="text-lg font-bold text-brand mb-6">Rp 500.000+</div>
                        <a href="{{ route('booking.choose-mua') }}"
                            class="block w-full text-center py-3.5 rounded-xl bg-brand-light text-brand font-bold text-sm transition-colors hover:bg-brand hover:text-white">Book
                            This Package</a>
                    </div>
                </div>

                <!-- Package 2 (Featured) -->
                <div
                    class="rounded-3xl border-2 border-brand bg-white overflow-hidden shadow-[0_10px_40px_rgba(198,147,126,0.15)] relative z-10 lg:scale-105 transition-all duration-300 hover:-translate-y-2 reveal delay-2">
                    <div class="bg-brand text-white text-[11px] font-bold tracking-[2px] uppercase text-center py-2.5">★
                        Best Choice ★</div>
                    <img src="{{ asset('image/model-mua.jpeg') }}" alt="Glam" class="w-full h-56 object-cover">
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-dark mb-6 font-serif">Creative Glam</h3>
                        <ul class="space-y-4 mb-8">
                            <li class="flex gap-3 text-[13.5px] text-muted"><span class="text-brand">✦</span> Makeup
                                + premium hairdo</li>
                            <li class="flex gap-3 text-[13.5px] text-muted"><span class="text-brand">✦</span> 1–2
                                looks with touch-up</li>
                            <li class="flex gap-3 text-[13.5px] text-muted"><span class="text-brand">✦</span> Light
                                touch-up during event</li>
                            <li class="flex gap-3 text-[13.5px] text-muted"><span class="text-brand">✦</span>
                                Photo-ready, long-lasting</li>
                        </ul>
                        <div class="text-[12px] text-[#999] mb-1">Starting Price</div>
                        <div class="text-xl font-bold text-brand mb-6">Rp 2.500.000+</div>
                        <a href="{{ route('booking.choose-mua') }}"
                            class="block w-full text-center py-3.5 rounded-xl bg-brand text-white font-bold text-sm transition-colors hover:bg-brand-dark">Book
                            This Package</a>
                    </div>
                </div>

                <!-- Package 3 -->
                <div
                    class="rounded-3xl border border-border bg-white overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-2 reveal delay-3">
                    <img src="{{ asset('image/about-mua.jpeg') }}" alt="Bridal" class="w-full h-56 object-cover">
                    <div class="p-8">
                        <h3 class="text-xl font-bold text-dark mb-6 font-serif">Signature Bridal</h3>
                        <ul class="space-y-4 mb-8">
                            <li class="flex gap-3 text-[13.5px] text-muted"><span class="text-brand">✦</span> Makeup
                                + premium bridal hairdo</li>
                            <li class="flex gap-3 text-[13.5px] text-muted"><span class="text-brand">✦</span> Trial
                                makeup before the day</li>
                            <li class="flex gap-3 text-[13.5px] text-muted"><span class="text-brand">✦</span>
                                Multiple looks & full touch-up</li>
                        </ul>
                        <div class="text-[12px] text-[#999] mb-1">Starting Price</div>
                        <div class="text-lg font-bold text-brand mb-6">Rp 7.000.000+</div>
                        <a href="{{ route('booking.choose-mua') }}"
                            class="block w-full text-center py-3.5 rounded-xl bg-brand-light text-brand font-bold text-sm transition-colors hover:bg-brand hover:text-white">Book
                            This Package</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS (Swiper.js) -->
    <section id="testimonials" class="py-24 lg:py-32 bg-cream px-4 md:px-10 lg:px-20 overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 reveal">
                <div class="section-label mx-auto">Reviews</div>
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold font-serif text-dark mb-4">What Clients Say</h2>
                <p class="text-[15px] text-muted">Real stories from brides, celebrants, and creators who trusted
                    Beautique.</p>
            </div>

            <div class="swiper testimonial-swiper reveal pb-12">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-3xl p-8 md:p-10 h-full border border-transparent transition-all duration-300 hover:border-brand-light hover:shadow-lg relative group">
                            <div
                                class="absolute top-8 right-8 text-[60px] font-serif text-brand-light leading-none group-hover:text-brand transition-colors">
                                "</div>
                            <div class="flex gap-1 text-[#F59E0B] mb-6 text-sm">★★★★★</div>
                            <p class="text-[15px] leading-relaxed text-dark mb-8 relative z-10">"Absolutely stunning
                                work for my wedding. Sarah understood exactly what I wanted — natural yet glowing. Everyone
                                kept complimenting my look all day long!"</p>
                            <div class="flex items-center gap-4 mt-auto">
                                <img src="{{ asset('image/model-mua.jpeg') }}" alt="Client"
                                    class="w-12 h-12 rounded-full object-cover border-2 border-brand-light">
                                <div>
                                    <div class="text-[14px] font-bold text-dark">Rina Maharani</div>
                                    <div class="text-[12px] text-muted">Bride · Jakarta</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-3xl p-8 md:p-10 h-full border border-transparent transition-all duration-300 hover:border-brand-light hover:shadow-lg relative group">
                            <div
                                class="absolute top-8 right-8 text-[60px] font-serif text-brand-light leading-none group-hover:text-brand transition-colors">
                                "</div>
                            <div class="flex gap-1 text-[#F59E0B] mb-6 text-sm">★★★★★</div>
                            <p class="text-[15px] leading-relaxed text-dark mb-8 relative z-10">"I booked a glam look
                                for my company gala and the artist arrived on time, was incredibly professional, and the
                                makeup lasted 10+ hours perfectly. Will definitely rebook!"</p>
                            <div class="flex items-center gap-4 mt-auto">
                                <img src="{{ asset('image/about-mua.jpeg') }}" alt="Client"
                                    class="w-12 h-12 rounded-full object-cover border-2 border-brand-light">
                                <div>
                                    <div class="text-[14px] font-bold text-dark">Delia Santoso</div>
                                    <div class="text-[12px] text-muted">Event Client · Bali</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="swiper-slide h-auto">
                        <div
                            class="bg-white rounded-3xl p-8 md:p-10 h-full border border-transparent transition-all duration-300 hover:border-brand-light hover:shadow-lg relative group">
                            <div
                                class="absolute top-8 right-8 text-[60px] font-serif text-brand-light leading-none group-hover:text-brand transition-colors">
                                "</div>
                            <div class="flex gap-1 text-[#F59E0B] mb-6 text-sm">★★★★★</div>
                            <p class="text-[15px] leading-relaxed text-dark mb-8 relative z-10">"The booking process
                                was so smooth — I found, booked, and paid within minutes. The editorial look for my brand
                                campaign exceeded all expectations. Highly recommend!"</p>
                            <div class="flex items-center gap-4 mt-auto">
                                <img src="{{ asset('image/makeup1.jpeg') }}" alt="Client"
                                    class="w-12 h-12 rounded-full object-cover border-2 border-brand-light">
                                <div>
                                    <div class="text-[14px] font-bold text-dark">Citra Dewi</div>
                                    <div class="text-[12px] text-muted">Content Creator · Surabaya</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination mt-8"></div>
            </div>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="py-24 lg:py-32 bg-linear-to-br from-dark to-dark-muted relative overflow-hidden text-center px-4">
        <!-- Background Decor -->
        <div
            class="absolute top-[-50%] left-1/2 -translate-x-1/2 w-[600px] h-[600px] rounded-full bg-[radial-gradient(circle,rgba(198,147,126,0.15)_0%,transparent_70%)]">
        </div>

        <div class="relative z-10 max-w-2xl mx-auto">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold font-serif text-white mb-6 reveal">Ready to Look<br><em
                    class="text-brand not-italic">Breathtaking?</em></h2>
            <p class="text-base text-white/60 mb-10 reveal delay-1">Book your professional makeup artist today. Your perfect
                look is just a few taps away.</p>
            <a href="{{ route('booking.choose-mua') }}"
                class="btn-primary px-8 py-4 text-[15px] reveal delay-2 inline-flex">
                Book Your MUA Now
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Counter Animation
        document.querySelectorAll('[data-count]').forEach(el => {
            const target = parseInt(el.dataset.count);
            const suffix = el.textContent.replace(/[0-9]/g, '');
            let count = 0;
            const step = Math.ceil(target / 50);
            const observer = new IntersectionObserver(entries => {
                if (entries[0].isIntersecting) {
                    const t = setInterval(() => {
                        count = Math.min(count + step, target);
                        el.textContent = count + suffix;
                        if (count >= target) clearInterval(t);
                    }, 30);
                    observer.unobserve(el);
                }
            });
            observer.observe(el);
        });

        // Swiper Init
        const swiper = new Swiper('.testimonial-swiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
    </script>
@endpush