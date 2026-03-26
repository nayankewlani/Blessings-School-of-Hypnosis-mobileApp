<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Pradeep Kumar | Vedic Astrology & Mind Healing</title>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cinzel:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand" href="index.php">
            <!-- <h5 class="mb-0">ASTRO <span style="color:#ffffff;">PRADEEP</span></h5> -->
             <img src="website-logo/22.png" alt="Astro Pradeep Kumar" srcset="" width="150px">
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" 
                data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='index.php') echo 'active'; ?>" href="index.php">
                        Home
                    </a>
                </li>

                <!-- Horoscope Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Horoscope
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Daily Horoscope</a></li>
                        <li><a class="dropdown-item" href="#">Weekly Horoscope</a></li>
                        <li><a class="dropdown-item" href="#">Monthly Horoscope</a></li>
                        <li><a class="dropdown-item" href="#Yearly_horoscope">Yearly Horoscope 2026</a></li>
                    </ul>
                </li>

                <!-- Astrology Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        Astrology
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Kundli</a></li>
                        <li><a class="dropdown-item" href="#">Match Making</a></li>
                        <li><a class="dropdown-item" href="#">Numerology</a></li>
                        <li><a class="dropdown-item" href="#">Palmistry</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="book-session.php">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="Panchang.php">Panchang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="Festivals.php">Festivals</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Calculator.php">Calculator</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vedic-wisdom.php">Vedic Wisdom</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
<!-- 2026 Dropdown with Submenu -->
<li class="nav-item dropdown d-none">
    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
        2026
    </a>

    <ul class="dropdown-menu">

        <!-- Numerology -->
        <li class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">Numerology 2026</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Personal Year Number</a></li>
                <li><a class="dropdown-item" href="#">Name Numerology</a></li>
            </ul>
        </li>

        <!-- Holiday -->
        <li class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">Holiday Calendar 2026</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Indian Holidays</a></li>
                <li><a class="dropdown-item" href="#">Bank Holidays</a></li>
            </ul>
        </li>

        <!-- Muhurat -->
        <li class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">Muhurats 2026</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Marriage Muhurat</a></li>
                <li><a class="dropdown-item" href="#">Griha Pravesh</a></li>
            </ul>
        </li>

        <!-- Transit -->
        <li class="dropdown-submenu">
            <a class="dropdown-item dropdown-toggle" href="#">Transit 2026</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Planet Transit</a></li>
            </ul>
        </li>

        <!-- Gochar -->
        <li><a class="dropdown-item" href="#">गोचर 2026</a></li>

        <!-- Eclipse -->
        <li><a class="dropdown-item" href="#">Eclipse 2026</a></li>

    </ul>
</li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero-unified">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start">
                <div class="badge-vibe mb-3">Ancient Wisdom • Modern Science</div>
                <h1 class="hero-title mb-4">Master Your <br><span>Karmic Energy</span></h1>
<p class="lead mb-1 opacity-75">
Get clarity in love, career, marriage, and life decisions with 25+ years of trusted Vedic Astrology experience by <strong>Astro Pradeep Kumar</strong>.
</p>                <p class="small text-muted">
Trusted by thousands across India • 100% Confidential Consultation
</p>
                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3">
<button class="btn-kundli">Get Free Kundli</button>    
                <button class="btn-consultation" onclick="window.location.href='book-session.php'">
    Book Consultation Now
</button>
                </div>
            </div>
            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <div class="hero-image-container">
                    <div class="halo-effect"></div>
                    <img src="assets/images/vedic-astro.jpeg" class="img-fluid dr-hero-img" alt="Dr. Pradeep Kumar">
                    <div class="floating-stat shadow d-none">
                        <h4>##</h4>
                        <p>Years Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="as_about_wrapper as_padderTop80 as_padderBottom80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h2 class="as_heading mt-4">About Astrology</h2>
                        <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="240" height="15" viewBox="0 0 240 15">
                            <image id="Vector_Smart_Object" data-name="Vector Smart Object" width="240" height="15" xlink:href="data:img/png;base64,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"></image>
                          </svg>
                          </span>
                        <p class="as_font14 as_padderTop20 as_padderBottom50"> Astrology is a powerful tool to understand life’s patterns, timing, and possibilities.  

