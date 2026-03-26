<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astro Pradeep Kumar | Vedic Excellence</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root { 
            --gold-leaf: #C5A059; 
            --royal-red: #660000; 
            --glass-bg: rgba(255, 255, 255, 0.5);
            --glass-border: rgba(255, 255, 255, 0.4);
            --traditional-serif: 'Playfair Display', serif;
            --heading-font: 'Cinzel', serif;
        }

       body {
    font-family: var(--traditional-serif);
    background: linear-gradient(180deg, #ffffffcf 0%, #fff2d1d1 100%);
    background-attachment: fixed;
    color: #2c2c2c;
    line-height: 1.7;
}

        h1, h2, h3, h4, .cinzel { font-family: var(--heading-font); color: var(--royal-red); letter-spacing: 1px; }

        /* --- Glassmorphism Kit --- */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            transition: all 0.4s ease;
        }

        .glass-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.7);
            border-color: var(--gold-leaf);
        }

        /* Hero Section */
        .hero-title { font-size: 4rem; font-weight: 900; line-height: 1.1; }
        .hero-title span { color: var(--gold-leaf); }
        .hero-subtitle { font-family: 'Plus Jakarta Sans', sans-serif; letter-spacing: 3px; color: var(--royal-red); font-weight: 700; }

        /* Premium Buttons */
        .btn-traditional {
            background: var(--royal-red);
            color: #fff !important;
            font-family: var(--heading-font);
            padding: 15px 40px;
            border-radius: 0; /* Traditional sharp edges or very slight round */
            border: 1px solid var(--gold-leaf);
            transition: 0.3s;
            text-transform: uppercase;
            font-size: 0.9rem;
        }
        .btn-traditional:hover {
            background: var(--gold-leaf);
            color: #fff;
            letter-spacing: 2px;
        }

        /* Testimonials Section */
        .testimonial-text { font-style: italic; font-size: 1.2rem; }
        .quote-icon { color: var(--gold-leaf); opacity: 0.3; font-size: 3rem; }

        /* Icon Grid */
        .icon-circle {
            width: 80px; height: 80px;
            background: white;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 20px;
            border-radius: 50%;
            border: 2px solid var(--gold-leaf);
            color: var(--royal-red);
            font-size: 1.8rem;
        }

        /* Section Ornament */
        .ornament {
            height: 2px; width: 100px;
            background: var(--gold-leaf);
            margin: 20px auto;
            position: relative;
        }
        .ornament::after {
            content: "✦";
            position: absolute; top: -12px; left: 45px;
            background: inherit; -webkit-background-clip: text; color: var(--gold-leaf);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg py-4">
    <div class="container">
        <a class="navbar-brand cinzel fw-bold" href="#" style="font-size: 1.8rem;">
            ASTRO <span style="color: var(--gold-leaf);">PRADEEP</span>
        </a>
        <div class="ms-auto">
            <button class="btn btn-traditional">Book Consultation</button>
        </div>
    </div>
</nav>

<header class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h6 class="hero-subtitle text-uppercase mb-3">Ancient Wisdom for Modern Success</h6>
                <h1 class="hero-title mb-4">Master Your <br><span>Karmic Energy</span></h1>
                <p class="lead mb-5">Experience 35+ years of Vedic mastery. We don't just predict the future; we help you create it through Astrology and Mind Healing.</p>
                <div class="d-flex gap-3">
                    <button class="btn btn-traditional">Get Started</button>
                    <button class="btn btn-outline-dark px-4 rounded-0 cinzel">Free Kundli</button>
                </div>
            </div>
            <div class="col-lg-5 text-center mt-5 mt-lg-0">
                <div class="glass-card p-3">
                    <img src="assets\images\drpradeep.png" class="img-fluid rounded-3" alt="Dr. Pradeep Kumar">
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5">Sacred Services</h2>
            <div class="ornament"></div>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="glass-card p-4 h-100">
                    <div class="icon-circle"><i class="fa-solid fa-om"></i></div>
                    <h5 class="cinzel">Kundli Milan</h5>
                    <p class="small">Vedic compatibility for a blissful married life.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="glass-card p-4 h-100">
                    <div class="icon-circle"><i class="fa-solid fa-scroll"></i></div>
                    <h5 class="cinzel">Birth Chart</h5>
                    <p class="small">Deep analysis of your life’s 12 houses and planetary peaks.</p>
                </div>
            </div>
            <div class="col-md-3">
               <div class="glass-card p-4 h-100">
    <div class="icon-circle shadow-sm overflow-hidden">
        <img src="assets/images/VASTUF~1.webp" style="width:100%; object-fit:cover;">
    </div>
    <h5 class="cinzel">Vastu Shastra</h5>
    <p class="small">Scientific energy alignment for homes and offices.</p>
</div>
            </div>
            <div class="col-md-3">
                <div class="glass-card p-4 h-100">
                    <div class="icon-circle"><i class="fa-solid fa-brain"></i></div>
                    <h5 class="cinzel">Mind Healing</h5>
                    <p class="small">Removing subconscious blocks through Hypnosis.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="glass-card p-5">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h2 class="mb-4">The Legacy of <br>Dr. Pradeep Kumar</h2>
                    <p>With a foundation in the deepest secrets of Vedic Shastras and a modern understanding of Hypnotherapy, Dr. Pradeep Kumar has touched over 1 million lives globally.</p>
                    <p>His approach is not just spiritual—it is <strong>Integrated</strong>. By looking at your stars and your subconscious mind together, he provides solutions that work where others fail.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-check text-success me-2"></i> 35+ Years of Research</li>
                        <li><i class="fa fa-check text-success me-2"></i> 80+ Countries Served</li>
                        <li><i class="fa fa-check text-success me-2"></i> ISO Certified Institute</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img src="assets\images\1.png" class="img-fluid rounded-4 shadow" alt="Blessings School">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" style="background: rgba(102, 0, 0, 0.03);">
    <div class="container text-center">
        <h2 class="mb-5">Soulful Experiences</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="glass-card p-4">
                    <i class="fa fa-quote-left quote-icon"></i>
                    <p class="testimonial-text">"Dr. Pradeep's Vastu audit changed the energy of my office. Within 3 months, our revenue doubled."</p>
                    <h6 class="cinzel mt-3">— Rajesh Sharma, Dubai</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4">
                    <i class="fa fa-quote-left quote-icon"></i>
                    <p class="testimonial-text">"The combination of Astrology and Hypnosis is magical. I found my mental peace after years."</p>
                    <h6 class="cinzel mt-3">— Sarah Jenkins, London</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="glass-card p-4">
                    <i class="fa fa-quote-left quote-icon"></i>
                    <p class="testimonial-text">"Truly the most accurate Kundli reading I have ever had. The remedies were simple and effective."</p>
                    <h6 class="cinzel mt-3">— Amit Patel, Mumbai</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Vedic Wisdom</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="glass-card overflow-hidden">
                    <img src="https://via.placeholder.com/600x300" class="img-fluid" alt="Blog">
                    <div class="p-4">
                        <h4 class="cinzel">Why Saturn is your Best Teacher</h4>
                        <p>Understanding Shani Dev not as a punisher, but as a discipline-maker...</p>
                        <a href="#" class="text-decoration-none fw-bold" style="color: var(--gold-leaf);">Read More →</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="glass-card overflow-hidden">
                    <img src="https://via.placeholder.com/600x300" class="img-fluid" alt="Blog">
                    <div class="p-4">
                        <h4 class="cinzel">5 Vastu Tips for Financial Flow</h4>
                        <p>Simple changes in your North-East corner can invite abundance...</p>
                        <a href="#" class="text-decoration-none fw-bold" style="color: var(--gold-leaf);">Read More →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="py-5 text-white" style="background: var(--royal-red); border-top: 5px solid var(--gold-leaf);">
    <div class="container text-center">
        <h2 class="cinzel mb-4" style="color: white;">ASTRO <span style="color: var(--gold-leaf);">PRADEEP</span></h2>
        <div class="mb-4 d-flex justify-content-center gap-4 cinzel">
            <a href="#" class="text-white text-decoration-none">Privacy</a>
            <a href="#" class="text-white text-decoration-none">Terms</a>
            <a href="#" class="text-white text-decoration-none">Consultation</a>
        </div>
        <div class="mb-4">
            <a href="#" class="text-white mx-2"><i class="fab fa-instagram fa-2x"></i></a>
            <a href="#" class="text-white mx-2"><i class="fab fa-youtube fa-2x"></i></a>
            <a href="#" class="text-white mx-2"><i class="fab fa-whatsapp fa-2x"></i></a>
        </div>
        <p class="small opacity-50">&copy; 2026 Dr. Pradeep Kumar | Blessings School of Hypnosis</p>
    </div>
</footer>

</body>
</html>