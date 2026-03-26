<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vedic Wisdom | Astro Pradeep</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cinzel:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* ── Your existing theme base ── */
        :root {
            --orange:       #E87722;
            --orange-light: #F59A45;
            --orange-dark:  #C05A0A;
            --gold:         #D4A017;
            --white:        #FFFFFF;
            --off-white:    #FFF8F0;
            --soft-gold-bg: #FFF3E0;
            --text-dark:    #2C1A00;
            --text-mid:     #5C3D11;
            --text-muted:   #9A7B55;
            --navbar-bg:    #1A0A00;
            --footer-bg:    #12080D;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body { font-family: 'Poppins', sans-serif; background: var(--white); color: var(--text-dark); overflow-x: hidden; }
   
        
        /* ── Hero ── */
.hero-vedic {
    background: linear-gradient(150deg, #FFFAF4 0%, #FFF3E0 50%, #FFF8F0 100%);
    position: relative;
    min-height: 92vh;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    text-align: center;
}
/* Light glow overlay */
.hero-vedic::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(ellipse 70% 60% at 50% 40%, rgba(232,119,34,0.10) 0%, transparent 70%);
    pointer-events: none;
}
/* Animated mandala ring */
.hero-ring {
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(232,119,34,0.18);
    animation: ringPulse 6s ease-in-out infinite;
}
.hero-ring:nth-child(1) { width: 300px; height: 300px; animation-delay: 0s; }
.hero-ring:nth-child(2) { width: 480px; height: 480px; animation-delay: 1s; }
.hero-ring:nth-child(3) { width: 660px; height: 660px; animation-delay: 2s; }
.hero-ring:nth-child(4) { width: 840px; height: 840px; animation-delay: 3s; border-color: rgba(212,160,23,0.08); }
@keyframes ringPulse {
    0%, 100% { transform: scale(1); opacity: 0.5; }
    50% { transform: scale(1.04); opacity: 1; }
}
.hero-mandala-spin {
    position: absolute;
    width: 520px; height: 520px;
    opacity: 0.07;
    animation: spin 90s linear infinite;
}

/* ── Hero Text — dark on light ── */
.hero-eyebrow {
    background: rgba(232,119,34,0.10);
    border: 1px solid rgba(232,119,34,0.30);
    color: #C05A0A;        /* dark orange instead of light */
}
/* ── FIX 1: Eyebrow pill shape (Bootstrap override) ── */
.hero-vedic .hero-eyebrow {
    display: inline-block !important;
    border-radius: 40px !important;
    border: 1px solid rgba(232,119,34,0.30) !important;
    background: rgba(232,119,34,0.10) !important;
    color: #C05A0A !important;
    text-decoration: none !important;
}

/* ── FIX 2: Button — override Bootstrap/style.css link styles ── */
.hero-vedic .hero-btn {
    display: inline-block !important;
    background: linear-gradient(135deg, var(--orange-dark), var(--orange), var(--orange-light)) !important;
    color: #fff !important;
    text-decoration: none !important;
    border-radius: 4px !important;
    padding: 14px 44px !important;
    font-weight: 600 !important;
    font-size: 0.9rem !important;
    letter-spacing: 0.12em !important;
    text-transform: uppercase !important;
    box-shadow: 0 4px 20px rgba(232,119,34,0.25) !important;
    border: none !important;
    opacity: 1 !important;
    animation: fadeUp 0.9s ease 1.6s forwards !important;
}
.hero-vedic .hero-btn:hover {
    color: #fff !important;
    transform: translateY(-3px) !important;
    box-shadow: 0 10px 36px rgba(232,119,34,0.40) !important;
    text-decoration: none !important;
}

/* ── FIX 3: Divider line visible ── */
.hero-vedic .hero-divider {
    width: 80px !important;
    height: 2px !important;
    background: linear-gradient(to right, transparent, #E87722, transparent) !important;
    margin: 30px auto !important;
    opacity: 1 !important;
    animation: fadeUp 0.9s ease 1.3s forwards !important;
    display: block !important;
    border: none !important;
}
.hero-title {
    color: #2C1A00;        /* dark brown instead of white */
}
.hero-title span {
    color: var(--orange);
    -webkit-text-stroke: 0;   /* remove stroke — not needed on light bg */
}
.hero-title span::after {
    color: var(--orange-dark);
    -webkit-text-stroke: 0;
}
.hero-sub {
    color: rgba(92,61,17,0.65);   /* warm muted brown */
}
.scroll-cue span {
    color: rgba(232,119,34,0.45);
}
        .scroll-cue span { font-size: 0.62rem; letter-spacing: 0.3em; color: rgba(232,119,34,0.5); text-transform: uppercase; }
        .scroll-cue-line {
            width: 1px; height: 52px;
            background: linear-gradient(to bottom, var(--orange), transparent);
            animation: linePulse 2s ease infinite;
        }
        @keyframes linePulse { 0%,100%{opacity:0.3;} 50%{opacity:1;} }
        @keyframes fadeUp { from{opacity:0;transform:translateY(24px);} to{opacity:1;transform:translateY(0);} }
        @keyframes fadeIn { to{opacity:1;} }

        /* ── Section Helpers ── */
        .section-label {
            font-size: 0.7rem;
            letter-spacing: 0.35em;
            text-transform: uppercase;
            color: var(--orange);
            font-weight: 600;
            display: block;
            margin-bottom: 10px;
        }
        .section-title {
            font-family: 'Cinzel', serif;
            font-size: clamp(1.7rem, 3.5vw, 2.8rem);
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.25;
        }
        .section-title span { color: var(--orange); }
        .orange-rule {
            width: 56px; height: 3px;
            background: linear-gradient(to right, var(--orange), var(--orange-light));
            border-radius: 4px;
            margin: 18px 0;
        }
        .orange-rule.center { margin: 18px auto; }

        /* ── INTRO SECTION ── */
        .intro-section {
            padding: 110px 0;
            background: var(--off-white);
        }
        .intro-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }
        .intro-text p {
            font-size: 1rem;
            line-height: 1.9;
            color: var(--text-mid);
            margin-bottom: 20px;
        }
        .stat-row {
            display: flex; gap: 20px; flex-wrap: wrap; margin-top: 36px;
        }
        .stat-box {
            flex: 1; min-width: 110px;
            background: var(--white);
            border: 2px solid rgba(232,119,34,0.15);
            border-radius: 8px;
            padding: 20px 16px;
            text-align: center;
            box-shadow: 0 4px 20px rgba(232,119,34,0.08);
            transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
        }
        .stat-box:hover { transform: translateY(-4px); border-color: var(--orange); box-shadow: 0 8px 30px rgba(232,119,34,0.18); }
        .stat-num {
            font-family: 'Cinzel', serif;
            font-size: 1.9rem;
            font-weight: 700;
            color: var(--orange);
            display: block;
            line-height: 1;
        }
        .stat-label { font-size: 0.72rem; letter-spacing: 0.08em; color: var(--text-muted); margin-top: 4px; text-transform: uppercase; }

        /* Yantra visual */
        .yantra-wrap {
            position: relative;
            display: flex; align-items: center; justify-content: center;
        }
        .yantra-bg {
            width: 340px; height: 340px;
            background: radial-gradient(circle, rgba(232,119,34,0.08) 0%, transparent 70%);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
        }
        .yantra-svg {
            width: 300px; height: 300px;
            animation: spin 70s linear infinite;
            filter: drop-shadow(0 0 20px rgba(232,119,34,0.2));
        }
        .yantra-center {
            position: absolute;
            width: 18px; height: 18px;
            background: var(--orange);
            border-radius: 50%;
            box-shadow: 0 0 20px var(--orange), 0 0 50px rgba(232,119,34,0.4);
            animation: centerPulse 2.5s ease infinite;
        }
        @keyframes centerPulse { 0%,100%{box-shadow:0 0 16px var(--orange),0 0 40px rgba(232,119,34,0.3);} 50%{box-shadow:0 0 28px var(--orange),0 0 80px rgba(232,119,34,0.6);} }
        .yantra-ring-outer {
            position: absolute;
            width: 340px; height: 340px;
            border: 1px dashed rgba(232,119,34,0.2);
            border-radius: 50%;
            animation: spin 20s linear infinite reverse;
        }

        /* ── WISDOM TOPICS ── */
        .topics-section {
            padding: 110px 0;
            background: var(--soft-gold-bg);
        }
        .topics-section .section-title { color: var(--text-dark); }
        .service-card {
            background: var(--white);
            border-radius: 12px;
            padding: 40px 32px;
            border: 1px solid rgba(232,119,34,0.12);
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25,0.46,0.45,0.94);
            height: 100%;
        }
        .service-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(to right, var(--orange-dark), var(--orange), var(--orange-light));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        .service-card:hover { transform: translateY(-8px); box-shadow: 0 20px 50px rgba(232,119,34,0.15); border-color: rgba(232,119,34,0.3); }
        .service-card:hover::before { transform: scaleX(1); }
        .service-card .card-num {
            position: absolute;
            top: 20px; right: 24px;
            font-family: 'Cinzel', serif;
            font-size: 3rem;
            font-weight: 900;
            color: rgba(232,119,34,0.07);
            line-height: 1;
            transition: color 0.4s;
        }
        .service-card:hover .card-num { color: rgba(232,119,34,0.14); }
        .card-icon {
            width: 56px; height: 56px;
            background: linear-gradient(135deg, rgba(232,119,34,0.12), rgba(232,119,34,0.06));
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 20px;
            transition: background 0.3s;
        }
        .service-card:hover .card-icon { background: linear-gradient(135deg, rgba(232,119,34,0.22), rgba(232,119,34,0.12)); }
        .card-icon i { font-size: 1.4rem; color: var(--orange); }
        .service-card h4 {
            font-family: 'Cinzel', serif;
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
            letter-spacing: 0.04em;
        }
        .service-card p { font-size: 0.9rem; line-height: 1.8; color: var(--text-mid); }

        /* ── QUOTE BANNER ── */
        .quote-banner {
            background: linear-gradient(135deg, #1A0A00 0%, #2E1200 50%, #1A0A00 100%);
            padding: 90px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .quote-banner::before {
            content: '';
            position: absolute; inset: 0;
            background: radial-gradient(ellipse at center, rgba(232,119,34,0.12) 0%, transparent 70%);
        }
        .quote-banner blockquote {
            position: relative;
            font-family: 'Cinzel', serif;
            font-size: clamp(1.2rem, 2.5vw, 2rem);
            color: var(--white);
            font-weight: 400;
            line-height: 1.7;
            max-width: 760px;
            margin: 0 auto;
        }
        .quote-banner blockquote::before {
            content: '"';
            font-size: 8rem;
            color: rgba(232,119,34,0.15);
            line-height: 0;
            position: absolute;
            top: 30px; left: -30px;
            font-family: Georgia, serif;
        }
        .quote-source {
            margin-top: 20px;
            font-size: 0.8rem;
            letter-spacing: 0.2em;
            color: var(--orange-light);
            text-transform: uppercase;
        }

        /* ── DAILY INSIGHTS scrolling ── */
        .insights-section {
            padding: 110px 0 80px;
            background: var(--white);
            overflow: hidden;
        }
        .tape-track { overflow: hidden; margin-top: 40px; }
        .tape-track + .tape-track { margin-top: 20px; }
        .tape-row {
            display: flex;
            gap: 24px;
            width: max-content;
            animation: tapeScroll 35s linear infinite;
        }
        .tape-row.reverse { animation: tapeScrollRev 30s linear infinite; }
        @keyframes tapeScroll { from{transform:translateX(0);} to{transform:translateX(-50%);} }
        @keyframes tapeScrollRev { from{transform:translateX(-50%);} to{transform:translateX(0);} }
        .insight-card {
            min-width: 300px;
            padding: 28px 28px;
            background: var(--off-white);
            border: 1px solid rgba(232,119,34,0.15);
            border-radius: 10px;
            flex-shrink: 0;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .insight-card:hover { border-color: var(--orange); box-shadow: 0 4px 20px rgba(232,119,34,0.12); }
        .insight-tag {
            display: inline-block;
            background: rgba(232,119,34,0.1);
            color: var(--orange-dark);
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 40px;
            margin-bottom: 12px;
        }
        .insight-card h6 {
            font-family: 'Cinzel', serif;
            font-size: 0.88rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
        }
        .insight-card p { font-size: 0.85rem; line-height: 1.75; color: var(--text-mid); }

        /* ── CTA ── */
        .cta-section {
            padding: 120px 0;
            background: var(--soft-gold-bg);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-section::before {
            content: '';
            position: absolute; inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' stroke='%23E87722' stroke-width='0.4' opacity='0.08'%3E%3Ccircle cx='30' cy='30' r='28'/%3E%3Cline x1='30' y1='2' x2='30' y2='58'/%3E%3Cline x1='2' y1='30' x2='58' y2='30'/%3E%3C/g%3E%3C/svg%3E") repeat;
        }
        .cta-inner { position: relative; z-index: 1; }
        .cta-title {
            font-family: 'Cinzel', serif;
            font-size: clamp(1.8rem, 4vw, 3rem);
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 16px;
        }
        .cta-title span { color: var(--orange); }
        .cta-sub { font-size: 1rem; color: var(--text-mid); max-width: 540px; margin: 0 auto 40px; line-height: 1.9; }
        .btn-premium-lg {
            display: inline-block;
            background: linear-gradient(135deg, var(--orange-dark), var(--orange), var(--orange-light));
            color: #fff;
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 16px 52px;
            border-radius: 6px;
            text-decoration: none;
            box-shadow: 0 6px 30px rgba(232,119,34,0.35);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .btn-premium-lg:hover { transform: translateY(-3px); box-shadow: 0 12px 50px rgba(232,119,34,0.5); color: #fff; }

        .btn-gold-solid {
            background: linear-gradient(135deg, var(--orange-dark), var(--orange));
            color: #fff;
            border: none;
            font-size: 0.82rem;
            font-weight: 600;
            letter-spacing: 0.08em;
            padding: 8px 20px;
            border-radius: 4px;
            transition: opacity 0.3s;
        }
        .btn-gold-solid:hover { opacity: 0.85; color: #fff; }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.06); padding-top: 24px; }

        /* ── WhatsApp ── */
        .whatsapp-float {
            position: fixed;
            bottom: 24px; right: 24px;
            background: #25d366;
            color: #fff;
            border-radius: 50px;
            padding: 11px 22px;
            font-weight: 600;
            text-decoration: none;
            z-index: 999;
            display: flex; align-items: center; gap: 8px;
            box-shadow: 0 4px 20px rgba(37,211,102,0.4);
            transition: transform 0.3s, box-shadow 0.3s;
            font-size: 0.9rem;
        }
        .whatsapp-float:hover { transform: translateY(-3px); box-shadow: 0 8px 30px rgba(37,211,102,0.6); color: #fff; }

        /* ── Floating particles ── */
        .particle {
            position: fixed;
            width: 3px; height: 3px;
            background: var(--orange);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            opacity: 0;
            animation: particleRise linear infinite;
        }
        @keyframes particleRise {
            0%   { transform: translateY(100vh); opacity: 0; }
            10%  { opacity: 0.5; }
            90%  { opacity: 0.2; }
            100% { transform: translateY(-80px); opacity: 0; }
        }

        /* ── Scroll reveal ── */
        .reveal { opacity: 0; transform: translateY(36px); transition: opacity 0.75s ease, transform 0.75s ease; }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .reveal-d1 { transition-delay: 0.1s; }
        .reveal-d2 { transition-delay: 0.2s; }
        .reveal-d3 { transition-delay: 0.3s; }
        .reveal-d4 { transition-delay: 0.4s; }
        .reveal-d5 { transition-delay: 0.5s; }

        @media (max-width: 992px) {
            .intro-grid { grid-template-columns: 1fr; gap: 40px; }
            .yantra-bg { width: 260px; height: 260px; }
            .yantra-svg { width: 220px; height: 220px; }
            .yantra-ring-outer { width: 260px; height: 260px; }
        }
    </style>
</head>
<body>

<!-- ═══ NAVBAR ═══ -->
<nav class="navbar navbar-expand-lg sticky-top" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="website-logo/1.png" alt="Astro Pradeep Kumar" width="150px" onerror="this.outerHTML='<span style=\'font-family:Cinzel,serif;font-size:1.1rem;color:#F59A45;font-weight:700;\'>ASTRO <span style=\'color:#fff;\'>PRADEEP</span></span>'">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto gap-1">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Horoscope</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Daily Horoscope</a></li>
                        <li><a class="dropdown-item" href="#">Weekly Horoscope</a></li>
                        <li><a class="dropdown-item" href="#">Monthly Horoscope</a></li>
                        <li><a class="dropdown-item" href="#">Yearly Horoscope 2026</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Astrology</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Kundli</a></li>
                        <li><a class="dropdown-item" href="#">Match Making</a></li>
                        <li><a class="dropdown-item" href="#">Numerology</a></li>
                        <li><a class="dropdown-item" href="#">Palmistry</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="book-session.php">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="Panchang.php">Panchang</a></li>
                <li class="nav-item"><a class="nav-link" href="Festivals.php">Festivals</a></li>
                <li class="nav-item"><a class="nav-link" href="Calculator.php">Calculator</a></li>
                <li class="nav-item"><a class="nav-link active" href="vedic-wisdom.php">Vedic Wisdom</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ═══ HERO ═══ -->
<section class="hero-vedic">
    <!-- Rings -->
    <div class="hero-ring"></div>
    <div class="hero-ring"></div>
    <div class="hero-ring"></div>
    <div class="hero-ring"></div>

    <!-- Spinning mandala -->
    <svg class="hero-mandala-spin" viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg" fill="none">
        <circle cx="250" cy="250" r="240" stroke="#E87722" stroke-width="0.5"/>
        <circle cx="250" cy="250" r="200" stroke="#E87722" stroke-width="0.5"/>
        <circle cx="250" cy="250" r="160" stroke="#E87722" stroke-width="0.5"/>
        <circle cx="250" cy="250" r="120" stroke="#E87722" stroke-width="0.5"/>
        <polygon points="250,10 490,385 10,385" stroke="#E87722" stroke-width="0.6" fill="none"/>
        <polygon points="250,490 10,115 490,115" stroke="#E87722" stroke-width="0.6" fill="none"/>
        <polygon points="250,50 460,365 40,365" stroke="#E87722" stroke-width="0.5" fill="none" opacity="0.6"/>
        <polygon points="250,450 40,135 460,135" stroke="#E87722" stroke-width="0.5" fill="none" opacity="0.6"/>
        <line x1="250" y1="10" x2="250" y2="490" stroke="#E87722" stroke-width="0.4" opacity="0.5"/>
        <line x1="10" y1="250" x2="490" y2="250" stroke="#E87722" stroke-width="0.4" opacity="0.5"/>
        <line x1="70" y1="70" x2="430" y2="430" stroke="#E87722" stroke-width="0.4" opacity="0.5"/>
        <line x1="430" y1="70" x2="70" y2="430" stroke="#E87722" stroke-width="0.4" opacity="0.5"/>
        <circle cx="250" cy="10" r="5" fill="#E87722" opacity="0.6"/>
        <circle cx="250" cy="490" r="5" fill="#E87722" opacity="0.6"/>
        <circle cx="10" cy="250" r="5" fill="#E87722" opacity="0.6"/>
        <circle cx="490" cy="250" r="5" fill="#E87722" opacity="0.6"/>
    </svg>

    <div class="hero-content">
        <div class="hero-eyebrow">✦ Ancient Vedic Science of India ✦</div>
        <h1 class="hero-title">
            Vedic<br>
            <span data-text="Wisdom">Wisdom</span>
        </h1>
        <p class="hero-sub">Ancient Knowledge &nbsp;•&nbsp; Spiritual Science &nbsp;•&nbsp; Life Transformation</p>
        <div class="hero-divider"></div>
        <a href="book-session.php" class="hero-btn">Book a Consultation</a>
    </div>

    <div class="scroll-cue">
        <span>Explore</span>
        <div class="scroll-cue-line"></div>
    </div>
</section>

<!-- ═══ INTRO ═══ -->
<section class="intro-section">
    <div class="container">
        <div class="intro-grid">
            <div class="reveal">
                <span class="section-label">The Foundation</span>
                <h2 class="section-title">What is <span>Vedic Wisdom?</span></h2>
                <div class="orange-rule"></div>
                <p>Vedic Wisdom is the ancient spiritual science of India that explains the deep connection between the universe, mind, karma, and destiny. It is a living system of knowledge refined over thousands of years.</p>
                <p>It helps individuals understand their life patterns, overcome challenges, and align with positive energy for success, health, and happiness — using both timeless wisdom and modern healing science.</p>
                <div class="stat-row reveal reveal-d2">
                    <div class="stat-box">
                        <span class="stat-num">25+</span>
                        <span class="stat-label">Years' Experience</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-num">1M+</span>
                        <span class="stat-label">Souls Guided</span>
                    </div>
                    <div class="stat-box">
                        <span class="stat-num">5000+</span>
                        <span class="stat-label">Years of Wisdom</span>
                    </div>
                </div>
            </div>
            <div class="yantra-wrap reveal reveal-d3">
                <div class="yantra-bg">
                    <svg class="yantra-svg" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <circle cx="150" cy="150" r="145" stroke="#E87722" stroke-width="1" opacity="0.2"/>
                        <polygon points="150,15 280,250 20,250" stroke="#E87722" stroke-width="1.5" fill="rgba(232,119,34,0.04)"/>
                        <polygon points="150,285 20,50 280,50" stroke="#E87722" stroke-width="1.5" fill="rgba(232,119,34,0.04)"/>
                        <polygon points="150,45 265,235 35,235" stroke="#E87722" stroke-width="1" fill="none" opacity="0.6"/>
                        <polygon points="150,255 35,65 265,65" stroke="#E87722" stroke-width="1" fill="none" opacity="0.6"/>
                        <polygon points="150,80 250,220 50,220" stroke="#E87722" stroke-width="0.8" fill="none" opacity="0.5"/>
                        <polygon points="150,220 50,80 250,80" stroke="#E87722" stroke-width="0.8" fill="none" opacity="0.5"/>
                        <circle cx="150" cy="150" r="45" stroke="#E87722" stroke-width="1" opacity="0.4"/>
                        <circle cx="150" cy="150" r="25" stroke="#E87722" stroke-width="1.5" opacity="0.6"/>
                        <circle cx="150" cy="150" r="10" fill="rgba(232,119,34,0.2)" stroke="#E87722" stroke-width="1.5"/>
                        <ellipse cx="150" cy="118" rx="7" ry="20" fill="rgba(232,119,34,0.07)" stroke="#E87722" stroke-width="0.7" transform="rotate(0 150 150)"/>
                        <ellipse cx="150" cy="118" rx="7" ry="20" fill="rgba(232,119,34,0.07)" stroke="#E87722" stroke-width="0.7" transform="rotate(45 150 150)"/>
                        <ellipse cx="150" cy="118" rx="7" ry="20" fill="rgba(232,119,34,0.07)" stroke="#E87722" stroke-width="0.7" transform="rotate(90 150 150)"/>
                        <ellipse cx="150" cy="118" rx="7" ry="20" fill="rgba(232,119,34,0.07)" stroke="#E87722" stroke-width="0.7" transform="rotate(135 150 150)"/>
                        <ellipse cx="150" cy="118" rx="7" ry="20" fill="rgba(232,119,34,0.07)" stroke="#E87722" stroke-width="0.7" transform="rotate(180 150 150)"/>
                        <ellipse cx="150" cy="118" rx="7" ry="20" fill="rgba(232,119,34,0.07)" stroke="#E87722" stroke-width="0.7" transform="rotate(225 150 150)"/>
                        <ellipse cx="150" cy="118" rx="7" ry="20" fill="rgba(232,119,34,0.07)" stroke="#E87722" stroke-width="0.7" transform="rotate(270 150 150)"/>
                        <ellipse cx="150" cy="118" rx="7" ry="20" fill="rgba(232,119,34,0.07)" stroke="#E87722" stroke-width="0.7" transform="rotate(315 150 150)"/>
                    </svg>
                </div>
                <div class="yantra-center"></div>
                <div class="yantra-ring-outer"></div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ TOPICS ═══ -->
<section class="topics-section py-5">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="section-label">The Six Pillars</span>
            <h2 class="section-title">Domains of <span>Ancient Knowledge</span></h2>
            <div class="orange-rule center"></div>
            <p class="text-muted" style="max-width:520px; margin:0 auto; font-size:0.95rem;">Six dimensions of Vedic wisdom that guide you toward a life of clarity, purpose, and abundance.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 reveal reveal-d1">
                <div class="service-card text-center">
                    <div class="card-num">01</div>
                    <div class="card-icon mx-auto"><i class="fa-solid fa-star-of-david"></i></div>
                    <h4>Vedic Astrology</h4>
                    <p>Understand planetary influences, life cycles, and karmic patterns through accurate horoscope and Jyotish analysis.</p>
                </div>
            </div>
            <div class="col-md-4 reveal reveal-d2">
                <div class="service-card text-center">
                    <div class="card-num">02</div>
                    <div class="card-icon mx-auto"><i class="fa-solid fa-infinity"></i></div>
                    <h4>Karma & Destiny</h4>
                    <p>Learn how past actions shape your present life and how conscious, dharmic choices can transform your future.</p>
                </div>
            </div>
            <div class="col-md-4 reveal reveal-d3">
                <div class="service-card text-center">
                    <div class="card-num">03</div>
                    <div class="card-icon mx-auto"><i class="fa-solid fa-brain"></i></div>
                    <h4>Subconscious Mind</h4>
                    <p>Reprogram limiting beliefs and unlock your inner power through scientific mind-healing and hypnotherapy techniques.</p>
                </div>
            </div>
            <div class="col-md-4 reveal reveal-d1">
                <div class="service-card text-center">
                    <div class="card-num">04</div>
                    <div class="card-icon mx-auto"><i class="fa-solid fa-spa"></i></div>
                    <h4>Meditation & Energy</h4>
                    <p>Balance your pranic energy system, reduce stress, and increase clarity through advanced spiritual practices.</p>
                </div>
            </div>
            <div class="col-md-4 reveal reveal-d2">
                <div class="service-card text-center">
                    <div class="card-num">05</div>
                    <div class="card-icon mx-auto"><i class="fa-solid fa-house"></i></div>
                    <h4>Vastu Shastra</h4>
                    <p>Align your living and working spaces with cosmic energy for prosperity, harmony, and positive flow.</p>
                </div>
            </div>
            <div class="col-md-4 reveal reveal-d3">
                <div class="service-card text-center">
                    <div class="card-num">06</div>
                    <div class="card-icon mx-auto"><i class="fa-solid fa-seedling"></i></div>
                    <h4>Spiritual Growth</h4>
                    <p>Move beyond fear and confusion and connect with your higher purpose and boundless inner peace.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ QUOTE BANNER ═══ -->
<section class="quote-banner">
    <div class="container">
        <div class="reveal">
            <blockquote>
                "Yatha Pinde Tatha Brahmande — As is the individual, so is the universe."
            </blockquote>
            <p class="quote-source">— Ancient Vedic Upanishad</p>
        </div>
    </div>
</section>

<!-- ═══ DAILY INSIGHTS ═══ -->
<section class="insights-section">
    <div class="container">
        <div class="text-center mb-2 reveal">
            <span class="section-label">Ongoing Guidance</span>
            <h2 class="section-title">Daily Vedic <span>Insights</span></h2>
            <div class="orange-rule center"></div>
            <p style="color:var(--text-muted); font-size:0.95rem;">Practical spiritual guidance for everyday life</p>
        </div>
    </div>

    <!-- Row 1 -->
    <div class="tape-track">
        <div class="tape-row">
            <div class="insight-card"><div class="insight-tag">Mind & Soul</div><h6>Power of Positive Thoughts</h6><p>Your thoughts create your reality. Shifting your mental frequency attracts aligned people and circumstances.</p></div>
            <div class="insight-card"><div class="insight-tag">Planets</div><h6>Planetary Remedies</h6><p>Simple and effective rituals to balance negative planetary effects and invite cosmic blessings into your life.</p></div>
            <div class="insight-card"><div class="insight-tag">Daily Ritual</div><h6>Morning Spiritual Routine</h6><p>Start your day with powerful Vedic practices to attract positivity, clarity, and purposeful energy.</p></div>
            <div class="insight-card"><div class="insight-tag">Karma</div><h6>Understanding Your Karma</h6><p>Recognize repeating life patterns as karmic lessons and learn to consciously shift your path forward.</p></div>
            <div class="insight-card"><div class="insight-tag">Vastu</div><h6>The Sacred North-East</h6><p>Keep the north-east zone of your home clean and open — it is the direction of wisdom and divine energy.</p></div>
            <!-- duplicate for seamless loop -->
            <div class="insight-card"><div class="insight-tag">Mind & Soul</div><h6>Power of Positive Thoughts</h6><p>Your thoughts create your reality. Shifting your mental frequency attracts aligned people and circumstances.</p></div>
            <div class="insight-card"><div class="insight-tag">Planets</div><h6>Planetary Remedies</h6><p>Simple and effective rituals to balance negative planetary effects and invite cosmic blessings into your life.</p></div>
            <div class="insight-card"><div class="insight-tag">Daily Ritual</div><h6>Morning Spiritual Routine</h6><p>Start your day with powerful Vedic practices to attract positivity, clarity, and purposeful energy.</p></div>
            <div class="insight-card"><div class="insight-tag">Karma</div><h6>Understanding Your Karma</h6><p>Recognize repeating life patterns as karmic lessons and learn to consciously shift your path forward.</p></div>
            <div class="insight-card"><div class="insight-tag">Vastu</div><h6>The Sacred North-East</h6><p>Keep the north-east zone of your home clean and open — it is the direction of wisdom and divine energy.</p></div>
        </div>
    </div>

    <!-- Row 2 reverse -->
    <div class="tape-track">
        <div class="tape-row reverse">
            <div class="insight-card"><div class="insight-tag">Numerology</div><h6>Your Life Path Number</h6><p>Every soul carries a vibrational number at birth. Discover yours and decode the blueprint of your destiny.</p></div>
            <div class="insight-card"><div class="insight-tag">Meditation</div><h6>Mantra Meditation</h6><p>Sacred syllables carry cosmic frequencies that calm the mind and awaken higher states of consciousness.</p></div>
            <div class="insight-card"><div class="insight-tag">Gemstones</div><h6>Healing Gemstones</h6><p>Each planet governs a specific gemstone. Wearing the right stone channels beneficial planetary energy to you.</p></div>
            <div class="insight-card"><div class="insight-tag">Palmistry</div><h6>Lines of Destiny</h6><p>Your palm holds a map of your potential. Learn the language encoded in your life, heart, and fate lines.</p></div>
            <div class="insight-card"><div class="insight-tag">Fasting</div><h6>Ekadashi Fasting</h6><p>Fasting on Ekadashi purifies the mind and body, creating a clear channel for spiritual insight and divine grace.</p></div>
            <!-- duplicate -->
            <div class="insight-card"><div class="insight-tag">Numerology</div><h6>Your Life Path Number</h6><p>Every soul carries a vibrational number at birth. Discover yours and decode the blueprint of your destiny.</p></div>
            <div class="insight-card"><div class="insight-tag">Meditation</div><h6>Mantra Meditation</h6><p>Sacred syllables carry cosmic frequencies that calm the mind and awaken higher states of consciousness.</p></div>
            <div class="insight-card"><div class="insight-tag">Gemstones</div><h6>Healing Gemstones</h6><p>Each planet governs a specific gemstone. Wearing the right stone channels beneficial planetary energy to you.</p></div>
            <div class="insight-card"><div class="insight-tag">Palmistry</div><h6>Lines of Destiny</h6><p>Your palm holds a map of your potential. Learn the language encoded in your life, heart, and fate lines.</p></div>
            <div class="insight-card"><div class="insight-tag">Fasting</div><h6>Ekadashi Fasting</h6><p>Fasting on Ekadashi purifies the mind and body, creating a clear channel for spiritual insight and divine grace.</p></div>
        </div>
    </div>
</section>

<!-- ═══ CTA ═══ -->
<section class="cta-section">
    <div class="container">
        <div class="cta-inner reveal">
            <span class="section-label">Begin Your Journey</span>
            <h2 class="cta-title">Learn Vedic Wisdom from <span>Dr. Pradeep</span></h2>
            <p class="cta-sub">Get personal guidance and transform your life with ancient knowledge and modern healing techniques.</p>
            <a href="book-session.php" class="btn-premium-lg">Book Consultation</a>
        </div>
    </div>
</section>

<!-- ═══ FOOTER ═══ -->
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

<!-- WhatsApp -->
<a href="https://wa.me/919096161750" class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp fa-lg"></i> Chat Now
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Navbar scroll shadow
    window.addEventListener('scroll', () => {
        document.getElementById('navbar').classList.toggle('scrolled', scrollY > 60);
    });

    // Scroll reveal
    const obs = new IntersectionObserver(entries => {
        entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); } });
    }, { threshold: 0.1 });
    document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

    // Floating particles
    function spawnParticle() {
        const p = document.createElement('div');
        p.className = 'particle';
        p.style.cssText = `left:${Math.random()*100}vw; width:${Math.random()*3+2}px; height:${Math.random()*3+2}px; animation-duration:${Math.random()*10+8}s; animation-delay:${Math.random()*4}s; opacity:0;`;
        document.body.appendChild(p);
        setTimeout(() => p.remove(), 16000);
    }
    setInterval(spawnParticle, 1500);
</script>
</body>
</html>