It helps you make informed decisions in areas like marriage, career, and personal growth — with clarity and confidence.</p>
                    </div>
                    <div class="col-lg-6 col-md-6">
    <div class="video-wrapper position-relative text-end">
        <div class="image-frame">
            <img src="assets/images/consultation1.png" alt="Astro Video" class="img-fluid rounded-4 shadow-lg">
        </div>
        
        <a href="https://www.youtube.com/watch?your-video-id" target="_blank" class="play-trigger">
            <span class="pulse-circle"></span>
            <span class="play-icon">
                <i class="fa-solid fa-play"></i>
            </span>
        </a>
        
        <div class="video-label cinzel">
            Discover Astro Pradeep’s Guidance
        </div>
    </div> 
</div>
                    <div class="col-lg-6 col-md-6">
                        <div class="as_about_detail">
                            <h1 class="as_heading">What We Do For You</h1>
                            <div class="as_paragraph_wrapper">
                                <p class="as_margin0 as_font14 as_padderBottom10">
Astro Pradeep Kumar brings over 25 years of practical astrology experience, helping individuals make confident life decisions.  

Every consultation is based on detailed horoscope analysis — focusing on real-life challenges such as marriage, career, finances, and personal growth.  

The approach is simple: clear understanding, honest guidance, and practical solutions — without confusion or fear.
</p>
<ul class="mt-3">
<li>✔ Marriage & Relationship Guidance</li>
<li>✔ Career & Business Direction</li>
<li>✔ Financial Stability Insights</li>
<li>✔ Accurate Timing of Important Decisions</li>
<li>✔ Simple & Practical Remedies</li>
</ul>
                            </div>

                            <div class="as_contact_expert d-none">
                                <span class="as_icon">
                                   <img src="assets/images/svg/about.svg" alt="">
                                   
                                </span>
                                <span class="as_year_ex">
                                    30
                                </span>
                                <div>
                                    <h5>years of</h5>
                                    <h1>Experience</h1>
                                </div>
                            </div>
<a href="aboutus.php" class="btn btn-readmore mb-2">Read Full Details<i class="fa-solid fa-arrow-right-long"></i></a>                        </div>
                    </div>
                </div>
            </div>
        </section>
<section class="bg-soft-gold p-1 mt-2">
    <div class="container mb-5">
        <div class="section-heading text-center mb-5">
            
            <h1 class="as_heading mt-3">Sacred Services</h1>
            <!-- <h6 class="text-gold text-uppercase tracking-wider">Our Expertise</h6> -->
            <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="240" height="15" viewBox="0 0 240 15">
                            <image id="Vector_Smart_Object" data-name="Vector Smart Object" width="240" height="15" xlink:href="data:img/png;base64,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"></image>
                          </svg>
                          </span>
            <div class="divider-center"></div>
        </div>
     <div class="row g-4">

<div class="col-md-4">
<div class="service-card text-center">
<div class="icon-wrap">
<img src="assets/images/kundali-milan.webp" alt="Kundli Milan" class="service-img">
</div>
<h5>Kundli Milan</h5>
<p>Deep compatibility analysis for long-lasting marital bliss.</p>
</div>
</div>

<div class="col-md-4">
<div class="service-card text-center">
<div class="icon-wrap">
<img src="assets/images/vastu-shastra.png" alt="Vastu Shastra" class="service-img">
</div>
<h5>Vastu Shastra</h5>
<p>Scientific energy alignment for your home & office success.</p>
</div>
</div>

<!-- <div class="col-md-4">
<div class="service-card text-center">
<div class="icon-wrap">
<img src="assets/images/circle.png" alt="Mind Healing" class="service-img">
</div>
<h5>Spiritual Guidance</h5>
<p>Receive guidance to overcome life challenges and gain clarity on your path.</p>
</div>
</div> -->

<div class="col-md-4">
<div class="service-card text-center">
<div class="icon-wrap">
<img src="assets/images/gemology.jpg" alt="Gemology" class="service-img">
</div>
<h5>Gemology</h5>
<p>Authentic gemstone guidance to balance planetary effects.</p>
</div>
</div>

</div>
    </div>
</section>

<section class="py-50 mt-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-center text-lg-end">
                <div class="mb-5">
                    <h4 class="cinzel fw-bold">Astro Guidance</h4>
                    <p class="text-dark">Sitaron ki chaal aapke jeevan ko naya rasta dikhati hai. Jaaniye apni kismat ka haal.</p>
                </div>
                <div class="mb-5">
                    <h4 class="cinzel fw-bold">Life Coaching</h4>
                    <p class="text-dark">Navigate through life's challenges with spiritual and mental clarity.</p>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <div class="wheel-wrap ">
                    <img src="https://webdesign-finder.com/magia-v2/wp-content/uploads/2024/04/horoscope.png" class="img-fluid wheel-anim glow" alt="Wheel">
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-start">
                <div class="mb-5">
                    <h4 class="cinzel fw-bold">Daily Horoscope</h4>
                    <p class="text-dark">Aaj ka din aapke liye kya khaas lekar aaya hai? Get your daily transit updates.</p>
                </div>
                <div class="mb-5">
                    <h4 class="cinzel fw-bold">Karmic Healing</h4>
                    <p class="text-dark">Break free from repetitive negative patterns and ancestral debts.</p>
                </div>
            </div>
        </div>
    </div>
