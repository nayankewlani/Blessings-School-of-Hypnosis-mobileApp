<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astro Pradeep Kumar | India's Leading Astrologer & Vastu Expert</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Cinzel:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root { --sea-green: #20B2AA; --deep-navy: #0f172a; --gold: #D4AF37; --light-bg: #f8fafc; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #fff; color: var(--deep-navy); }
        h1, h2, h3, .brand-font { font-family: 'Cinzel', serif; font-weight: 700; }

        /* 1. Header & Navigation */
        .navbar { border-bottom: 1px solid #eee; background: white; sticky: top; }
        .btn-consult { background: var(--deep-navy); color: white; border-radius: 50px; font-weight: 600; padding: 10px 25px; }
        
        /* 2. Hero Section - Arun Pandit Style */
        .hero-section { 
            padding: 60px 0; 
            background: linear-gradient(135deg, #fff 0%, #f1f5f9 100%); 
        }
        .hero-title { font-size: 3.5rem; line-height: 1.2; margin-bottom: 20px; }
        .hero-img { border-radius: 30px; box-shadow: 20px 20px 60px rgba(0,0,0,0.1); }

        /* 3. Free Calculator Grid (Reference: astroarunpandit.org) */
        .calc-box { 
            background: white; border-radius: 15px; padding: 20px; text-align: center; 
            border: 1px solid #e2e8f0; transition: 0.3s; cursor: pointer;
        }
        .calc-box:hover { background: var(--sea-green); color: white; transform: translateY(-5px); }
        .calc-box i { font-size: 2rem; margin-bottom: 10px; display: block; }

        /* 4. Service Product Cards */
        .service-card { 
            border: none; border-radius: 20px; background: var(--light-bg); 
            padding: 30px; text-align: left; height: 100%; transition: 0.3s;
        }
        .service-card:hover { background: white; box-shadow: 0 20px 40px rgba(0,0,0,0.05); }
        .price-tag { color: var(--sea-green); font-weight: 800; font-size: 1.2rem; }

        /* 5. Trust Bar (Media/Brands) */
        .trust-bar { background: #fff; padding: 30px 0; border-top: 1px solid #eee; border-bottom: 1px solid #eee; }
        .trust-bar img { height: 40px; opacity: 0.6; filter: grayscale(100%); margin: 0 20px; }

        .btn-order { background: var(--sea-green); color: white; border-radius: 10px; border: none; padding: 10px 20px; width: 100%; font-weight: 700; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg py-3">
    <div class="container">
<a class="navbar-brand d-flex align-items-center" href="#">
    <img src="website-logo/homepage-logo.webp" alt="Astro Pradeep Logo" class="logo-img">
</a>
        <div class="ms-auto d-flex align-items-center">
            <a href="#" class="nav-link me-4 d-none d-lg-block">Free Kundli</a>
            <a href="#" class="nav-link me-4 d-none d-lg-block">Matchmaking</a>
            <button class="btn btn-consult">Get Consultation</button>
        </div>
    </div>
</nav>

<header class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h6 class="text-uppercase fw-bold text-muted mb-3" style="letter-spacing: 2px;">India's No. 1 Astro-Mind Authority</h6>
                <h1 class="hero-title">Your Future is <br><span style="color: #8a6100;">Written in the Stars</span></h1>
                <p class="lead text-muted mb-5">Experience the unique blend of 35+ years of Vedic Astrology and Subconscious Healing with Dr. Pradeep Kumar.</p>
                <div class="d-flex gap-3">
                    <button class="btn btn-consult btn-lg px-5">Book Consultation</button>
                    <button class="btn btn-outline-dark btn-lg px-5">Free Reports</button>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0 text-center">
                <img src="assets/images/dr-pradeep-hero.jpg" class="img-fluid hero-img" alt="Dr. Pradeep Kumar">
            </div>
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-6 col-md-3">
                <div class="calc-box">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span>Free Kundli</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="calc-box">
                    <i class="fa-solid fa-heart"></i>
                    <span>Matchmaking</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="calc-box">
                    <i class="fa-solid fa-calendar-check"></i>
                    <span>Panchang</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="calc-box">
                    <i class="fa-solid fa-gem"></i>
                    <span>Gemstone Suggester</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-6">Our <span class="text-muted">Premium Reports</span></h2>
            <p>Get answers that are backed by science and planetary movements.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="service-card">
                    <h5 class="fw-bold mb-3">Cosmic Code Report</h5>
                    <p class="small text-muted mb-4">A 50+ page detailed analysis of your personality, career, and life purpose based on your unique birth chart.</p>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="price-tag">₹1,100</span>
                        <button class="btn btn-order">Order Now</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <h5 class="fw-bold mb-3">2026 Yearly Prediction</h5>
                    <p class="small text-muted mb-4">Know what the next 12 months hold for your finances, health, and family. Specialized remedies included.</p>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="price-tag">₹999</span>
                        <button class="btn btn-order">Order Now</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-card">
                    <h5 class="fw-bold mb-3">Astro-Vastu Audit</h5>
                    <p class="small text-muted mb-4">Scientific Vastu remedies for your home or office without structural changes. Align your space today.</p>
                    <div class="d-flex justify-content-between align-items-center mt-auto">
                        <span class="price-tag">₹2,500</span>
                        <button class="btn btn-order">Order Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="trust-bar text-center">
    <div class="container">
        <h6 class="text-uppercase small mb-4 fw-bold text-muted">As Seen In Media</h6>
        <div class="d-flex flex-wrap justify-content-center align-items-center gap-4">
            <img src="assets/images/logo-ani.png" alt="ANI">
            <img src="assets/images/logo-zee.png" alt="Zee News">
            <img src="assets/images/logo-ht.png" alt="Hindustan Times">
            <img src="assets/images/logo-toi.png" alt="Times of India">
        </div>
    </div>
</section>
<section class="py-5" style="background: #f8fafc;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="assets/images/vastu-chart.jpg" class="img-fluid rounded-5 shadow-lg" alt="Scientific Vastu Audit India">
            </div>
            <div class="col-lg-6 ps-lg-5">
                <h2 class="brand-font mb-4">Scientific Vastu: <br><span style="color: var(--sea-green);">No Demolition, Only Alignment</span></h2>
                <p class="text-muted mb-4">
                    Dr. Pradeep Kumar combines <strong>Vedic Vastu</strong> with <strong>Astrological Planetary Dashas</strong>. We don't just fix your house; we fix the energy resonance between your home and your birth chart.
                </p>
                <div class="row g-3">
                    <div class="col-6">
                        <div class="p-3 bg-white rounded-4 shadow-sm">
                            <i class="fa fa-briefcase text-info mb-2"></i>
                            <h6 class="fw-bold">Business Vastu</h6>
                            <p class="small text-muted mb-0">Boost profits and remove cash-flow blocks.</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 bg-white rounded-4 shadow-sm">
                            <i class="fa fa-heart text-danger mb-2"></i>
                            <h6 class="fw-bold">Residential Vastu</h6>
                            <p class="small text-muted mb-0">Enhance health, peace, and family harmony.</p>
                        </div>
                    </div>
                </div>
                <button class="btn btn-main mt-4">Book Your Site Audit</button>
            </div>
        </div>
    </div>
</section>
<section class="py-5 text-white" style="background: linear-gradient(135deg, #0f172a 0%, #20B2AA 100%);">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="brand-font mb-4">India's Only Integrated <br>Destiny & Mind Institute</h2>
                <p class="lead mb-5 opacity-75">
                    "Astrology shows the obstacles; Hypnosis gives you the strength to overcome them." — <strong>Dr. Pradeep Kumar</strong>
                </p>
                <div class="row g-4 text-center">
                    <div class="col-md-4">
                        <h1 class="fw-bold">1M+</h1>
                        <p class="small text-uppercase tracking-widest">Students Empowered</p>
                    </div>
                    <div class="col-md-4">
                        <h1 class="fw-bold">35+</h1>
                        <p class="small text-uppercase tracking-widest">Years of Vedic Research</p>
                    </div>
                    <div class="col-md-4">
                        <h1 class="fw-bold">80+</h1>
                        <p class="small text-uppercase tracking-widest">Countries Reached</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="py-5 bg-dark text-white">
    <div class="container text-center">
        <h2 class="brand-font mb-4">ASTRO <span style="color: var(--sea-green);">PRADEEP</span></h2>
        <div class="mb-4 d-flex justify-content-center gap-4">
            <a href="#" class="text-white text-decoration-none">Terms</a>
            <a href="#" class="text-white text-decoration-none">Privacy Policy</a>
            <a href="#" class="text-white text-decoration-none">Contact Us</a>
        </div>
        <p class="small text-secondary">&copy; 2026 Dr. Pradeep Kumar | Blessings School of Hypnosis. Trusted globally across 80+ countries.</p>
    </div>
</footer>

</body>
</html>