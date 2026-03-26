<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vedic Wisdom | Astro Pradeep</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Cinzel+Decorative:wght@400;700&family=Cormorant:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --gold: #C9A84C;
            --gold-light: #E8C96A;
            --gold-dim: #9A7A30;
            --deep: #0D0A05;
            --ink: #1A1208;
            --parchment: #F5EDD8;
            --parchment-dark: #EDE0C4;
            --crimson: #8B1A1A;
            --text-body: #3D2B0A;
            --glow: rgba(201,168,76,0.25);
        }

        html { scroll-behavior: smooth; }

        body {
            background: var(--deep);
            color: var(--parchment);
            font-family: 'Cormorant Garamond', serif;
            overflow-x: hidden;
            cursor: none;
        }

        /* ── Custom Cursor ── */
        .cursor {
            width: 12px; height: 12px;
            background: var(--gold);
            border-radius: 50%;
            position: fixed; top: 0; left: 0;
            pointer-events: none;
            z-index: 9999;
            transition: transform 0.15s ease;
            mix-blend-mode: difference;
        }
        .cursor-ring {
            width: 36px; height: 36px;
            border: 1px solid var(--gold-light);
            border-radius: 50%;
            position: fixed; top: 0; left: 0;
            pointer-events: none;
            z-index: 9998;
            transition: transform 0.4s cubic-bezier(0.25,0.46,0.45,0.94);
            opacity: 0.6;
        }

        /* ── Stars BG ── */
        #star-canvas {
            position: fixed; inset: 0;
            z-index: 0;
            pointer-events: none;
        }

        /* ── Navbar ── */
        nav {
            position: fixed; top: 0; left: 0; right: 0;
            z-index: 1000;
            padding: 18px 0;
            transition: all 0.5s ease;
        }
        nav.scrolled {
            background: rgba(13,10,5,0.92);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(201,168,76,0.2);
            padding: 12px 0;
        }
        .nav-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .nav-logo {
            font-family: 'Cinzel Decorative', serif;
            font-size: 1.15rem;
            letter-spacing: 0.12em;
            color: var(--gold-light);
            text-decoration: none;
        }
        .nav-logo span { color: #fff; }
        .nav-links { display: flex; gap: 36px; list-style: none; }
        .nav-links a {
            font-family: 'Cormorant Garamond', serif;
            font-size: 0.95rem;
            letter-spacing: 0.08em;
            color: rgba(245,237,216,0.75);
            text-decoration: none;
            position: relative;
            transition: color 0.3s;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -3px; left: 0; right: 100%;
            height: 1px;
            background: var(--gold);
            transition: right 0.35s ease;
        }
        .nav-links a:hover { color: var(--gold-light); }
        .nav-links a:hover::after { right: 0; }
        .nav-cta {
            padding: 9px 24px;
            border: 1px solid var(--gold);
            color: var(--gold) !important;
            border-radius: 2px;
            letter-spacing: 0.1em;
            font-size: 0.82rem !important;
            transition: background 0.3s, color 0.3s !important;
        }
        .nav-cta:hover { background: var(--gold) !important; color: var(--deep) !important; }
        .nav-cta::after { display: none !important; }

        /* ── Hero ── */
        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            z-index: 1;
        }
        .hero-mandala {
            position: absolute;
            width: 680px; height: 680px;
            opacity: 0.06;
            animation: mandalaSpin 80s linear infinite;
        }
        @keyframes mandalaSpin { to { transform: rotate(360deg); } }
        .hero-mandala-2 {
            position: absolute;
            width: 440px; height: 440px;
            opacity: 0.08;
            animation: mandalaSpin 50s linear infinite reverse;
        }
        .hero-content {
            position: relative;
            text-align: center;
            z-index: 2;
            padding: 0 20px;
        }
        .hero-eyebrow {
            display: inline-block;
            font-size: 0.78rem;
            letter-spacing: 0.35em;
            color: var(--gold);
            text-transform: uppercase;
            margin-bottom: 24px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 1s ease 0.3s forwards;
        }
        .hero-title {
            font-family: 'Cinzel Decorative', serif;
            font-size: clamp(3rem, 8vw, 7rem);
            font-weight: 400;
            line-height: 1.1;
            color: transparent;
            background: linear-gradient(135deg, #E8C96A 0%, #C9A84C 40%, #fff7e0 60%, #C9A84C 80%, #9A7A30 100%);
            -webkit-background-clip: text;
            background-clip: text;
            letter-spacing: 0.04em;
            opacity: 0;
            animation: fadeUp 1.2s ease 0.6s forwards;
            text-shadow: none;
            filter: drop-shadow(0 0 60px rgba(201,168,76,0.3));
        }
        .hero-sub {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: clamp(1.1rem, 2.5vw, 1.6rem);
            color: rgba(245,237,216,0.65);
            margin-top: 20px;
            letter-spacing: 0.06em;
            opacity: 0;
            animation: fadeUp 1s ease 1s forwards;
        }
        .hero-divider {
            width: 120px;
            height: 1px;
            background: linear-gradient(to right, transparent, var(--gold), transparent);
            margin: 32px auto;
            opacity: 0;
            animation: fadeUp 1s ease 1.3s forwards;
        }
        .hero-btn {
            display: inline-block;
            padding: 14px 44px;
            background: transparent;
            border: 1px solid var(--gold);
            color: var(--gold-light);
            font-family: 'Cormorant Garamond', serif;
            font-size: 1rem;
            letter-spacing: 0.2em;
            text-decoration: none;
            text-transform: uppercase;
            position: relative;
            overflow: hidden;
            transition: color 0.4s;
            opacity: 0;
            animation: fadeUp 1s ease 1.6s forwards;
        }
        .hero-btn::before {
            content: '';
            position: absolute;
            inset: 0;
            background: var(--gold);
            transform: translateX(-101%);
            transition: transform 0.4s cubic-bezier(0.76, 0, 0.24, 1);
        }
        .hero-btn:hover { color: var(--deep); }
        .hero-btn:hover::before { transform: translateX(0); }
        .hero-btn span { position: relative; z-index: 1; }

        .scroll-indicator {
            position: absolute;
            bottom: 36px; left: 50%;
            transform: translateX(-50%);
            display: flex; flex-direction: column; align-items: center;
            gap: 8px;
            opacity: 0;
            animation: fadeIn 1s ease 2.2s forwards;
        }
        .scroll-indicator span {
            font-size: 0.65rem;
            letter-spacing: 0.25em;
            color: rgba(201,168,76,0.5);
            text-transform: uppercase;
        }
        .scroll-line {
            width: 1px; height: 60px;
            background: linear-gradient(to bottom, var(--gold), transparent);
            animation: scrollPulse 2s ease infinite;
        }
        @keyframes scrollPulse {
            0%, 100% { opacity: 0.3; transform: scaleY(1); }
            50% { opacity: 1; transform: scaleY(1.1); }
        }

        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn { to { opacity: 1; } }

        /* ── Section Base ── */
        section { position: relative; z-index: 1; }
        .container { max-width: 1280px; margin: 0 auto; padding: 0 40px; }
        .section-label {
            font-size: 0.7rem;
            letter-spacing: 0.4em;
            color: var(--gold);
            text-transform: uppercase;
            display: block;
            margin-bottom: 16px;
        }
        .section-title {
            font-family: 'Cinzel Decorative', serif;
            font-size: clamp(1.6rem, 3.5vw, 2.8rem);
            font-weight: 400;
            color: var(--parchment);
            line-height: 1.2;
        }
        .section-title em { color: var(--gold-light); font-style: normal; }
        .gold-rule {
            width: 60px; height: 2px;
            background: linear-gradient(to right, var(--gold), transparent);
            margin: 24px 0;
        }

        /* ── What is Vedic Wisdom ── */
        .intro-section {
            padding: 120px 0;
            background: linear-gradient(180deg, var(--deep) 0%, #110D06 100%);
        }
        .intro-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }
        .intro-text p {
            font-size: 1.2rem;
            line-height: 1.95;
            color: rgba(245,237,216,0.75);
            margin-bottom: 24px;
        }
        .intro-visual {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .yantra-svg {
            width: 360px; height: 360px;
            animation: mandalaSpin 60s linear infinite;
            filter: drop-shadow(0 0 40px rgba(201,168,76,0.2));
        }
        .yantra-center-dot {
            position: absolute;
            width: 14px; height: 14px;
            background: var(--gold);
            border-radius: 50%;
            box-shadow: 0 0 20px var(--gold), 0 0 60px rgba(201,168,76,0.5);
            animation: pulseDot 3s ease infinite;
        }
        @keyframes pulseDot {
            0%, 100% { box-shadow: 0 0 20px var(--gold), 0 0 60px rgba(201,168,76,0.5); }
            50% { box-shadow: 0 0 30px var(--gold), 0 0 100px rgba(201,168,76,0.8); }
        }
        .stat-pills {
            display: flex; gap: 24px; margin-top: 40px; flex-wrap: wrap;
        }
        .pill {
            border: 1px solid rgba(201,168,76,0.3);
            padding: 14px 28px;
            border-radius: 2px;
            text-align: center;
            background: rgba(201,168,76,0.04);
        }
        .pill-num {
            display: block;
            font-family: 'Cinzel Decorative', serif;
            font-size: 1.8rem;
            color: var(--gold-light);
            line-height: 1;
        }
        .pill-label {
            font-size: 0.75rem;
            letter-spacing: 0.15em;
            color: rgba(245,237,216,0.5);
            text-transform: uppercase;
            margin-top: 4px;
        }

        /* ── Wisdom Topics ── */
        .topics-section {
            padding: 120px 0;
            background: linear-gradient(180deg, #110D06 0%, #0A0702 100%);
        }
        .topics-header { text-align: center; margin-bottom: 70px; }
        .topics-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
        }
        .topic-card {
            position: relative;
            padding: 56px 40px;
            background: rgba(201,168,76,0.03);
            border: 1px solid rgba(201,168,76,0.12);
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.25,0.46,0.45,0.94);
            cursor: default;
        }
        .topic-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(201,168,76,0.08) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.5s;
        }
        .topic-card:hover { background: rgba(201,168,76,0.07); transform: translateY(-4px); }
        .topic-card:hover::before { opacity: 1; }
        .topic-card::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 100%;
            height: 2px;
            background: var(--gold);
            transition: right 0.5s ease;
        }
        .topic-card:hover::after { right: 0; }
        .topic-icon {
            width: 56px; height: 56px;
            margin-bottom: 24px;
            opacity: 0.7;
            transition: opacity 0.3s;
        }
        .topic-card:hover .topic-icon { opacity: 1; }
        .topic-num {
            position: absolute;
            top: 24px; right: 28px;
            font-family: 'Cinzel Decorative', serif;
            font-size: 3.5rem;
            color: rgba(201,168,76,0.06);
            line-height: 1;
            transition: color 0.5s;
        }
        .topic-card:hover .topic-num { color: rgba(201,168,76,0.12); }
        .topic-title {
            font-family: 'Cinzel Decorative', serif;
            font-size: 0.95rem;
            font-weight: 400;
            color: var(--gold-light);
            letter-spacing: 0.08em;
            margin-bottom: 16px;
        }
        .topic-desc {
            font-size: 1.05rem;
            line-height: 1.8;
            color: rgba(245,237,216,0.6);
        }

        /* ── Daily Insights ── */
        .insights-section {
            padding: 120px 0;
            background: #0D0A05;
            overflow: hidden;
        }
        .insights-header { margin-bottom: 60px; }
        .insight-tape {
            display: flex;
            gap: 32px;
            animation: tapeMarch 30s linear infinite;
            width: max-content;
            margin-bottom: 32px;
        }
        .insight-tape-reverse {
            animation: tapeMarchReverse 28s linear infinite;
        }
        @keyframes tapeMarch {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }
        @keyframes tapeMarchReverse {
            from { transform: translateX(-50%); }
            to { transform: translateX(0); }
        }
        .tape-card {
            min-width: 340px;
            padding: 32px 36px;
            border: 1px solid rgba(201,168,76,0.15);
            background: rgba(201,168,76,0.03);
            flex-shrink: 0;
            transition: border-color 0.3s;
        }
        .tape-card:hover { border-color: rgba(201,168,76,0.4); }
        .tape-tag {
            font-size: 0.65rem;
            letter-spacing: 0.3em;
            color: var(--gold);
            text-transform: uppercase;
            margin-bottom: 12px;
        }
        .tape-title {
            font-family: 'Cinzel Decorative', serif;
            font-size: 0.9rem;
            color: var(--parchment);
            margin-bottom: 10px;
        }
        .tape-text {
            font-size: 0.98rem;
            line-height: 1.75;
            color: rgba(245,237,216,0.55);
        }

        /* ── Sanskrit Quote ── */
        .quote-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #0A0702 0%, #130E05 50%, #0A0702 100%);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .quote-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at center, rgba(201,168,76,0.06) 0%, transparent 70%);
        }
        .quote-sanskrit {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(1.4rem, 3vw, 2.4rem);
            font-style: italic;
            color: var(--gold-light);
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .quote-translation {
            font-size: 1.05rem;
            color: rgba(245,237,216,0.5);
            letter-spacing: 0.05em;
        }
        .quote-ornament {
            font-size: 4rem;
            color: rgba(201,168,76,0.15);
            line-height: 1;
            margin-bottom: 20px;
        }

        /* ── Reveal animation ── */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s cubic-bezier(0.25,0.46,0.45,0.94), transform 0.8s cubic-bezier(0.25,0.46,0.45,0.94);
        }
        .reveal.visible { opacity: 1; transform: translateY(0); }
        .reveal-delay-1 { transition-delay: 0.1s; }
        .reveal-delay-2 { transition-delay: 0.2s; }
        .reveal-delay-3 { transition-delay: 0.3s; }
        .reveal-delay-4 { transition-delay: 0.4s; }
        .reveal-delay-5 { transition-delay: 0.5s; }

        /* ── CTA ── */
        .cta-section {
            padding: 160px 0;
            background: var(--deep);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-bg-glow {
            position: absolute;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(201,168,76,0.08) 0%, transparent 70%);
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            pointer-events: none;
        }
        .cta-title {
            font-family: 'Cinzel Decorative', serif;
            font-size: clamp(1.8rem, 4vw, 3.2rem);
            color: var(--parchment);
            margin-bottom: 20px;
            line-height: 1.3;
        }
        .cta-title em { color: var(--gold-light); font-style: normal; }
        .cta-sub {
            font-size: 1.2rem;
            color: rgba(245,237,216,0.55);
            max-width: 560px;
            margin: 0 auto 44px;
            line-height: 1.8;
        }
        .cta-btn {
            display: inline-block;
            padding: 18px 56px;
            background: linear-gradient(135deg, var(--gold-dim), var(--gold), var(--gold-light));
            color: var(--deep);
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.05rem;
            letter-spacing: 0.2em;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: 600;
            border-radius: 2px;
            transition: all 0.4s;
            box-shadow: 0 0 40px rgba(201,168,76,0.2);
        }
        .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 60px rgba(201,168,76,0.35);
        }

        /* ── Footer ── */
        footer {
            background: #070504;
            border-top: 1px solid rgba(201,168,76,0.12);
            padding: 80px 0 32px;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 60px;
            margin-bottom: 60px;
        }
        .footer-brand {
            font-family: 'Cinzel Decorative', serif;
            font-size: 1.1rem;
            color: var(--gold-light);
            margin-bottom: 16px;
        }
        .footer-brand span { color: #fff; }
        .footer-about {
            font-size: 0.95rem;
            line-height: 1.85;
            color: rgba(245,237,216,0.45);
            margin-bottom: 24px;
        }
        .footer-socials { display: flex; gap: 14px; }
        .footer-socials a {
            width: 38px; height: 38px;
            border: 1px solid rgba(201,168,76,0.25);
            display: flex; align-items: center; justify-content: center;
            color: rgba(201,168,76,0.6);
            font-size: 0.85rem;
            text-decoration: none;
            border-radius: 2px;
            transition: all 0.3s;
        }
        .footer-socials a:hover {
            border-color: var(--gold);
            color: var(--gold);
            background: rgba(201,168,76,0.08);
        }
        .footer-heading {
            font-family: 'Cinzel Decorative', serif;
            font-size: 0.8rem;
            color: var(--parchment);
            letter-spacing: 0.08em;
            margin-bottom: 20px;
        }
        .footer-links { list-style: none; display: flex; flex-direction: column; gap: 10px; }
        .footer-links a {
            font-size: 0.92rem;
            color: rgba(245,237,216,0.45);
            text-decoration: none;
            letter-spacing: 0.03em;
            transition: color 0.3s;
        }
        .footer-links a:hover { color: var(--gold-light); }
        .footer-newsletter input {
            width: 100%;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(201,168,76,0.2);
            padding: 12px 16px;
            color: var(--parchment);
            font-family: 'Cormorant Garamond', serif;
            font-size: 0.95rem;
            outline: none;
            margin-bottom: 10px;
            border-radius: 2px;
            transition: border-color 0.3s;
        }
        .footer-newsletter input:focus { border-color: var(--gold); }
        .footer-newsletter input::placeholder { color: rgba(245,237,216,0.3); }
        .footer-newsletter button {
            width: 100%;
            padding: 12px;
            background: transparent;
            border: 1px solid var(--gold);
            color: var(--gold);
            font-family: 'Cormorant Garamond', serif;
            font-size: 0.9rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 2px;
            transition: all 0.3s;
        }
        .footer-newsletter button:hover { background: var(--gold); color: var(--deep); }
        .footer-bottom {
            border-top: 1px solid rgba(201,168,76,0.08);
            padding-top: 28px;
            text-align: center;
            font-size: 0.8rem;
            color: rgba(245,237,216,0.25);
            letter-spacing: 0.08em;
        }

        /* ── WhatsApp ── */
        .wa-float {
            position: fixed;
            bottom: 28px; right: 28px;
            z-index: 500;
            display: flex; align-items: center; gap: 10px;
            background: linear-gradient(135deg, #128C7E, #25D366);
            color: #fff;
            padding: 12px 22px;
            border-radius: 40px;
            text-decoration: none;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1rem;
            box-shadow: 0 4px 30px rgba(37,211,102,0.35);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .wa-float:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 40px rgba(37,211,102,0.5);
            color: #fff;
        }

        /* ── Floating particles ── */
        .particle {
            position: fixed;
            width: 2px; height: 2px;
            background: var(--gold);
            border-radius: 50%;
            pointer-events: none;
            animation: particleFloat linear infinite;
            opacity: 0;
        }
        @keyframes particleFloat {
            0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
            10% { opacity: 0.6; }
            90% { opacity: 0.3; }
            100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
        }

        @media (max-width: 968px) {
            .intro-grid, .footer-grid { grid-template-columns: 1fr; gap: 40px; }
            .topics-grid { grid-template-columns: 1fr; }
            .nav-links { display: none; }
            .yantra-svg { width: 260px; height: 260px; }
        }
    </style>
</head>
<body>

<!-- Custom Cursor -->
<div class="cursor" id="cursor"></div>
<div class="cursor-ring" id="cursorRing"></div>

<!-- Star Canvas -->
<canvas id="star-canvas"></canvas>

<!-- Navbar -->
<nav id="navbar">
    <div class="nav-inner">
        <a class="nav-logo" href="index.php">ASTRO <span>PRADEEP</span></a>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Horoscope</a></li>
            <li><a href="#">Astrology</a></li>
            <li><a href="Panchang.php">Panchang</a></li>
            <li><a href="Festivals.php">Festivals</a></li>
            <li><a href="vedic-wisdom.php">Vedic Wisdom</a></li>
            <li><a href="book-session.php" class="nav-cta">Book Now</a></li>
        </ul>
    </div>
</nav>

<!-- ═══════════════════════ HERO ═══════════════════════ -->
<section class="hero">
    <!-- Mandala SVG -->
    <svg class="hero-mandala" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" fill="none">
        <circle cx="200" cy="200" r="190" stroke="#C9A84C" stroke-width="0.5"/>
        <circle cx="200" cy="200" r="160" stroke="#C9A84C" stroke-width="0.5"/>
        <circle cx="200" cy="200" r="130" stroke="#C9A84C" stroke-width="0.5"/>
        <circle cx="200" cy="200" r="100" stroke="#C9A84C" stroke-width="0.5"/>
        <circle cx="200" cy="200" r="70" stroke="#C9A84C" stroke-width="0.5"/>
        <circle cx="200" cy="200" r="40" stroke="#C9A84C" stroke-width="1"/>
        <polygon points="200,10 390,310 10,310" stroke="#C9A84C" stroke-width="0.5" fill="none" opacity="0.5"/>
        <polygon points="200,390 10,90 390,90" stroke="#C9A84C" stroke-width="0.5" fill="none" opacity="0.5"/>
        <polygon points="200,50 350,290 50,290" stroke="#C9A84C" stroke-width="0.5" fill="none" opacity="0.4"/>
        <polygon points="200,350 50,110 350,110" stroke="#C9A84C" stroke-width="0.5" fill="none" opacity="0.4"/>
        <line x1="200" y1="10" x2="200" y2="390" stroke="#C9A84C" stroke-width="0.3" opacity="0.4"/>
        <line x1="10" y1="200" x2="390" y2="200" stroke="#C9A84C" stroke-width="0.3" opacity="0.4"/>
        <line x1="55" y1="55" x2="345" y2="345" stroke="#C9A84C" stroke-width="0.3" opacity="0.4"/>
        <line x1="345" y1="55" x2="55" y2="345" stroke="#C9A84C" stroke-width="0.3" opacity="0.4"/>
        <circle cx="200" cy="10" r="4" fill="#C9A84C" opacity="0.5"/>
        <circle cx="200" cy="390" r="4" fill="#C9A84C" opacity="0.5"/>
        <circle cx="10" cy="200" r="4" fill="#C9A84C" opacity="0.5"/>
        <circle cx="390" cy="200" r="4" fill="#C9A84C" opacity="0.5"/>
        <circle cx="55" cy="55" r="4" fill="#C9A84C" opacity="0.5"/>
        <circle cx="345" cy="55" r="4" fill="#C9A84C" opacity="0.5"/>
        <circle cx="55" cy="345" r="4" fill="#C9A84C" opacity="0.5"/>
        <circle cx="345" cy="345" r="4" fill="#C9A84C" opacity="0.5"/>
    </svg>

    <svg class="hero-mandala-2" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg" fill="none">
        <polygon points="200,20 380,300 20,300" stroke="#C9A84C" stroke-width="0.8" fill="none"/>
        <polygon points="200,380 20,100 380,100" stroke="#C9A84C" stroke-width="0.8" fill="none"/>
        <circle cx="200" cy="200" r="180" stroke="#C9A84C" stroke-width="0.5"/>
        <circle cx="200" cy="200" r="120" stroke="#C9A84C" stroke-width="0.5"/>
        <circle cx="200" cy="200" r="60" stroke="#C9A84C" stroke-width="0.8"/>
    </svg>

    <div class="hero-content">
        <span class="hero-eyebrow">✦ Ancient Vedic Science ✦</span>
        <h1 class="hero-title">Vedic<br>Wisdom</h1>
        <p class="hero-sub">Where the Cosmos Meets Consciousness</p>
        <div class="hero-divider"></div>
        <a href="book-session.php" class="hero-btn"><span>Seek Guidance</span></a>
    </div>

    <div class="scroll-indicator">
        <span>Explore</span>
        <div class="scroll-line"></div>
    </div>
</section>

<!-- ═══════════════════════ INTRO ═══════════════════════ -->
<section class="intro-section">
    <div class="container">
        <div class="intro-grid">
            <div class="intro-text reveal">
                <span class="section-label">The Foundation</span>
                <h2 class="section-title">What is<br><em>Vedic Wisdom?</em></h2>
                <div class="gold-rule"></div>
                <p>
                    Vedic Wisdom is the ancient spiritual science of India — a complete system of knowledge that explores the profound connection between the cosmos, the human mind, karma, and destiny.
                </p>
                <p>
                    Rooted in thousands of years of observation, meditation, and insight, it offers a living map for understanding life's deepest patterns, overcoming challenges, and aligning oneself with the universal flow of positive energy.
                </p>
                <div class="stat-pills reveal reveal-delay-2">
                    <div class="pill">
                        <span class="pill-num">25+</span>
                        <span class="pill-label">Years Experience</span>
                    </div>
                    <div class="pill">
                        <span class="pill-num">1M+</span>
                        <span class="pill-label">Souls Guided</span>
                    </div>
                    <div class="pill">
                        <span class="pill-num">5000+</span>
                        <span class="pill-label">Years of Wisdom</span>
                    </div>
                </div>
            </div>
            <div class="intro-visual reveal reveal-delay-3">
                <svg class="yantra-svg" viewBox="0 0 360 360" xmlns="http://www.w3.org/2000/svg" fill="none">
                    <!-- Sri Yantra simplified -->
                    <circle cx="180" cy="180" r="175" stroke="#C9A84C" stroke-width="1" opacity="0.3"/>
                    <circle cx="180" cy="180" r="165" stroke="#C9A84C" stroke-width="0.5" opacity="0.2"/>
                    <polygon points="180,20 340,300 20,300" stroke="#C9A84C" stroke-width="1.5" fill="rgba(201,168,76,0.03)"/>
                    <polygon points="180,340 20,60 340,60" stroke="#C9A84C" stroke-width="1.5" fill="rgba(201,168,76,0.03)"/>
                    <polygon points="180,55 315,285 45,285" stroke="#C9A84C" stroke-width="1" fill="none" opacity="0.6"/>
                    <polygon points="180,305 45,75 315,75" stroke="#C9A84C" stroke-width="1" fill="none" opacity="0.6"/>
                    <polygon points="180,90 300,270 60,270" stroke="#C9A84C" stroke-width="0.8" fill="none" opacity="0.5"/>
                    <polygon points="180,270 60,90 300,90" stroke="#C9A84C" stroke-width="0.8" fill="none" opacity="0.5"/>
                    <circle cx="180" cy="180" r="50" stroke="#C9A84C" stroke-width="1" opacity="0.4"/>
                    <circle cx="180" cy="180" r="30" stroke="#C9A84C" stroke-width="1.5" opacity="0.6"/>
                    <circle cx="180" cy="180" r="12" fill="rgba(201,168,76,0.15)" stroke="#C9A84C" stroke-width="1.5"/>
                    <!-- Lotus petals -->
                    <ellipse cx="180" cy="145" rx="8" ry="22" fill="rgba(201,168,76,0.08)" stroke="#C9A84C" stroke-width="0.8" transform="rotate(0 180 180)"/>
                    <ellipse cx="180" cy="145" rx="8" ry="22" fill="rgba(201,168,76,0.08)" stroke="#C9A84C" stroke-width="0.8" transform="rotate(45 180 180)"/>
                    <ellipse cx="180" cy="145" rx="8" ry="22" fill="rgba(201,168,76,0.08)" stroke="#C9A84C" stroke-width="0.8" transform="rotate(90 180 180)"/>
                    <ellipse cx="180" cy="145" rx="8" ry="22" fill="rgba(201,168,76,0.08)" stroke="#C9A84C" stroke-width="0.8" transform="rotate(135 180 180)"/>
                    <ellipse cx="180" cy="145" rx="8" ry="22" fill="rgba(201,168,76,0.08)" stroke="#C9A84C" stroke-width="0.8" transform="rotate(180 180 180)"/>
                    <ellipse cx="180" cy="145" rx="8" ry="22" fill="rgba(201,168,76,0.08)" stroke="#C9A84C" stroke-width="0.8" transform="rotate(225 180 180)"/>
                    <ellipse cx="180" cy="145" rx="8" ry="22" fill="rgba(201,168,76,0.08)" stroke="#C9A84C" stroke-width="0.8" transform="rotate(270 180 180)"/>
                    <ellipse cx="180" cy="145" rx="8" ry="22" fill="rgba(201,168,76,0.08)" stroke="#C9A84C" stroke-width="0.8" transform="rotate(315 180 180)"/>
                </svg>
                <div class="yantra-center-dot"></div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════ TOPICS ═══════════════════════ -->
<section class="topics-section">
    <div class="container">
        <div class="topics-header reveal">
            <span class="section-label">The Six Pillars</span>
            <h2 class="section-title">Domains of <em>Ancient Knowledge</em></h2>
        </div>
        <div class="topics-grid">

            <div class="topic-card reveal">
                <div class="topic-num">01</div>
                <svg class="topic-icon" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="28" cy="28" r="26" stroke="#C9A84C" stroke-width="1"/>
                    <circle cx="28" cy="28" r="6" fill="#C9A84C" opacity="0.4"/>
                    <line x1="28" y1="2" x2="28" y2="14" stroke="#C9A84C" stroke-width="1.5"/>
                    <line x1="28" y1="42" x2="28" y2="54" stroke="#C9A84C" stroke-width="1.5"/>
                    <line x1="2" y1="28" x2="14" y2="28" stroke="#C9A84C" stroke-width="1.5"/>
                    <line x1="42" y1="28" x2="54" y2="28" stroke="#C9A84C" stroke-width="1.5"/>
                    <circle cx="28" cy="2" r="2" fill="#C9A84C"/>
                    <circle cx="28" cy="54" r="2" fill="#C9A84C"/>
                    <circle cx="2" cy="28" r="2" fill="#C9A84C"/>
                    <circle cx="54" cy="28" r="2" fill="#C9A84C"/>
                </svg>
                <div class="topic-title">Vedic Astrology</div>
                <div class="topic-desc">Understand planetary influences, life cycles, and karmic patterns through precise horoscope analysis and Jyotish science.</div>
            </div>

            <div class="topic-card reveal reveal-delay-1">
                <div class="topic-num">02</div>
                <svg class="topic-icon" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28 4 L52 48 L4 48 Z" stroke="#C9A84C" stroke-width="1.2" fill="rgba(201,168,76,0.05)"/>
                    <path d="M28 18 L44 44 L12 44 Z" stroke="#C9A84C" stroke-width="1" fill="rgba(201,168,76,0.08)"/>
                    <circle cx="28" cy="32" r="5" fill="#C9A84C" opacity="0.5"/>
                </svg>
                <div class="topic-title">Karma & Destiny</div>
                <div class="topic-desc">Learn how past actions shape your present life and how conscious, dharmic choices can transform your future trajectory.</div>
            </div>

            <div class="topic-card reveal reveal-delay-2">
                <div class="topic-num">03</div>
                <svg class="topic-icon" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <ellipse cx="28" cy="28" rx="24" ry="10" stroke="#C9A84C" stroke-width="1"/>
                    <ellipse cx="28" cy="28" rx="10" ry="24" stroke="#C9A84C" stroke-width="1"/>
                    <circle cx="28" cy="28" r="5" fill="#C9A84C" opacity="0.5"/>
                    <circle cx="28" cy="28" r="24" stroke="#C9A84C" stroke-width="0.8" opacity="0.4"/>
                </svg>
                <div class="topic-title">Subconscious Mind</div>
                <div class="topic-desc">Reprogram limiting beliefs and unlock your inner power through proven mind-healing and hypnotherapy techniques.</div>
            </div>

            <div class="topic-card reveal">
                <div class="topic-num">04</div>
                <svg class="topic-icon" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28 8 Q 44 20, 44 36 Q 44 48, 28 50 Q 12 48, 12 36 Q 12 20, 28 8Z" stroke="#C9A84C" stroke-width="1" fill="rgba(201,168,76,0.05)"/>
                    <circle cx="28" cy="30" r="8" stroke="#C9A84C" stroke-width="1" fill="rgba(201,168,76,0.1)"/>
                    <line x1="28" y1="8" x2="28" y2="22" stroke="#C9A84C" stroke-width="1"/>
                    <line x1="28" y1="38" x2="28" y2="50" stroke="#C9A84C" stroke-width="1"/>
                </svg>
                <div class="topic-title">Meditation & Energy</div>
                <div class="topic-desc">Balance your pranic energy system, reduce stress, and cultivate inner clarity through advanced spiritual practices.</div>
            </div>

            <div class="topic-card reveal reveal-delay-1">
                <div class="topic-num">05</div>
                <svg class="topic-icon" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="6" y="6" width="44" height="44" stroke="#C9A84C" stroke-width="1" fill="rgba(201,168,76,0.03)"/>
                    <rect x="16" y="16" width="24" height="24" stroke="#C9A84C" stroke-width="1" fill="rgba(201,168,76,0.06)"/>
                    <rect x="24" y="24" width="8" height="8" fill="#C9A84C" opacity="0.4"/>
                    <line x1="6" y1="6" x2="50" y2="50" stroke="#C9A84C" stroke-width="0.5" opacity="0.5"/>
                    <line x1="50" y1="6" x2="6" y2="50" stroke="#C9A84C" stroke-width="0.5" opacity="0.5"/>
                </svg>
                <div class="topic-title">Vastu Shastra</div>
                <div class="topic-desc">Align your living and working spaces with the cosmic grid for prosperity, harmony, and positive energy flow.</div>
            </div>

            <div class="topic-card reveal reveal-delay-2">
                <div class="topic-num">06</div>
                <svg class="topic-icon" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28 6 L32 20 L46 20 L35 29 L39 43 L28 34 L17 43 L21 29 L10 20 L24 20 Z" stroke="#C9A84C" stroke-width="1" fill="rgba(201,168,76,0.1)"/>
                    <circle cx="28" cy="28" r="5" fill="#C9A84C" opacity="0.4"/>
                </svg>
                <div class="topic-title">Spiritual Growth</div>
                <div class="topic-desc">Rise beyond fear and confusion. Connect with your higher purpose and discover the boundless peace of your true self.</div>
            </div>

        </div>
    </div>
</section>

<!-- ═══════════════════════ QUOTE ═══════════════════════ -->
<section class="quote-section">
    <div class="container">
        <div class="reveal" style="max-width:760px; margin: 0 auto;">
            <div class="quote-ornament">❝</div>
            <p class="quote-sanskrit">
                "Yatha Pinde Tatha Brahmande"
            </p>
            <p class="quote-translation">
                As is the microcosm, so is the macrocosm — As is the individual, so is the universe.
            </p>
        </div>
    </div>
</section>

<!-- ═══════════════════════ DAILY INSIGHTS (Scrolling Tape) ═══════════════════════ -->
<section class="insights-section">
    <div class="container">
        <div class="insights-header reveal">
            <span class="section-label">Ongoing Guidance</span>
            <h2 class="section-title">Daily Vedic <em>Insights</em></h2>
            <p style="color:rgba(245,237,216,0.45); margin-top:12px; font-size:1.05rem;">Practical spiritual guidance for everyday life</p>
        </div>
    </div>

    <!-- Tape Row 1 -->
    <div style="overflow:hidden; margin-bottom: 28px;">
        <div class="insight-tape">
            <div class="tape-card">
                <div class="tape-tag">Mind & Soul</div>
                <div class="tape-title">Power of Positive Thoughts</div>
                <div class="tape-text">Your thoughts create your reality. Shifting your mental frequency attracts aligned circumstances and people.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Planetary Science</div>
                <div class="tape-title">Planetary Remedies</div>
                <div class="tape-text">Simple yet effective rituals to balance negative planetary effects and invite cosmic blessings into your life.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Daily Ritual</div>
                <div class="tape-title">Morning Spiritual Routine</div>
                <div class="tape-text">Start each day with powerful Vedic practices to attract positivity, clarity, and purposeful energy.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Karma</div>
                <div class="tape-title">Understanding Your Karma</div>
                <div class="tape-text">Recognize repeating patterns in your life as karmic lessons and learn to consciously shift your path forward.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Vastu</div>
                <div class="tape-title">The Sacred Direction</div>
                <div class="tape-text">North-east is the zone of wisdom in Vastu. Keep it clean, open, and light to invite knowledge and clarity.</div>
            </div>
            <!-- Duplicate for seamless loop -->
            <div class="tape-card">
                <div class="tape-tag">Mind & Soul</div>
                <div class="tape-title">Power of Positive Thoughts</div>
                <div class="tape-text">Your thoughts create your reality. Shifting your mental frequency attracts aligned circumstances and people.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Planetary Science</div>
                <div class="tape-title">Planetary Remedies</div>
                <div class="tape-text">Simple yet effective rituals to balance negative planetary effects and invite cosmic blessings into your life.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Daily Ritual</div>
                <div class="tape-title">Morning Spiritual Routine</div>
                <div class="tape-text">Start each day with powerful Vedic practices to attract positivity, clarity, and purposeful energy.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Karma</div>
                <div class="tape-title">Understanding Your Karma</div>
                <div class="tape-text">Recognize repeating patterns in your life as karmic lessons and learn to consciously shift your path forward.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Vastu</div>
                <div class="tape-title">The Sacred Direction</div>
                <div class="tape-text">North-east is the zone of wisdom in Vastu. Keep it clean, open, and light to invite knowledge and clarity.</div>
            </div>
        </div>
    </div>

    <!-- Tape Row 2 (reverse) -->
    <div style="overflow:hidden;">
        <div class="insight-tape insight-tape-reverse">
            <div class="tape-card">
                <div class="tape-tag">Numerology</div>
                <div class="tape-title">Your Life Path Number</div>
                <div class="tape-text">Every soul carries a vibrational number at birth. Discover yours and decode the blueprint of your destiny.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Meditation</div>
                <div class="tape-title">Mantra Meditation</div>
                <div class="tape-text">Sacred syllables carry frequencies that resonate with cosmic energies, calming the mind and awakening higher states.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Gemstones</div>
                <div class="tape-title">Healing Gemstones</div>
                <div class="tape-text">Each planet governs a specific gemstone. Wearing the right stone channels planetary energies to your benefit.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Palmistry</div>
                <div class="tape-title">Lines of Destiny</div>
                <div class="tape-text">Your palm holds a map of your potential. Learn to read the language encoded in your life, heart, and fate lines.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Fasting</div>
                <div class="tape-title">Ekadashi Fasting</div>
                <div class="tape-text">Fasting on Ekadashi purifies the mind and body, creating a clear channel for spiritual insight and grace.</div>
            </div>
            <!-- Duplicate -->
            <div class="tape-card">
                <div class="tape-tag">Numerology</div>
                <div class="tape-title">Your Life Path Number</div>
                <div class="tape-text">Every soul carries a vibrational number at birth. Discover yours and decode the blueprint of your destiny.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Meditation</div>
                <div class="tape-title">Mantra Meditation</div>
                <div class="tape-text">Sacred syllables carry frequencies that resonate with cosmic energies, calming the mind and awakening higher states.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Gemstones</div>
                <div class="tape-title">Healing Gemstones</div>
                <div class="tape-text">Each planet governs a specific gemstone. Wearing the right stone channels planetary energies to your benefit.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Palmistry</div>
                <div class="tape-title">Lines of Destiny</div>
                <div class="tape-text">Your palm holds a map of your potential. Learn to read the language encoded in your life, heart, and fate lines.</div>
            </div>
            <div class="tape-card">
                <div class="tape-tag">Fasting</div>
                <div class="tape-title">Ekadashi Fasting</div>
                <div class="tape-text">Fasting on Ekadashi purifies the mind and body, creating a clear channel for spiritual insight and grace.</div>
            </div>
        </div>
    </div>
</section>

<!-- ═══════════════════════ CTA ═══════════════════════ -->
<section class="cta-section">
    <div class="cta-bg-glow"></div>
    <div class="container">
        <div class="reveal" style="position:relative; z-index:1;">
            <span class="section-label">Begin Your Journey</span>
            <h2 class="cta-title">Learn Vedic Wisdom<br>from <em>Dr. Pradeep</em></h2>
            <p class="cta-sub">
                Receive personal guidance and transform your life with ancient knowledge unified with modern healing science.
            </p>
            <a href="book-session.php" class="cta-btn">Book a Consultation</a>
        </div>
    </div>
</section>

<!-- ═══════════════════════ FOOTER ═══════════════════════ -->
<footer>
    <div class="container">
        <div class="footer-grid">
            <div>
                <div class="footer-brand">ASTRO <span>PRADEEP</span></div>
                <p class="footer-about">A legacy of 25+ years, serving over one million souls globally. We don't merely predict the future — we help you consciously create it.</p>
                <div class="footer-socials">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            <div>
                <div class="footer-heading">Quick Links</div>
                <ul class="footer-links">
                    <li><a href="#">About Astro</a></li>
                    <li><a href="#">Consultation</a></li>
                    <li><a href="#">Vedic Blog</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <div class="footer-heading">Our Services</div>
                <ul class="footer-links">
                    <li><a href="#">Janam Kundli</a></li>
                    <li><a href="#">Vastu Audit</a></li>
                    <li><a href="#">Hypnotherapy</a></li>
                    <li><a href="#">Gemstone Analysis</a></li>
                </ul>
            </div>
            <div>
                <div class="footer-heading">Newsletter</div>
                <p style="font-size:0.88rem; color:rgba(245,237,216,0.4); margin-bottom:16px; line-height:1.7;">Subscribe for weekly cosmic insights and Vedic guidance.</p>
                <div class="footer-newsletter">
                    <input type="text" placeholder="Your email address">
                    <button>Subscribe</button>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2026 Astro Pradeep Kumar &nbsp;|&nbsp; Blessings School of Astro
        </div>
    </div>
</footer>

<!-- WhatsApp -->
<a href="https://wa.me/919096161750" class="wa-float" target="_blank">
    <i class="fab fa-whatsapp fa-lg"></i> Chat Now
</a>

<script>
// ── Stars ──
const canvas = document.getElementById('star-canvas');
const ctx = canvas.getContext('2d');
let stars = [];

function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

function createStars() {
    stars = [];
    for (let i = 0; i < 220; i++) {
        stars.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            r: Math.random() * 1.2 + 0.2,
            alpha: Math.random(),
            speed: Math.random() * 0.4 + 0.1,
            twinkleSpeed: Math.random() * 0.02 + 0.005
        });
    }
}