</section>
  <section class="home-hero-banner mt-4 bg-soft-gold">
    <div class="container">
        
        <div class="row align-items-center">
            
            <!-- Content -->
            <div class="col-lg-6 order-2 order-lg-1">
                <div class="hero-banner-content">
                   <h1 class="home-hero-heading">What is Janam Kundli?</h1>
    <p class="hero-sub-heading as_banner_desc">
        A Janam Kundli is an astrological chart created using your exact birth date...
    </p>

                    <p class="hero-sub-heading">
                        Your online Janam Kundli report reveals much more than basic zodiac traits. It provides insights into your love life, career growth, health patterns, mental tendencies, and overall life path.
                    </p>

                    <div class="glass-btn-container">
                       
                        <button class="btn btn-outline-gold mb-3" onclick="window.location.href='kundli-generator.php'">
Get Your Report
</button>
                    </div>
                </div>
            </div>

            <!-- Image -->
            <div class="col-lg-6 order-1 order-lg-2 mb-5 mb-lg-0">
                <div class="planet-container text-center">
                    <img 
                        src="assets/images/kundali-matching.png" 
                        alt="Astrology planets illustration" 
                        class="rotating-planet img-fluid"
                    >
                </div>
            </div>

        </div>
    </div>
</section>
<section class="astro-learning py-5 text-center">
    <div class="container">
        <h2 class="mb-3">Understand the 12 Houses of Astrology</h2>
        <p class="mb-4">
            Learn how different houses in your kundli influence your life — from career and relationships to health and finances.
        </p>

        <div class="video-container">
            <iframe 
                src="https://www.youtube.com/embed/gqKFaopB8dk"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</section>
<section class="as_horoscope_wrapper as_padderBottom80 as_padderTop80">
<div class="container">
<div class="row mb-5">

<div class="col-lg-12 text-center">
<h1 class="as_heading mt-4" id="Yearly_horoscope">Horoscope Forecasts</h1>
<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="240" height="15" viewBox="0 0 240 15">
                            <image id="Vector_Smart_Object" data-name="Vector Smart Object" width="240" height="15" xlink:href="data:img/png;base64,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"></image>
                          </svg>
                          </span>
<p class="as_font14 as_padderTop20 as_padderBottom20">
Explore your zodiac sign and discover personality traits, career guidance, love compatibility and more.
</p>
</div>

<!-- Aries -->
<div class="col-lg-2 col-sm-4 col-xs-6">
<div class="as_sign_box text-center">
<a href="rashi-details/aries.html">
<span class="as_sign">
<img src="assets/images/svg/h1.svg" alt="">
</span>
<h5 class="as_sign_title">Aries</h5>
<p class="as_sign_date">Mar 21 - Apr 19</p>
</a>
</div>
</div>

<!-- Taurus -->
<div class="col-lg-2 col-sm-4 col-xs-6">
<div class="as_sign_box text-center">
<a href="rashi-details/taurus.html">
<span class="as_sign">
<img src="assets/images/svg/h2.svg" alt="">
</span>
<h5 class="as_sign_title">Taurus</h5>
<p class="as_sign_date">Apr 20 - May 20</p>
</a>
</div>
</div>

<!-- Gemini -->
<div class="col-lg-2 col-sm-4 col-xs-6">
<div class="as_sign_box text-center">
<a href="rashi-details/gemini.html">
<span class="as_sign">
<img src="assets/images/svg/h3.svg" alt="">
</span>
<h5 class="as_sign_title">Gemini</h5>
<p class="as_sign_date">May 21 - Jun 20</p>
</a>
</div>
</div>

<!-- Cancer -->
<div class="col-lg-2 col-sm-4 col-xs-6">
<div class="as_sign_box text-center">
<a href="rashi-details/cancer.html">
<span class="as_sign">
<img src="assets/images/svg/h4.svg" alt="">
</span>
<h5 class="as_sign_title">Cancer</h5>
<p class="as_sign_date">Jun 21 - Jul 22</p>
</a>
</div>
</div>

