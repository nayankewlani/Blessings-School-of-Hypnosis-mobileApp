<?php

date_default_timezone_set('Asia/Kolkata');

/* =========================
   DATE
========================= */

$date = $_GET['date'] ?? date("Y-m-d");
$timestamp = strtotime($date);

$currentDate = date("d F Y", $timestamp);
$currentDay = date("l", $timestamp);

/* =========================
   API TRY
========================= */

$client_id = "adc077ed-38c7-431f-ba80-db70a14958a0";
$client_secret = "iGVKCOXb6ei6nL5gNiARE7NloVIbOhybdbRv0Ci2";

$tithi = $nakshatra = $yoga = $karan = null;

try {

    // TOKEN
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.prokerala.com/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query([
            'grant_type' => 'client_credentials',
            'client_id' => $client_id,
            'client_secret' => $client_secret
        ])
    ]);

    $response = curl_exec($curl);
    $data = json_decode($response, true);
    curl_close($curl);

    $access_token = $data['access_token'] ?? null;

    if($access_token){

        $datetime = $date . "T12:00:00+05:30";

        $url = "https://api.prokerala.com/v2/astrology/panchang?coordinates=21.1458,79.0882&datetime=" . urlencode($datetime);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer $access_token"
            ]
        ]);

        $response = curl_exec($curl);
        $panchang = json_decode($response, true);
        curl_close($curl);

        if(isset($panchang['data'])){
            $tithi = $panchang['data']['tithi']['name'] ?? null;
            $nakshatra = $panchang['data']['nakshatra']['name'] ?? null;
            $yoga = $panchang['data']['yoga']['name'] ?? null;
            $karan = $panchang['data']['karana']['name'] ?? null;
        }
    }

} catch(Exception $e){
    // ignore error
}

/* =========================
   FALLBACK (AUTO)
========================= */

if(empty($tithi) || $tithi == "Not Available"){

    $tithiList = ["Pratipada","Dwitiya","Tritiya","Chaturthi","Panchami","Shashthi","Saptami","Ashtami","Navami","Dashami","Ekadashi","Dwadashi","Trayodashi","Chaturdashi","Purnima","Amavasya"];

    $nakshatraList = ["Ashwini","Bharani","Krittika","Rohini","Mrigashira","Ardra","Punarvasu","Pushya","Ashlesha","Magha","Purva Phalguni","Uttara Phalguni","Hasta","Chitra","Swati","Vishakha","Anuradha","Jyeshtha","Moola","Purva Ashadha","Uttara Ashadha","Shravana","Dhanishta","Shatabhisha","Purva Bhadrapada","Uttara Bhadrapada","Revati"];

    $yogaList = ["Vishkumbha","Priti","Ayushman","Saubhagya","Shobhana","Atiganda","Sukarma","Dhriti","Shoola","Ganda","Vriddhi","Dhruva","Vyaghata","Harshana","Vajra","Siddhi","Vyatipata","Variyana","Parigha","Shiva","Siddha","Sadhya","Shubha","Shukla","Brahma","Indra","Vaidhriti"];

    $karanList = ["Bava","Balava","Kaulava","Taitila","Garaja","Vanija","Vishti"];

    $days = floor(($timestamp - strtotime("2024-01-01")) / 86400);

    $tithi = $tithiList[$days % 16];
    $nakshatra = $nakshatraList[$days % 27];
    $yoga = $yogaList[$days % 27];
    $karan = $karanList[$days % 7];
}
/* =========================
   SUN + RAHU
========================= */

$sunrise = date_sunrise($timestamp, SUNFUNCS_RET_STRING, 21.1458, 79.0882, 90, 5.5);
$sunset  = date_sunset($timestamp, SUNFUNCS_RET_STRING, 21.1458, 79.0882, 90, 5.5);

$rahuTimings = [
    "Sunday"=>"04:30 PM – 06:00 PM",
    "Monday"=>"07:30 AM – 09:00 AM",
    "Tuesday"=>"03:00 PM – 04:30 PM",
    "Wednesday"=>"12:00 PM – 01:30 PM",
    "Thursday"=>"01:30 PM – 03:00 PM",
    "Friday"=>"10:30 AM – 12:00 PM",
    "Saturday"=>"09:00 AM – 10:30 AM"
];

$rahuKaal = $rahuTimings[$currentDay];
$abhijit = "12:05 PM – 12:50 PM";

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
      
/* Filter */
.panchang-filter {
    background: rgba(255, 185, 0, 0.08);
    padding: 12px 20px;
    border-radius: 50px;
    display: inline-flex;
}

/* Date input */
.date-input {
    border-radius: 30px;
    padding: 8px 15px;
    border: 1px solid #D4AF37;
    min-width: 180px;
}

