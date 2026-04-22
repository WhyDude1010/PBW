<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUA Project - Full Landing Page</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        /* --- RESET & GLOBAL STYLE --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FAF5F0; 
            color: #333;
            scroll-behavior: smooth;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* --- NAVBAR SECTION --- */
        header {
            padding: 30px 0;
        }

        .navbar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .nav-links {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links li a {
            text-decoration: none;
            color: #333;
            font-size: 15px;
            font-weight: 500;
        }

        .nav-item-signup {
            display: flex;
            align-items: center;
            border-left: 1.5px solid #ccc;
            padding-left: 25px;
            margin-left: 5px;
        }

        .btn-signup {
            background-color: #C6937E;
            color: white !important;
            padding: 10px 25px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
        }

        /* --- HERO SECTION --- */
        .hero {
            display: flex;
            align-items: stretch;
            justify-content: space-between;
            min-height: 550px;
            gap: 20px;
        }

        .hero-image {
            flex: 1;
            display: flex;
            align-items: flex-end;
        }

        .hero-image img {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 20px 20px 0 0;
            object-fit: cover;
        }

        .hero-text {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding-left: 40px;
        }

        .hero-text h1 {
            font-size: 60px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
            color: #000;
        }

        .hero-text p {
            font-size: 18px;
            margin-bottom: 35px;
            color: #555;
            max-width: 450px;
        }

        .btn-book {
            background-color: #C6937E;
            color: white;
            padding: 16px 35px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            width: fit-content;
        }

        /* --- ABOUT US SECTION --- */
        .about {
            padding: 100px 0;
        }

        .about-title {
            text-align: center;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 50px;
        }

        .about-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .about-img-box {
            flex: 1;
        }

        .about-img-box img {
            width: 100%;
            height: 400px;
            border-radius: 20px;
            object-fit: cover;
        }

        .about-text-box {
            flex: 1.2;
            background-color: #EED7CE;
            padding: 45px;
            border-radius: 25px;
        }

        .about-text-box p {
            font-size: 15px;
            line-height: 1.8;
            color: #444;
        }

        /* --- OUR SERVICES SECTION --- */
        .services {
            padding: 60px 0 60px 0;
            text-align: center;
        }

        .services h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 50px;
        }

        .services-grid {
            display: flex;
            gap: 25px;
            justify-content: center;
        }

        .service-card {
            background-color: #EED7CE;
            padding: 45px 30px;
            border-radius: 25px;
            flex: 1;
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-10px);
            background-color: #C6937E;
            color: white;
        }

        .icon-box {
            font-size: 45px;
            margin-bottom: 20px;
        }

        .service-card h3 {
            margin-bottom: 15px;
            font-size: 20px;
            font-weight: 700;
        }

        .service-card p {
            font-size: 14px;
            line-height: 1.6;
        }

        /* --- FEATURED PACKAGES SECTION --- */
        .packages {
            padding: 60px 0 120px 0;
            text-align: center;
        }

        .packages h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 50px;
        }

        .package-grid {
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: stretch;
        }

        .package-card {
            background: white;
            border: 1px solid #E0E0E0;
            border-radius: 20px;
            flex: 1;
            padding: 20px;
            text-align: left;
            position: relative;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }

        .best-choice-badge {
            position: absolute;
            top: -12px;
            right: 15px;
            background-color: #EED7CE;
            padding: 5px 15px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            border: 1px solid #C6937E;
            z-index: 10;
        }

        .package-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        .package-card h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
            min-height: 45px;
        }

        .package-card .including {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .package-card ul {
            list-style: none;
            padding: 0;
            margin-bottom: 25px;
            flex-grow: 1;
        }

        .package-card ul li {
            font-size: 13px;
            color: #555;
            margin-bottom: 6px;
            padding-left: 15px;
            position: relative;
        }

        .package-card ul li::before {
            content: "•";
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        .price-box {
            margin-top: auto;
            margin-bottom: 20px;
        }

        .price-box span {
            display: block;
            font-size: 14px;
            font-weight: 700;
        }

        .price-box .amount {
            font-size: 15px;
            font-weight: 600;
            color: #333;
        }

        .btn-view {
            display: block;
            text-align: center;
            background-color: #E0E0E0;
            color: #333;
            text-decoration: none;
            padding: 12px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .btn-view:hover {
            background-color: #C6937E;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <nav class="navbar">
                <ul class="nav-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Packages</a></li>
                    <li><a href="#">Testimonials</a></li>
                    <li><a href="#">Login</a></li>
                    <li class="nav-item-signup">
                        <a href="#" class="btn-signup">Sign Up</a>
                    </li>
                </ul>
            </nav>
        </header>

        <section class="hero">
            <div class="hero-image">
                <img src="{{ asset('image/model-mua.jpeg') }}" alt="Hero Model">
            </div>
            <div class="hero-text">
                <h1>Book Your<br>Makeup Artist</h1>
                <p>Professional makeup artists available at your studio or doorstep.</p>
                <a href="#" class="btn-book">Book Your Makeup Artist</a>
            </div>
        </section>

        <section class="about">
            <h2 class="about-title">About Us</h2>
            <div class="about-content">
                <div class="about-img-box">
                    <img src="{{ asset('image/about-mua.jpeg') }}" alt="About Us Story">
                </div>
                <div class="about-text-box">
                    <p>
                        We are a digital platform that connects clients with professional Makeup Artists (MUA) for a seamless and personalized beauty experience. Designed with a user-centered booking flow, our service simplifies the process of finding, scheduling, and experiencing high-quality makeup services—anytime and anywhere.
                        <br><br>
                        Our platform supports three primary services: bridal, party events, and editorial makeup, ensuring that every client—from everyday users to professional productions—can find the right expertise tailored to their needs.
                    </p>
                </div>
            </div>
        </section>

        <section class="services">
            <h2>Our Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="icon-box">👰</div>
                    <h3>Bridal Makeup</h3>
                    <p>Timeless and elegant looks for your most important day, tailored to your vision.</p>
                </div>
                <div class="service-card">
                    <div class="icon-box">🎉</div>
                    <h3>Party & Event</h3>
                    <p>Glamorous looks that last through the night for any special occasion.</p>
                </div>
                <div class="service-card">
                    <div class="icon-box">📸</div>
                    <h3>Editorial & Photoshoot</h3>
                    <p>High-impact, camera-ready artistry for your portraits and creative content.</p>
                </div>
            </div>
        </section>

        <section class="packages">
            <h2>Featured Packages</h2>
            <div class="package-grid">
                
                <div class="package-card">
                    <img src="{{ asset('image/makeup1.jpeg') }}" alt="Basic Beauty">
                    <h3>Basic Beauty Package</h3>
                    <p class="including">Including:</p>
                    <ul>
                        <li>Makeup 1x (party / event)</li>
                        <li>Hair styling sederhana / hijab styling</li>
                        <li>1 look (tanpa perubahan)</li>
                        <li>Tanpa touch up</li>
                    </ul>
                    <div class="price-box">
                        <span>Starting Price:</span>
                        <span class="amount">Rp500.000 - Rp2.000.000</span>
                    </div>
                    <a href="#" class="btn-view">View Package</a>
                </div>

                <div class="package-card">
                    <div class="best-choice-badge">Best Choice</div>
                    <img src="{{ asset('image/makeup1.jpeg') }}" alt="Creative Glam">
                    <h3>Creative Glam Package</h3>
                    <p class="including">Including:</p>
                    <ul>
                        <li>Makeup + hairdo premium</li>
                        <li>1-2 look (touch-up / minor change)</li>
                        <li>Light touch up during event</li>
                        <li>Personal consultation (face shape, tone, concept)</li>
                        <li>Photo-ready & long-lasting finish</li>
                    </ul>
                    <div class="price-box">
                        <span>Starting Price:</span>
                        <span class="amount">Rp2.500.000 - Rp6.000.000</span>
                    </div>
                    <a href="#" class="btn-view">View Package</a>
                </div>

                <div class="package-card">
                    <img src="{{ asset('image/makeup1.jpeg') }}" alt="Signature Bridal">
                    <h3>Signature Bridal & Luxury Package</h3>
                    <p class="including">Including:</p>
                    <ul>
                        <li>Makeup + hairdo premium (bridal standard)</li>
                        <li>Trial makeup sebelum hari H</li>
                        <li>Multiple look (akad, resepsi, editorial)</li>
                        <li>Full-day touch up</li>
                        <li>Assistant & stylist team</li>
                        <li>Konsultasi intensif & custom concept</li>
                    </ul>
                    <div class="price-box">
                        <span>Starting Price:</span>
                        <span class="amount">Rp7.000.000 - Rp25.000.000+</span>
                    </div>
                    <a href="#" class="btn-view">View Profile</a>
                </div>

            </div>
        </section>
    </div>

</body>
</html>