<!-- Leo -->
<div class="col-lg-2 col-sm-4 col-xs-6">
<div class="as_sign_box text-center">
<a href="rashi-details/leo.html">
<span class="as_sign">
<img src="assets/images/svg/h5.svg" alt="">
</span>
<h5 class="as_sign_title">Leo</h5>
<p class="as_sign_date">Jul 23 - Aug 22</p>
</a>
</div>
</div>

<!-- Virgo -->
<div class="col-lg-2 col-sm-4 col-xs-6">
<div class="as_sign_box text-center">
<a href="rashi-details/virgo.html">
<span class="as_sign">
<img src="assets/images/svg/h6.svg" alt="">
</span>
<h5 class="as_sign_title">Virgo</h5>
<p class="as_sign_date">Aug 23 - Sep 22</p>
</a>
</div>
</div>

<!-- Libra -->
<div class="col-lg-2 col-sm-4 col-xs-6">
<div class="as_sign_box text-center">
<a href="rashi-details/libra.html">
<span class="as_sign">
<img src="assets/images/svg/h7.svg" alt="">
</span>
<h5 class="as_sign_title">Libra</h5>
<p class="as_sign_date">Sep 23 - Oct 22</p>
</a>
</div>
</div>

<!-- Scorpio -->
<div class="col-lg-2 col-sm-4 col-xs-6">
<div class="as_sign_box text-center">
<a href="rashi-details/scorpio.html">
<span class="as_sign">
<img src="assets/images/svg/h8.svg" alt="">
</span>
<h5 class="as_sign_title">Scorpio</h5>
<p class="as_sign_date">Oct 23 - Nov 21</p>
</a>
</div>
</div>

<!-- Sagittarius -->
<div class="col-lg-2 col-sm-4 col-xs-6">
<div class="as_sign_box text-center">
<a href="rashi-details/sagittarius.html">
<span class="as_sign">
<img src="assets/images/svg/h9.svg" alt="">
</span>
<h5 class="as_sign_title">Sagittarius</h5>
<p class="as_sign_date">Nov 22 - Dec 21</p>
</a>
</div>
</div>

<!-- Capricorn -->
<div class="col-lg-2 col-sm-4 col-xs-6">
<div class="as_sign_box text-center">
<a href="rashi-details/capricorn.html">
<span class="as_sign">
<img src="assets/images/svg/h10.svg" alt="">
</span>
<h5 class="as_sign_title">Capricorn</h5>
<p class="as_sign_date">Dec 22 - Jan 19</p>
</a>
</div>
</div>

<!-- Aquarius -->
<div class="col-lg-2 col-sm-4 col-xs-6">
<div class="as_sign_box text-center">
<a href="rashi-details/aquarius.html">
<span class="as_sign">
<img src="assets/images/svg/h11.svg" alt="">
</span>
<h5 class="as_sign_title">Aquarius</h5>
<p class="as_sign_date">Jan 20 - Feb 18</p>
</a>
</div>
</div>

<!-- Pisces -->
<div class="col-lg-2 col-sm-4 col-xs-6">
<div class="as_sign_box text-center">
<a href="rashi-details/pisces.html">
<span class="as_sign">
<img src="assets/images/svg/h12.svg" alt="">
</span>
<h5 class="as_sign_title">Pisces</h5>
<p class="as_sign_date">Feb 19 - Mar 20</p>
</a>
</div>
</div>

</div>
</div>
</section>

        <section class="py-5 bg-soft-gold">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="cinzel">Sacred Exchange</h2>
            <p class="opacity-75">Select the path that best suits your current journey.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="glass-card p-4 text-center border-top border-4 border-secondary h-100">
                    <h4 class="cinzel">Basic Guidance</h4>
                    <p class="display-6 fw-bold">₹2,100</p>
                    <ul class="list-unstyled mb-4 small text-start">
                        <li><i class="fa fa-check me-2 text-success"></i> 20 Min Consultation</li>
                        <li><i class="fa fa-check me-2 text-success"></i> Kundli Analysis</li>
                        <li><i class="fa fa-check me-2 text-success"></i> Basic Remedies</li>
                    </ul>
                    <button class="btn btn-outline-dark w-100 cinzel">Select Plan</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4 text-center border-top border-4 border-warning shadow-lg h-100" style="transform: scale(1.05); background: #fffdf5;">
                    <div class="badge bg-warning text-dark mb-2 cinzel">MOST POPULAR</div>
                    <h4 class="cinzel">Karmic Healing</h4>
                    <p class="display-6 fw-bold">₹5,100</p>
                    <ul class="list-unstyled mb-4 small text-start">
                        <li><i class="fa fa-check me-2 text-success"></i> 45 Min Consultation</li>
                        <li><i class="fa fa-check me-2 text-success"></i> Vastu + Birth Chart</li>
                        <li><i class="fa fa-check me-2 text-success"></i> 1 Hypnosis Session</li>
                    </ul>
                    <button class="btn btn-traditional w-100 cinzel">Select Plan</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4 text-center border-top border-4 border-secondary h-100">
                    <h4 class="cinzel">Corporate Vastu</h4>
                    <p class="display-6 fw-bold">₹11,000</p>
                    <ul class="list-unstyled mb-4 small text-start">
                        <li><i class="fa fa-check me-2 text-success"></i> Full Office Audit</li>
                        <li><i class="fa fa-check me-2 text-success"></i> Energy Mapping</li>
                        <li><i class="fa fa-check me-2 text-success"></i> 3-Month Support</li>
                    </ul>
                    <button class="btn btn-outline-dark w-100 cinzel">Select Plan</button>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="faq-section py-5">