/* Fallback msg */
.fallback-msg {
    background: rgba(255, 193, 7, 0.15);
    color: #856404;
    padding: 10px 18px;
    border-radius: 8px;
    display: inline-block;
    margin-bottom: 15px;
    font-weight: 500;
}

/* Box */
@media(min-width:767px){
    .panchang-box {
    background: #fff;
    padding: 0px 200px 0px 200px;
    border-radius: 18px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.08);
    text-align: center;
    position: relative;
}

}
@media(max-width:767px){
    .panchang-box {
    background: #fff;
    padding: 20px;
    border-radius: 18px;
    box-shadow: 0 20px 50px rgba(0,0,0,0.08);
    text-align: center;
    position: relative;
}

}
/* subtle glow */
.panchang-box::before {
    content: "";
    position: absolute;
    top: -30px;
    left: -30px;
    width: 100px;
    height: 100px;
    background: radial-gradient(circle, rgba(255,185,0,0.2), transparent);
    z-index: 0;
}

/* Table */
.panchang-table {
    font-size: 16px;
    border-radius: 12px;
    overflow: hidden;
}

/* Header */
.panchang-table thead th {
    background: linear-gradient(135deg, #f26304, #e5a800);
    color: #fff;
    font-family: 'Cinzel', serif;
    font-size: 18px;
    padding: 14px;
}

/* Left column */
.panchang-table th {
    width: 40%;
    background: #fff7e0;
    font-weight: 600;
    font-family: 'Cinzel', serif;
    color: #3a2200;
}

/* Right column */
.panchang-table td {
    background: #fff;
    color: #444;
}

/* Row hover */
.panchang-table tr:hover td {
    background: #fff3d4;
    transition: 0.3s;
}

/* Special rows */
.danger-row td {
    color: #dc3545;
    font-weight: 600;
}

.success-row td {
    color: #28a745;
    font-weight: 600;
}

/* Image */
img.img1 {
    height: 85px;
    border: 2px solid #f16804;
    border-radius: 50%;
    padding: 5px;
    display: block;
    margin: 0 auto;

    box-shadow: 0 10px 25px rgba(241, 104, 4, 0.4);
}

/* Button */
.btn-kundli {
    border-radius: 30px;
    padding: 8px 22px;
}
.panchang-intro {
    text-align: center;
    margin-bottom: 20px;
}

.panchang-intro h5 {
    color: #b45309;
    font-family: 'Cinzel', serif;
}

.panchang-intro p {
    font-size: 14px;
    color: #555;
    max-width: 500px;
    margin: 0 auto;
}

.panchang-intro small {
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
    <!-- Top Image -->
    <img src="assets/images/ganpatiji.png" class="img1 mb-3 mt-2">
    <div class="panchang-intro">
    <h5 class="cinzel mb-2">Daily Panchang Insight</h5>
    <p>
        Panchang helps you understand the cosmic energies of the day. 
        By knowing Tithi, Nakshatra, Yoga and Karan, you can align your actions 
        with the right timing and make better life decisions.
    </p>
</div>
<form method="GET" class="text-center mb-4 mt-2">

    <label class="me-2 fw-semibold">Select Date:</label>

    <input type="date" name="date" 
           value="<?php echo $_GET['date'] ?? date('Y-m-d'); ?>"
           class="form-control d-inline-block w-auto">

    <button type="submit" class="btn btn-kundli ms-2">
        View Panchang
    </button>

</form>
<!-- Panchang Section -->
 <?php if($tithi == "Not Available"){ ?>
<p class="text-warning text-center">Showing general Panchang</p>
<?php } ?>
<div class="panchang-box">



    <table class="table table-bordered panchang-table mt-3">

        <thead>
            <tr>
                <th colspan="2" class="text-center">
                    🪔 Today's Panchang
                </th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th>Date</th>
                <td><?php echo $currentDate; ?> (<?php echo $currentDay; ?>)</td>
            </tr>

            <tr>
                <th>Tithi</th>
                <td><?php echo $tithi; ?></td>
            </tr>

            <tr>
                <th>Nakshatra</th>
                <td><?php echo $nakshatra; ?></td>
            </tr>

            <tr>
                <th>Yoga</th>
                <td><?php echo $yoga; ?></td>
            </tr>

            <tr>
                <th>Karan</th>
                <td><?php echo $karan; ?></td>
            </tr>

            <tr>
                <th>Sunrise</th>
                <td><?php echo $sunrise; ?></td>
            </tr>

            <tr>
                <th>Sunset</th>
                <td><?php echo $sunset; ?></td>
            </tr>

            <tr class="danger-row">
                <th>Rahu Kaal</th>
                <td><?php echo $rahuKaal; ?></td>
            </tr>

            <tr class="success-row">
                <th>Abhijit Muhurat</th>
                <td><?php echo $abhijit; ?></td>
            </tr>
        </tbody>

    </table>

</div>

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
