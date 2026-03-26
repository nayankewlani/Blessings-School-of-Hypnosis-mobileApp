<?php
date_default_timezone_set('Asia/Kolkata');

$currentMonth = date("F");
$currentYear = date("Y");

// Sample Festival Data (India)
$festivals = [

    "January" => [
        [
            "date" => "1 Jan",
            "name" => "New Year's Day",
            "image" => "assets/images/festivals/new-year.jpg",
            "desc" => "Celebration of the beginning of a new year with joy and fresh resolutions."
        ],
        [
            "date" => "14 Jan",
            "name" => "Makar Sankranti",
            "image" => "assets/images/festivals/makar-sankranti.jpg",
            "desc" => "Harvest festival marking the sun’s transition into Capricorn."
        ],
        [
            "date" => "23 Jan",
            "name" => "Vasant Panchami",
            "image" => "assets/images/festivals/vasant-panchami.jpg",
            "desc" => "Festival dedicated to Goddess Saraswati, symbolizing knowledge and wisdom."
        ],
        [
            "date" => "26 Jan",
            "name" => "Republic Day",
            "image" => "assets/images/festivals/republic-day.jpg",
            "desc" => "Celebration of India's Constitution and national pride."
        ]
    ],

    "February" => [
        [
            "date" => "15 Feb",
            "name" => "Maha Shivratri",
            "image" => "assets/images/festivals/maha-shivratri.jpg",
            "desc" => "Sacred night dedicated to Lord Shiva for spiritual growth and devotion."
        ],
        [
            "date" => "19 Feb",
            "name" => "Shivaji Maharaj Jayanti",
            "image" => "assets/images/festivals/shivaji-jayanti.jpg",
            "desc" => "Birth anniversary of Chhatrapati Shivaji Maharaj."
        ]
    ],

    "March" => [
    [
        "date" => "3 Mar",
        "name" => "Holika Dahan",
        "image" => "assets/images/festivals/holika-dahan.avif",
        "desc" => "Symbolizes victory of good over evil with sacred bonfire rituals."
    ],
    [
        "date" => "4 Mar",
        "name" => "Holi",
        "image" => "assets/images/festivals/holi.avif",
        "desc" => "Festival of colors celebrating joy, love, and togetherness."
    ],
    [
        "date" => "19 Mar",
        "name" => "Gudi Padwa / Ugadi",
        "image" => "assets/images/festivals/gudi-padwa1.avif",
        "desc" => "Hindu New Year celebrated in Maharashtra and South India."
    ],
    [
        "date" => "20 Mar",
        "name" => "Cheti Chand",
        "image" => "assets/images/festivals/cheti-chand.jpg",
        "desc" => "Sindhi New Year dedicated to Jhulelal."
    ],
    [
        "date" => "21 Mar",
        "name" => "Gangaur",
        "image" => "assets/images/festivals/gangaur.jpg",
        "desc" => "Festival dedicated to Goddess Gauri for marital happiness."
    ],
    [
        "date" => "22 Mar",
        "name" => "Chaitra Navratri Begins",
        "image" => "assets/images/festivals/navratri.jpg",
        "desc" => "Nine-day festival dedicated to Goddess Durga."
    ],
    [
        "date" => "26 Mar",
        "name" => "Ram Navami",
        "image" => "assets/images/festivals/ram-navami.jpg",
        "desc" => "Celebration of the birth of Lord Ram."
    ]
],

    "April" => [
        [
            "date" => "2 Apr",
            "name" => "Hanuman Jayanti",
            "image" => "assets/images/festivals/hanuman-jayanti.jpg",
            "desc" => "Birth of Lord Hanuman, symbol of strength and devotion."
        ],
        [
            "date" => "14 Apr",
            "name" => "Baisakhi",
            "image" => "assets/images/festivals/baisakhi.jpg",
            "desc" => "Harvest festival and Sikh New Year celebration."
        ],
        [
            "date" => "19 Apr",
            "name" => "Akshaya Tritiya",
            "image" => "assets/images/festivals/akshaya-tritiya.jpg",
            "desc" => "Auspicious day for wealth, prosperity, and new beginnings."
        ]
    ],

    "May" => [
        [
            "date" => "1 May",
            "name" => "Labour Day / Buddha Purnima",
            "image" => "assets/images/festivals/buddha-purnima.jpg",
            "desc" => "Day honoring workers and birth of Lord Buddha."
        ],
        [
            "date" => "27 May",
            "name" => "Eid-ul-Adha",
            "image" => "assets/images/festivals/eid.jpg",
            "desc" => "Festival of sacrifice and devotion in Islam."
        ]
    ],

    "June" => [
        [
            "date" => "26 Jun",
            "name" => "Muharram",
            "image" => "assets/images/festivals/muharram.jpg",
            "desc" => "Islamic remembrance day of sacrifice and mourning."
        ],
        [
            "date" => "29 Jun",
            "name" => "Vat Purnima",
            "image" => "assets/images/festivals/vat-purnima.jpg",
            "desc" => "Festival observed by married women for husband's long life."
        ]
    ],

    "July" => [
        [
            "date" => "July",
            "name" => "Guru Purnima",
            "image" => "assets/images/festivals/guru-purnima.jpg",
            "desc" => "Day to honor teachers and spiritual gurus."
        ]
    ],

    "August" => [
        [
            "date" => "15 Aug",
            "name" => "Independence Day",
            "image" => "assets/images/festivals/independence-day.jpg",
            "desc" => "Celebration of India's independence."
        ],
        [
            "date" => "Aug",
            "name" => "Raksha Bandhan",
            "image" => "assets/images/festivals/raksha-bandhan.jpg",
            "desc" => "Celebration of the bond between brothers and sisters."
        ],
        [
            "date" => "Aug",
            "name" => "Janmashtami",
            "image" => "assets/images/festivals/janmashtami.jpg",
            "desc" => "Birth of Lord Krishna celebrated with devotion."
        ]
    ],

    "September" => [
        [
            "date" => "Sept",
            "name" => "Ganesh Chaturthi",
            "image" => "assets/images/festivals/ganesh-chaturthi.jpg",
            "desc" => "Festival celebrating the birth of Lord Ganesha."
        ]
    ],

    "October" => [
        [
            "date" => "2 Oct",
            "name" => "Gandhi Jayanti",
            "image" => "assets/images/festivals/gandhi-jayanti.jpg",
            "desc" => "Birth anniversary of Mahatma Gandhi."
        ],
        [
            "date" => "Mid Oct",
            "name" => "Navratri",
            "image" => "assets/images/festivals/navratri.jpg",
            "desc" => "Nine nights dedicated to Goddess Durga."
        ],
        [
            "date" => "20 Oct",
            "name" => "Dussehra",
            "image" => "assets/images/festivals/dussehra.jpg",
            "desc" => "Victory of good over evil (Lord Ram vs Ravana)."
        ]
    ],

    "November" => [
        [
            "date" => "8 Nov",
            "name" => "Diwali",
            "image" => "assets/images/festivals/diwali.jpg",
            "desc" => "Festival of lights symbolizing positivity and prosperity."
        ],
        [
            "date" => "Nov",
            "name" => "Bhai Dooj",
            "image" => "assets/images/festivals/bhai-dooj.jpg",
            "desc" => "Celebration of sibling bond after Diwali."
        ]
    ],

    "December" => [
        [
            "date" => "25 Dec",
            "name" => "Christmas",
            "image" => "assets/images/festivals/christmas.jpg",
            "desc" => "Celebration of the birth of Jesus Christ."
        ]
    ]
];