<div class="container">

<div class="text-center mb-5">
<h1 class="as_heading">Frequently Asked Questions</h1>
<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="240" height="15" viewBox="0 0 240 15">
                            <image id="Vector_Smart_Object" data-name="Vector Smart Object" width="240" height="15" xlink:href="data:img/png;base64,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"></image>
                          </svg>
                          </span>
<p class="opacity-75">Find answers to common questions about astrology consultation and services.</p>
</div>

<div class="accordion" id="faqAccordion">

<!-- FAQ 1 -->
<div class="accordion-item">
<h2 class="accordion-header">
<button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#faq1">
What can I expect from a consultation with Astro Pradeep Kumar?
</button>
</h2>
<div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
<div class="accordion-body">
During the consultation, your horoscope is carefully studied and explained in a structured manner. 
The discussion focuses on your specific concerns whether related to marriage, career, finances, health, 
or personal challenges. You will receive clear insights and practical guidance based on your planetary positions.
</div>
</div>
</div>

<!-- FAQ 2 -->
<div class="accordion-item">
<h2 class="accordion-header">
<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq2">
What details are required for horoscope analysis?
</button>
</h2>
<div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
<div class="accordion-body">
For an accurate analysis, the following birth details are required:
<ul>
<li>Date of Birth</li>
<li>Exact Time of Birth</li>
<li>Place of Birth</li>
</ul>
Accurate information ensures precise interpretation of planetary positions.
</div>
</div>
</div>

<!-- FAQ 3 -->
<div class="accordion-item">
<h2 class="accordion-header">
<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq3">
Can astrology predict the exact future?
</button>
</h2>
<div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
<div class="accordion-body">
Astrology indicates tendencies, timing, and possibilities not fixed outcomes. 
It highlights favorable and challenging periods so that you can make informed decisions. 
Personal effort and choices always play an important role.
</div>
</div>
</div>

<!-- FAQ 4 -->
<div class="accordion-item">
<h2 class="accordion-header">
<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq4">
Can astrology help with marriage-related problems?
</button>
</h2>
<div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
<div class="accordion-body">
Yes. Horoscope analysis can reveal compatibility factors, delay indicators, 
and planetary influences affecting relationships. It can also provide guidance 
on the right timing and possible corrective measures.
</div>
</div>
</div>

<!-- FAQ 5 -->
<div class="accordion-item">
<h2 class="accordion-header">
<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq5">
Do you provide remedies?
</button>
</h2>
<div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
<div class="accordion-body">
Yes. Remedies are suggested when necessary and are always practical and realistic. 
The focus remains on meaningful solutions rather than complicated rituals.
</div>
</div>
</div>

<!-- FAQ 6 -->
<div class="accordion-item">
<h2 class="accordion-header">
<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq6">
Is the consultation confidential?
</button>
</h2>
<div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
<div class="accordion-body">
Absolutely. All personal information and discussions remain strictly confidential. 
Professional ethics and privacy are always maintained.
</div>
</div>
</div>

<!-- FAQ 7 -->
<div class="accordion-item">
<h2 class="accordion-header">
<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq7">
How long does a consultation session take?
</button>
</h2>
<div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
<div class="accordion-body">
Typically, a detailed session lasts between 30 to 60 minutes depending on the complexity 
of the case and the number of concerns discussed.
</div>
</div>
</div>

<!-- FAQ 8 -->
<div class="accordion-item">
<h2 class="accordion-header">
<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq8">
Do you offer online consultations?
</button>
</h2>
<div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
<div class="accordion-body">
Yes. Consultations can be conducted online or over a video call, allowing clients from 
different parts of India to seek guidance conveniently.
</div>
</div>
</div>

