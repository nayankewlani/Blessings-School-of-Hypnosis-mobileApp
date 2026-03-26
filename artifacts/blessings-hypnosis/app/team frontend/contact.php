<?php
$conn = new mysqli("localhost","root","","astropradeepkumar");

if(isset($_POST['submit'])){

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$birth_time = $_POST['birth_time'];
$birth_place = $_POST['birth_place'];
$message = $_POST['message'];

$sql = "INSERT INTO contact_queries
(name,mobile,email,dob,birth_time,birth_place,message)
VALUES
('$name','$mobile','$email','$dob','$birth_time','$birth_place','$message')";

$conn->query($sql);

if($conn->query($sql) === TRUE){
    echo "<script>
    Swal.fire({
      title: 'Success!',
      text: 'Your query has been submitted successfully',
      icon: 'success'
    }).then(() => {
      window.location.href = 'contact.php';
    });
    </script>";
} else {
    echo "<script>
    Swal.fire({
      title: 'Error!',
      text: 'Something went wrong',
      icon: 'error'
    });
    </script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Astro Pradeep</title>

    <!-- Fonts & CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cinzel:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
    /* ===== CONTACT PAGE ENHANCEMENTS ===== */

    /* Animated star particles in hero */
    .hero-unified {
        position: relative;
        overflow: hidden;
    }

    .hero-unified::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image:
            radial-gradient(1.5px 1.5px at 10% 20%, rgba(255,215,0,0.7) 0%, transparent 100%),
            radial-gradient(1px 1px at 30% 70%, rgba(255,215,0,0.5) 0%, transparent 100%),
            radial-gradient(2px 2px at 55% 15%, rgba(255,215,0,0.6) 0%, transparent 100%),
            radial-gradient(1px 1px at 75% 55%, rgba(255,215,0,0.4) 0%, transparent 100%),
            radial-gradient(1.5px 1.5px at 90% 30%, rgba(255,215,0,0.7) 0%, transparent 100%),
            radial-gradient(1px 1px at 20% 85%, rgba(255,215,0,0.5) 0%, transparent 100%),
            radial-gradient(2px 2px at 65% 80%, rgba(255,215,0,0.4) 0%, transparent 100%),
            radial-gradient(1px 1px at 45% 45%, rgba(255,215,0,0.6) 0%, transparent 100%);
        animation: twinkle 4s ease-in-out infinite alternate;
        pointer-events: none;
    }

    @keyframes twinkle {
        0%   { opacity: 0.4; }
        100% { opacity: 1; }
    }

    /* Floating zodiac symbols in hero */
    .hero-unified .zodiac-bg {
        position: absolute;
        inset: 0;
        pointer-events: none;
        overflow: hidden;
    }

    .zodiac-bg span {
        position: absolute;
        font-size: 2rem;
        opacity: 0.07;
        animation: floatZodiac 8s ease-in-out infinite;
        color: #d4af37;
    }

    .zodiac-bg span:nth-child(1)  { top: 10%; left:  5%; animation-delay: 0s;   font-size: 2.5rem; }
    .zodiac-bg span:nth-child(2)  { top: 60%; left: 12%; animation-delay: 1s;   }
    .zodiac-bg span:nth-child(3)  { top: 20%; left: 85%; animation-delay: 2s;   font-size: 1.8rem; }
    .zodiac-bg span:nth-child(4)  { top: 75%; left: 80%; animation-delay: 0.5s; }
    .zodiac-bg span:nth-child(5)  { top: 40%; left: 92%; animation-delay: 3s;   font-size: 2.2rem; }
    .zodiac-bg span:nth-child(6)  { top: 85%; left: 40%; animation-delay: 1.5s; }

    @keyframes floatZodiac {
        0%, 100% { transform: translateY(0px) rotate(0deg); }
        50%       { transform: translateY(-18px) rotate(8deg); }
    }

    /* ===== FORM CARD ===== */
    .form-card {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.10);
        padding: 2.5rem;
        border-top: 4px solid #d4af37;
        transition: box-shadow 0.3s ease;
    }

    .form-card:hover {
        box-shadow: 0 28px 70px rgba(0,0,0,0.14);
    }

    .form-card h3 {
        font-weight: 700;
        color: #1a1a2e;
        position: relative;
        padding-bottom: 14px;
        margin-bottom: 1.8rem;
    }

    .form-card h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 56px;
        height: 3px;
        background: linear-gradient(90deg, #d4af37, #f5d77e);
        border-radius: 4px;
    }

    /* Form controls — enhanced */
    .form-control {
        border: 1.5px solid #e8e0cc;
        border-radius: 10px;
        padding: 10px 14px;
        font-family: 'Poppins', sans-serif;
        font-size: 0.9rem;
        transition: border-color 0.25s, box-shadow 0.25s;
        background: #fefdf8;
    }

    .form-control:focus {
        border-color: #d4af37;
        box-shadow: 0 0 0 3px rgba(212,175,55,0.18);
        background: #fff;
        outline: none;
    }

    .form-label {
        font-weight: 500;
        font-size: 0.85rem;
        color: #555;
        margin-bottom: 5px;
    }

    /* Input icon wrapper */
    .input-icon-wrap {
        position: relative;
    }

    .input-icon-wrap .field-icon {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #d4af37;
        font-size: 0.85rem;
        pointer-events: none;
    }

    .input-icon-wrap .form-control {
        padding-right: 36px;
    }

    /* Submit button */
    

    .btn-premium:hover::before { opacity: 1; }
    .btn-premium:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(212,175,55,0.40);
        color: #fff;
    }

    .btn-premium span { position: relative; z-index: 1; }

    /* ===== CONTACT INFO CARD ===== */
    .astro-contact-card {
        background: linear-gradient(145deg, #fffbea, #fdf0b0, #f7d97c);
        border: 1px solid rgba(212,175,55,0.35);
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(212,175,55,0.15);
        border-top: 4px solid #d4af37;
        padding: 2.5rem;
    }

    .astro-contact-card h3 {
        font-weight: 700;
        color: #1a1a2e;
        position: relative;
        padding-bottom: 14px;
        margin-bottom: 1.8rem;
    }

    .astro-contact-card h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 56px;
        height: 3px;
        background: linear-gradient(90deg, #c49a16, #d4af37);
        border-radius: 4px;
    }

    /* Info rows */
    .contact-info-row {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        margin-bottom: 18px;
        padding: 14px 16px;
        background: rgba(255,255,255,0.6);
        border-radius: 12px;
        border: 1px solid rgba(212,175,55,0.2);
        transition: background 0.25s, transform 0.25s;
    }

    .contact-info-row:hover {
        background: rgba(255,255,255,0.9);
        transform: translateX(4px);
    }

    .contact-info-icon {
        width: 40px;
        height: 40px;
        min-width: 40px;
        border-radius: 50%;
        background: linear-gradient(135deg, #d4af37, #b8941e);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 0.9rem;
        margin-top: 2px;
    }

    .contact-info-text {
        font-size: 0.9rem;
        line-height: 1.5;
        color: #3a3a3a;
    }

    .contact-info-text strong {
        display: block;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: #8a6d00;
        margin-bottom: 2px;
    }

    /* WhatsApp button */
    .btn-whatsapp {
        background: linear-gradient(135deg, #25D366, #1aad50);
        color: #fff;
        padding: 13px 30px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.95rem;
        transition: all 0.3s;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 6px 20px rgba(37,211,102,0.35);
        text-decoration: none;
    }

    .btn-whatsapp:hover {
        background: linear-gradient(135deg, #1aad50, #158c3f);
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 10px 28px rgba(37,211,102,0.45);
    }

    /* Divider */
    .gold-divider {
        border: none;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(212,175,55,0.5), transparent);
        margin: 1.5rem 0;
    }

    /* ===== MAP SECTION ===== */
    .map-section {
        background: linear-gradient(180deg, #f9f6ee 0%, #fff 100%);
    }

    .map-section h3 {
        position: relative;
        display: inline-block;
        padding-bottom: 14px;
    }

    .map-section h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 56px;
        height: 3px;
        background: linear-gradient(90deg, #d4af37, #f5d77e);
        border-radius: 4px;
    }

    .map-wrapper {
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 16px 48px rgba(0,0,0,0.10);
        border: 3px solid rgba(212,175,55,0.35);
    }

    /* ===== SECTION BADGE ===== */
    .section-badge {
        display: inline-block;
        background: linear-gradient(135deg, rgba(212,175,55,0.15), rgba(212,175,55,0.08));
        border: 1px solid rgba(212,175,55,0.4);
        color: #8a6d00;
        font-size: 0.75rem;
        font-weight: 600;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 5px 14px;
        border-radius: 50px;
        margin-bottom: 1rem;
    }

    /* Fade-in animation on scroll */
    .fade-up {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease, transform 0.6s ease;
    }

    .fade-up.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .form-card, .astro-contact-card { padding: 1.6rem; }
    }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="website-logo/1.png" alt="Astro Pradeep Kumar" width="150px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])=='index.php') echo 'active'; ?>" href="index.php">Home</a>
                </li>
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
                <li class="nav-item"><a class="nav-link" href="vedic-wisdom.php">Vedic Wisdom</a></li>
                <li class="nav-item"><a class="nav-link active" href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>


<!-- Hero Section -->
<section class="hero-unified text-center py-100">
    <!-- Floating zodiac symbols -->
    <div class="zodiac-bg">
        <span>♈</span><span>♌</span><span>♎</span>
        <span>♓</span><span>♒</span><span>♍</span>
    </div>
    <div class="container" style="position:relative; z-index:2;">
        <div class="section-badge">✦ Reach Out to Us ✦</div>
        <h1 class="hero-title">Contact <span>Us</span></h1>
        <p class="lead opacity-75">We are here to guide you on your spiritual journey</p>
    </div>
</section>


<!-- Contact Section -->
<section class="py-100 bg-white">
    <div class="container">
        <div class="row g-5 align-items-start">

            <!-- Contact Form -->
            <div class="col-lg-7 fade-up">
                <div class="form-card">
                    <div class="section-badge mb-3">✦ Ask Your Question ✦</div>
                    <h3 class="cinzel">Send Your Query</h3>

                    <form action="contact.php" method="POST">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Full Name</label>
                                <div class="input-icon-wrap">
                                    <input type="text" name="name" class="form-control" placeholder="Your full name" required>
                                    <span class="field-icon"><i class="fas fa-user"></i></span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mobile Number</label>
                                <div class="input-icon-wrap">
                                    <input type="text" name="mobile" class="form-control" placeholder="+91 XXXXXXXXXX" required>
                                    <span class="field-icon"><i class="fas fa-phone"></i></span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email</label>
                                <div class="input-icon-wrap">
                                    <input type="email" name="email" class="form-control" placeholder="your@email.com">
                                    <span class="field-icon"><i class="fas fa-envelope"></i></span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth</label>
                                <div class="input-icon-wrap">
                                    <input type="date" name="dob" class="form-control">
                                    <span class="field-icon" style="top:38%;"><i class="fas fa-calendar-alt"></i></span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Birth Time</label>
                                <div class="input-icon-wrap">
                                    <input type="time" name="birth_time" class="form-control">
                                    <span class="field-icon" style="top:38%;"><i class="fas fa-clock"></i></span>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Birth Place</label>
                                <div class="input-icon-wrap">
                                    <input type="text" name="birth_place" class="form-control" placeholder="City, State">
                                    <span class="field-icon"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                            </div>

                        </div>

                        <div class="mb-4">
                            <label class="form-label">Your Question</label>
                            <textarea name="message" class="form-control" rows="4" placeholder="Describe what guidance you seek..." required></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-premium">
                            <span><i class="fas fa-paper-plane me-2"></i>Send Query</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-5 fade-up" style="transition-delay:0.15s;">
                <div class="astro-contact-card">
                    <div class="section-badge mb-3">✦ Get In Touch ✦</div>
                    <h3 class="cinzel">Contact Information</h3>

                    <div class="contact-info-row">
                        <div class="contact-info-icon"><i class="fas fa-phone-alt"></i></div>
                        <div class="contact-info-text">
                            <strong>Phone</strong>
                            +91 XXXXXXXXXX
                        </div>
                    </div>

                    <div class="contact-info-row">
                        <div class="contact-info-icon"><i class="fas fa-envelope"></i></div>
                        <div class="contact-info-text">
                            <strong>Email</strong>
                            careastropradeepkumar@gmail.com
                        </div>
                    </div>

                    <div class="contact-info-row">
                        <div class="contact-info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="contact-info-text">
                            <strong>Address</strong>
                            Astro Pradeep Kumar<br>
                            Vedic Astrology &amp; Spiritual Guidance<br>
                            India
                        </div>
                    </div>

                    <hr class="gold-divider">

                    <h5 class="cinzel mb-3" style="color:#1a1a2e; font-size:1rem;">Book Direct on WhatsApp</h5>
                    <p style="font-size:0.88rem; color:#555; margin-bottom:14px;">
                        Get an instant response from Astro Pradeep Kumar — available 7 days a week.
                    </p>

                    <a href="https://wa.me/91XXXXXXXXXX" class="btn-whatsapp">
                        <i class="fab fa-whatsapp fa-lg"></i> Chat on WhatsApp
                    </a>

                    <!-- Trust badges -->
                    <div class="row g-2 mt-4">
                        <div class="col-4 text-center">
                            <div style="background:rgba(255,255,255,0.7); border-radius:10px; padding:10px 6px; border:1px solid rgba(212,175,55,0.2);">
                                <div style="font-size:1.3rem; color:#d4af37;">⭐</div>
                                <div style="font-size:0.7rem; font-weight:600; color:#555; margin-top:4px;">25+ Years</div>
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            <div style="background:rgba(255,255,255,0.7); border-radius:10px; padding:10px 6px; border:1px solid rgba(212,175,55,0.2);">
                                <div style="font-size:1.3rem; color:#d4af37;">🌏</div>
                                <div style="font-size:0.7rem; font-weight:600; color:#555; margin-top:4px;">1M+ Clients</div>
                            </div>
                        </div>
                        <div class="col-4 text-center">
                            <div style="background:rgba(255,255,255,0.7); border-radius:10px; padding:10px 6px; border:1px solid rgba(212,175,55,0.2);">
                                <div style="font-size:1.3rem; color:#d4af37;">🕉️</div>
                                <div style="font-size:0.7rem; font-weight:600; color:#555; margin-top:4px;">Vedic Expert</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


<!-- Map Section -->
<section class="map-section py-5">
    <div class="container text-center">
        <h3 class="cinzel mb-2">Our Location</h3>
        <p class="text-muted mb-4" style="font-size:0.9rem;">Visit us or connect remotely from anywhere in the world</p>
        <div class="map-wrapper">
          <iframe
  src="https://maps.google.com/maps?q=India&t=&z=5&ie=UTF8&iwloc=&output=embed"
  width="100%"
  height="400"
  style="border:0; display:block;"
  allowfullscreen=""
  loading="lazy">
</iframe>
        </div>
    </div>
</section>


<!-- Footer -->
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

<!-- WhatsApp Float -->
<a href="https://wa.me/919096161750" class="whatsapp-float" target="_blank"
   style="position:fixed; bottom:20px; right:20px; background:#25d366; color:#FFF; border-radius:50px;
          text-align:center; padding:10px 20px; font-weight:bold; text-decoration:none; z-index:100;
          box-shadow:2px 2px 10px rgba(0,0,0,0.2); display:flex; align-items:center; gap:8px;">
    <i class="fab fa-whatsapp fa-2x"></i> <span>Chat Now</span>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Scroll fade-in observer
const fadeEls = document.querySelectorAll('.fade-up');
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.15 });

fadeEls.forEach(el => observer.observe(el));
</script>
</body>
</html>