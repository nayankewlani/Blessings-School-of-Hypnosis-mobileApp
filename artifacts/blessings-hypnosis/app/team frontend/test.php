<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astro Pradeep Kumar | Premium Astrology</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --accent-gold: #e3b04b;
            --text-white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at top right, #2e0249, #190019, #000000);
            background-attachment: fixed;
            color: var(--text-white);
            overflow-x: hidden;
        }

        /* HD Glass Utility Class */
        .glass {
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }

        /* Navigation */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 8%;
            position: fixed;
            width: 100%;
            z-index: 100;
            background: rgba(0,0,0,0.2);
            backdrop-filter: blur(10px);
        }
        .logo { font-family: 'Cinzel', serif; font-size: 1.5rem; color: var(--accent-gold); letter-spacing: 2px; }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 10%;
        }
        .hero h1 { font-family: 'Cinzel', serif; font-size: clamp(2.5rem, 6vw, 4.5rem); margin-bottom: 20px; }
        .hero span { color: var(--accent-gold); }

        /* 8-Section Grid Wrapper */
        .section-container { padding: 80px 8%; }
        .section-title { font-family: 'Cinzel', serif; text-align: center; font-size: 2.5rem; margin-bottom: 50px; color: var(--accent-gold); }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
        }

        .service-card {
            padding: 40px 30px;
            text-align: center;
            transition: 0.4s ease;
        }
        .service-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--accent-gold);
        }
        .service-card h3 { margin-bottom: 15px; color: var(--accent-gold); }

        /* Contact Form Glass */
        .contact-form {
            max-width: 800px;
            margin: 0 auto;
            padding: 50px;
        }
        input, textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            color: white;
            outline: none;
        }
        .btn {
            background: var(--accent-gold);
            color: #000;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn:hover { background: #fff; transform: scale(1.05); }

    </style>
</head>
<body>

<nav>
    <div class="logo">ASTRO PRADEEP</div>
    <div class="menu">Home | Services | Courses | Contact</div>
</nav>

<section class="hero">
    <h1>Align Your <span>Destiny</span> <br> With The Stars</h1>
    <p>Expert Astro-Vastu, Akashic Records & Soul Healing</p>
    <br>
    <button class="btn">Get Free Consultation</button>
</section>

<section class="section-container">
    <h2 class="section-title">Divine Services</h2>
    <div class="services-grid">
        <div class="service-card glass">
            <h3>Astro Vastu</h3>
            <p>Harmonize your structural energy with your planetary alignment.</p>
        </div>
        <div class="service-card glass">
            <h3>Akashic Records</h3>
            <p>Access your soul's blueprint and clear karmic blockages.</p>
        </div>
        <div class="service-card glass">
            <h3>Kundali Reading</h3>
            <p>Precise Vedic analysis for marriage, career, and personal growth.</p>
        </div>
    </div>
</section>

<section class="section-container">
    <h2 class="section-title">Book Your Slot</h2>
    <div class="contact-form glass">
        <form>
            <input type="text" placeholder="Full Name">
            <input type="email" placeholder="Email Address">
            <textarea rows="4" placeholder="Share your birth details..."></textarea>
            <button type="submit" class="btn">Submit Inquiry</button>
        </form>
    </div>
</section>

</body>
</html>