<!-- FAQ 9 -->
<div class="accordion-item">
<h2 class="accordion-header">
<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq9">
How many years of experience does Astro Pradeep Kumar have?
</button>
</h2>
<div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
<div class="accordion-body">
Astro Pradeep Kumar has over 25 years of practical experience in astrology consultation, 
guiding individuals and families through important life decisions.
</div>
</div>
</div>

<!-- FAQ 10 -->
<div class="accordion-item">
<h2 class="accordion-header">
<button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq10">
How can I book a consultation?
</button>
</h2>
<div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
<div class="accordion-body">
You can schedule your appointment through the website’s booking section or by contacting 
the provided contact details. Once the appointment is confirmed, further instructions will be shared.
</div>
</div>
</div>

</div>
</div>
</section>
<!-- Numerology Calculator Section -->
<section class="numerology-section py-5">
<div class="container">

<div class="text-center mb-5">
<h2 class="cinzel">Numerology Calculator</h2>
<p>Discover your Life Path Number and cosmic personality</p>
</div>

<div class="row justify-content-center">

<div class="col-md-6">

<div class="numerology-box">

<form id="numerologyForm">

<label class="form-label">Enter Your Date of Birth</label>

<input type="date" id="dob" class="form-control mb-3" required>

<button type="submit" class="btn btn-gold w-100">
Calculate Numerology
</button>

</form>

<div id="numerologyResult" class="result-box mt-4" style="display:none;">

<h5>Your Numerology Result</h5>

<p><strong>Life Path Number:</strong> <span id="lifePath"></span></p>

<p><strong>Ruling Planet:</strong> <span id="planet"></span></p>

<p><strong>Lucky Day:</strong> <span id="day"></span></p>

<p><strong>Lucky Color:</strong> <span id="color"></span></p>

</div>

</div>

</div>

</div>

</div>
</section>
<!-- Latest Astrology Articles -->
<section class="astro-articles py-5">
<div class="container">

<div class="text-center mb-5">
<h2 class="cinzel">Latest Astrology Insights</h2>
<p>Explore cosmic wisdom, planetary movements and spiritual guidance</p>
</div>

<div class="row g-4">

<div class="col-md-4">
<div class="article-card">
<img src="assets/images/saturn-transit.jpg" class="img-fluid">
<div class="article-content">
<h5>Saturn Transit 2026</h5>
<p>Understand how Shani transit in 2026 will affect career, relationships and karma.</p>
<a href="saturn-transit-2026.php" class="read-btn">Read More</a>
</div>
</div>
</div>

<div class="col-md-4">
<div class="article-card">
<img src="assets/images/mars-retrograde.jpg" class="img-fluid">
<div class="article-content">
<h5>Mars Retrograde Effects</h5>
<p>Discover how Mars retrograde influences energy, motivation and decision making.</p>
<a href="mars-retrograde-effects.php" class="read-btn">Read More</a>
</div>
</div>
</div>

<div class="col-md-4">
<div class="article-card">
<img src="assets/images/gemstones-2026.webp" class="img-fluid">
<div class="article-content">
<h5>Best Gemstones for 2026</h5>
<p>Find the most powerful gemstones for luck, protection and success in 2026.</p>
<a href="best-gemstones-2026.php" class="read-btn">Read More</a>
</div>
</div>
</div>

</div>

</div>
</section>
        <footer class="footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <h2 class="cinzel text-white mb-4">ASTRO <span class="text-gold">PRADEEP</span></h2>
                <p class="opacity-75 mb-4">A legacy of 25+ years, serving over 1 million souls globally. We don't just predict the future; we help you create it.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-2">
                <h5 class="text-white mb-4">Quick Links</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="#">About Astro</a></li>
                    <li><a href="#">Consultation</a></li>
                    <li><a href="#">Vedic Blog</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="text-white mb-4">Our Services</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="#">Janam Kundli</a></li>
                    <li><a href="#">Vastu Audit</a></li>
                    <li><a href="#">Hypnotherapy</a></li>
                    <li><a href="#">Gemstone Analysis</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h5 class="text-white mb-4">Newsletter</h5>
                <p class="small opacity-75">Subscribe for weekly cosmic insights.</p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Email">
                    <button class="btn btn-gold-solid">Join</button>
                </div>
            </div>
        </div>
        <div class="footer-bottom mt-5 pt-4 text-center border-top border-secondary">
            <p class="mb-0 opacity-50">&copy; 2026 Astro Pradeep Kumar | Blessings School of Astro</p>
        </div>
    </div>