function drawStars() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    stars.forEach(s => {
        s.alpha += Math.sin(Date.now() * s.twinkleSpeed) * 0.008;
        s.alpha = Math.max(0.05, Math.min(0.9, s.alpha));
        ctx.beginPath();
        ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
        ctx.fillStyle = `rgba(201,168,76,${s.alpha})`;
        ctx.fill();
    });
    requestAnimationFrame(drawStars);
}

resizeCanvas();
createStars();
drawStars();
window.addEventListener('resize', () => { resizeCanvas(); createStars(); });

// ── Cursor ──
const cursor = document.getElementById('cursor');
const cursorRing = document.getElementById('cursorRing');
let mx = 0, my = 0;

document.addEventListener('mousemove', e => {
    mx = e.clientX; my = e.clientY;
    cursor.style.transform = `translate(${mx - 6}px, ${my - 6}px)`;
    cursorRing.style.transform = `translate(${mx - 18}px, ${my - 18}px)`;
});

document.querySelectorAll('a, button').forEach(el => {
    el.addEventListener('mouseenter', () => cursor.style.transform += ' scale(2)');
    el.addEventListener('mouseleave', () => {});
});

// ── Navbar scroll ──
window.addEventListener('scroll', () => {
    document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 60);
});

// ── Scroll Reveal ──
const revealEls = document.querySelectorAll('.reveal');
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            e.target.classList.add('visible');
            revealObserver.unobserve(e.target);
        }
    });
}, { threshold: 0.12 });
revealEls.forEach(el => revealObserver.observe(el));

// ── Floating Particles ──
function spawnParticle() {
    const p = document.createElement('div');
    p.className = 'particle';
    p.style.left = Math.random() * 100 + 'vw';
    p.style.width = p.style.height = (Math.random() * 3 + 1) + 'px';
    const dur = Math.random() * 12 + 8;
    p.style.animationDuration = dur + 's';
    p.style.animationDelay = Math.random() * 5 + 's';
    document.body.appendChild(p);
    setTimeout(() => p.remove(), (dur + 5) * 1000);
}
setInterval(spawnParticle, 1200);

// ── Counter Animation ──
function animateCount(el, target) {
    let start = 0;
    const dur = 1800;
    const step = (timestamp) => {
        if (!start) start = timestamp;
        const progress = Math.min((timestamp - start) / dur, 1);
        const val = Math.floor(progress * target);
        el.textContent = val.toLocaleString() + (el.dataset.suffix || '');
        if (progress < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
}
</script>
</body>
</html>