// Current month festivals
$monthFestivals = $festivals[$currentMonth] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dr. Pradeep Kumar | Vedic Astrology & Mind Healing</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cinzel:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
    .festival-card {
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    transition: 0.4s ease;
    box-shadow: 0 10px 25px rgb(0 0 0 / 9%);
    border:1px solid #00000037;
}

/* image */
.festival-img img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

/* content */
.festival-content {
    padding: 15px;
}

.festival-date {
    font-size: 12px;
    font-weight: 600;
    color: #f26304;
}

.festival-name {
    font-weight: 700;
    margin: 5px 0;
    color: #2b1c00;
}

.festival-desc {
    font-size: 13px;
    color: #555;
}

/* hover effect */
.festival-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

/* no festival text */
.no-festival {
    font-size: 16px;
    color: #777;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand" href="index.php">
            <!-- <h5 class="mb-0">ASTRO <span style="color:#ffffff;">PRADEEP</span></h5> -->
             <img src="website-logo/1.png" alt="Astro Pradeep Kumar" srcset="" width="150px">
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

            </ul>
        </div>
    </div>
</nav>
<!-- Panchang Section -->
<section class="mt-4">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-5">
            <h2 class="cinzel festival-heading">
                Festivals - <?php echo $currentMonth . " " . $currentYear; ?>
            </h2>
            <p class="text-muted">
                Important Festivals & Celebrations This Month
            </p>
        </div>

        <div class="row g-4">

            <?php if(!empty($monthFestivals)) { ?>
                <?php foreach($monthFestivals as $festival) { ?>
                    
                    <div class="col-md-4 col-sm-6">
                        <div class="festival-card">

                            <!-- Image -->
                            <div class="festival-img">
                                <img src="<?php echo $festival['image']; ?>" 
                                     alt="<?php echo $festival['name']; ?>">
                            </div>

                            <!-- Content -->
                            <div class="festival-content">
                                <span class="festival-date">
                                    <?php echo $festival['date']; ?>
                                </span>

                                <h5 class="festival-name">
                                    <?php echo $festival['name']; ?>
                                </h5>

                                <p class="festival-desc">
                                    <?php echo $festival['desc']; ?>
                                </p>
                            </div>

                        </div>
                    </div>

                <?php } ?>
            <?php } else { ?>

                <div class="col-12 text-center">
                    <p class="no-festival">No major festivals this month.</p>
                </div>

            <?php } ?>

        </div>

        <!-- Note -->
        <div class="text-center mt-4">
            <small class="text-muted">
                *Dates may vary slightly based on Panchang and location.
            </small>
        </div>

    </div>
</section>

     <footer class="footer">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4">
                <h2 class="cinzel text-white mb-4">ASTRO <span class="text-gold">PRADEEP</span></h2>
                <p class="opacity-75 mb-4">A legacy of 35+ years, serving over 1 million souls globally. We don't just predict the future; we help you create it.</p>
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
            <p class="mb-0 opacity-50">&copy; 2026 Dr. Pradeep Kumar | Blessings School of Hypnosis</p>
        </div>
    </div>
</footer>
<a href="https://wa.me/919096161750" class="whatsapp-float" target="_blank" style="position:fixed; bottom:20px; right:20px; background:#25d366; color:#FFF; border-radius:50px; text-align:center; padding: 10px 20px; font-weight:bold; text-decoration:none; z-index:100; box-shadow: 2px 2px 10px rgba(0,0,0,0.2); display: flex; align-items: center; gap: 8px;">
    <i class="fab fa-whatsapp fa-2x"></i> <span>Chat Now</span>
</a>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