</footer>
<a href="https://wa.me/919096161750" class="whatsapp-float" target="_blank" style="position:fixed; bottom:20px; right:20px; background:#25d366; color:#FFF; border-radius:50px; text-align:center; padding: 10px 20px; font-weight:bold; text-decoration:none; z-index:100; box-shadow: 2px 2px 10px rgba(0,0,0,0.2); display: flex; align-items: center; gap: 8px;">
    <i class="fab fa-whatsapp fa-2x"></i> <span>Chat Now</span>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>

document.getElementById("numerologyForm").addEventListener("submit",function(e){

e.preventDefault();

let dob=document.getElementById("dob").value;

let digits=dob.replaceAll("-","").split("");

let sum=digits.reduce((a,b)=>Number(a)+Number(b));

while(sum>9){
sum=sum.toString().split("").reduce((a,b)=>Number(a)+Number(b));
}

let planet={
1:"Sun",
2:"Moon",
3:"Jupiter",
4:"Rahu",
5:"Mercury",
6:"Venus",
7:"Ketu",
8:"Saturn",
9:"Mars"
};

let day={
1:"Sunday",
2:"Monday",
3:"Thursday",
4:"Saturday",
5:"Wednesday",
6:"Friday",
7:"Monday",
8:"Saturday",
9:"Tuesday"
};

let color={
1:"Red",
2:"White",
3:"Yellow",
4:"Blue",
5:"Green",
6:"Pink",
7:"Grey",
8:"Black",
9:"Orange"
};

document.getElementById("lifePath").innerText=sum;
document.getElementById("planet").innerText=planet[sum];
document.getElementById("day").innerText=day[sum];
document.getElementById("color").innerText=color[sum];

document.getElementById("numerologyResult").style.display="block";

});

</script>

<script>/* ============================================
   ASTRO FLOATING ELEMENTS — Light Theme
   Traditional & Elegant Style
   ============================================
   Usage: Is file ko </body> se pehle include karo
   Ya DOMContentLoaded ke andar call karo
   ============================================ */

(function () {

  /* ── Container ── */
  const bg = document.createElement('div');
  bg.className = 'astro-bg';

  /* ── Constellation 1 (top-left) ── */
  bg.innerHTML += `
    <svg class="constellation" style="top:10px;left:20px;width:200px;height:160px;" viewBox="0 0 200 160">
      <line x1="40"  y1="30"  x2="80"  y2="55"  stroke="#888" stroke-width="0.6"/>
      <line x1="80"  y1="55"  x2="120" y2="40"  stroke="#888" stroke-width="0.6"/>
      <line x1="80"  y1="55"  x2="75"  y2="100" stroke="#888" stroke-width="0.6"/>
      <line x1="75"  y1="100" x2="55"  y2="130" stroke="#888" stroke-width="0.6"/>
      <line x1="75"  y1="100" x2="100" y2="128" stroke="#888" stroke-width="0.6"/>
      <circle cx="40"  cy="30"  r="2"   fill="#aaa"/>
      <circle cx="80"  cy="55"  r="2.5" fill="#aaa"/>
      <circle cx="120" cy="40"  r="1.8" fill="#aaa"/>
      <circle cx="75"  cy="100" r="2"   fill="#aaa"/>
      <circle cx="55"  cy="130" r="1.5" fill="#aaa"/>
      <circle cx="100" cy="128" r="1.5" fill="#aaa"/>
    </svg>`;

  /* ── Constellation 2 (bottom-right) ── */
  bg.innerHTML += `
    <svg class="constellation" style="bottom:30px;right:40px;width:130px;height:100px;" viewBox="0 0 130 100">
      <line x1="20"  y1="60" x2="60"  y2="30" stroke="#888" stroke-width="0.6"/>
      <line x1="60"  y1="30" x2="110" y2="50" stroke="#888" stroke-width="0.6"/>
      <line x1="60"  y1="30" x2="65"  y2="80" stroke="#888" stroke-width="0.6"/>
      <circle cx="20"  cy="60" r="1.8" fill="#aaa"/>
      <circle cx="60"  cy="30" r="2.5" fill="#aaa"/>
      <circle cx="110" cy="50" r="1.8" fill="#aaa"/>
      <circle cx="65"  cy="80" r="1.5" fill="#aaa"/>
    </svg>`;

  /* ── Crescent Moon ── */
  bg.innerHTML += `
    <div class="moon" style="top:18px; right:80px;">
      <svg width="44" height="44" viewBox="0 0 44 44" fill="none">
        <path d="M32 8 A18 18 0 1 0 32 36 A12 12 0 1 1 32 8 Z"
              fill="rgba(255,240,180,0.12)" stroke="#c8b870" stroke-width="1.2" opacity="0.65"/>
      </svg>
    </div>`;

  /* ── Saturn ── */
  bg.innerHTML += `
    <div class="planet-wrap" style="top:60px; left:50px; --fp:16s; --fy:-14px;">
      <svg width="52" height="36" viewBox="0 0 52 36" fill="none">
        <ellipse cx="26" cy="20" rx="24" ry="7"
                 stroke="rgba(180,150,80,0.3)" stroke-width="1.2" fill="none"/>
        <circle cx="26" cy="18" r="12"
                fill="rgba(240,220,170,0.22)" stroke="rgba(180,150,80,0.4)" stroke-width="1"/>
        <ellipse cx="26" cy="18" rx="12" ry="4"
                 fill="none" stroke="rgba(180,150,80,0.15)" stroke-width="0.8"/>
        <path d="M14 22 Q26 27 38 22"
              stroke="rgba(180,150,80,0.28)" stroke-width="1.2" fill="none"/>
      </svg>
    </div>`;

  /* ── Small Planet ── */
  bg.innerHTML += `
    <div class="planet-wrap" style="bottom:60px; right:100px; --fp:10s; --fy:-10px;">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
        <circle cx="10" cy="10" r="7"
                fill="rgba(180,210,240,0.25)" stroke="rgba(100,160,210,0.4)" stroke-width="0.8"/>
        <ellipse cx="10" cy="10" rx="7" ry="2.5"
                 fill="none" stroke="rgba(100,160,210,0.2)" stroke-width="0.6"/>
      </svg>
    </div>`;

  /* ── 4-Point Stars ── */
  const star4Data = [
    { top: '8%',  left: '18%',  fs: '12px', d: '4s',   delay: '0s'   },
    { top: '22%', right: '22%', fs: '10px', d: '6s',   delay: '1s'   },
    { bottom:'25%',left: '30%', fs: '8px',  d: '5s',   delay: '2s'   },
    { top: '55%', right: '12%', fs: '11px', d: '7s',   delay: '0.5s' },
    { bottom:'12%',left: '55%', fs: '9px',  d: '4.5s', delay: '3s'   },
    { top: '35%', left: '8%',   fs: '7px',  d: '6s',   delay: '1.5s' },
  ];
  star4Data.forEach(({ top, bottom, left, right, fs, d, delay }) => {
    const el = document.createElement('span');
    el.className = 'star4';
    el.textContent = '✦';
    el.style.cssText = [
      top    ? `top:${top};`    : '',
      bottom ? `bottom:${bottom};` : '',
      left   ? `left:${left};`  : '',
      right  ? `right:${right};`: '',
      `--fs:${fs};--d:${d};animation-delay:${delay};`
    ].join('');
    bg.appendChild(el);
  });

  /* ── Shooting Stars ── */
  const shootData = [
    { top: '20%', left: '8%',  sd: '9s',  delay: '1s', w: '80px' },
    { top: '65%', left: '20%', sd: '13s', delay: '6s', w: '60px' },
  ];
  shootData.forEach(({ top, left, sd, delay, w }) => {
    const el = document.createElement('div');
    el.className = 'shooting';
    el.style.cssText = `width:${w};top:${top};left:${left};--sd:${sd};--delay:${delay};
      background:linear-gradient(90deg, transparent, rgba(160,140,100,0.5));`;
    bg.appendChild(el);
  });

  /* ── Dot Stars (auto-generated) ── */
  for (let i = 0; i < 55; i++) {
    const s = document.createElement('div');
    s.className = 'star';
    const sz = (Math.random() * 1.8 + 0.5).toFixed(1);
    s.style.cssText = `
      width:${sz}px;
      height:${sz}px;
      top:${(Math.random() * 100).toFixed(2)}%;
      left:${(Math.random() * 100).toFixed(2)}%;
      --d:${(Math.random() * 5 + 3).toFixed(1)}s;
      --o1:${(Math.random() * 0.06 + 0.02).toFixed(2)};
      --o2:${(Math.random() * 0.3 + 0.1).toFixed(2)};
      animation-delay:${(Math.random() * 7).toFixed(1)}s;
    `;
    bg.appendChild(s);
  }

  /* ── Inject into body ── */
  document.body.prepend(bg);

})();
</script>
<script>
document.querySelectorAll('.dropdown-submenu > a').forEach(function(el){
    el.addEventListener('click', function(e){
        e.preventDefault();
        let nextMenu = this.nextElementSibling;
        if(nextMenu){
            nextMenu.classList.toggle('show');
        }
    });
});
</script>
</body>
</html>