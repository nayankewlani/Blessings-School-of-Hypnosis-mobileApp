<?php
date_default_timezone_set('Asia/Kolkata');

$age="";
$birthNumber="";
$lifePath="";
$luckyNumber="";
$luckyDay="";
$luckyColor="";
$zodiac="";
$rulingPlanet="";
$luckyGem="";

if(isset($_POST['dob']) && $_POST['dob']!=""){

$dob = htmlspecialchars($_POST['dob']);

$birthDate = new DateTime($dob);
$today = new DateTime();

$age = $today->diff($birthDate)->y;

/* Birth Number */

$birthDay = date("d",strtotime($dob));
$birthSum = array_sum(str_split($birthDay));

while($birthSum > 9){
$birthSum = array_sum(str_split($birthSum));
}

$birthNumber = $birthSum;


/* Life Path Number */

$digits = str_replace("-","",$dob);
$sum = array_sum(str_split($digits));

while($sum > 9){
$sum = array_sum(str_split($sum));
}

$lifePath = $sum;


/* Zodiac Sign */

$month = date("m",strtotime($dob));
$day = date("d",strtotime($dob));

if(($month==3 && $day>=21)||($month==4 && $day<=19)) $zodiac="Aries";
elseif(($month==4 && $day>=20)||($month==5 && $day<=20)) $zodiac="Taurus";
elseif(($month==5 && $day>=21)||($month==6 && $day<=20)) $zodiac="Gemini";
elseif(($month==6 && $day>=21)||($month==7 && $day<=22)) $zodiac="Cancer";
elseif(($month==7 && $day>=23)||($month==8 && $day<=22)) $zodiac="Leo";
elseif(($month==8 && $day>=23)||($month==9 && $day<=22)) $zodiac="Virgo";
elseif(($month==9 && $day>=23)||($month==10 && $day<=22)) $zodiac="Libra";
elseif(($month==10 && $day>=23)||($month==11 && $day<=21)) $zodiac="Scorpio";
elseif(($month==11 && $day>=22)||($month==12 && $day<=21)) $zodiac="Sagittarius";
elseif(($month==12 && $day>=22)||($month==1 && $day<=19)) $zodiac="Capricorn";
elseif(($month==1 && $day>=20)||($month==2 && $day<=18)) $zodiac="Aquarius";
else $zodiac="Pisces";


/* Lucky Data */

$luckyData=[

1=>["number"=>"1,10,19,28","day"=>"Sunday","color"=>"Red"],
2=>["number"=>"2,11,20,29","day"=>"Monday","color"=>"White"],
3=>["number"=>"3,12,21,30","day"=>"Thursday","color"=>"Yellow"],
4=>["number"=>"4,13,22,31","day"=>"Saturday","color"=>"Blue"],
5=>["number"=>"5,14,23","day"=>"Wednesday","color"=>"Green"],
6=>["number"=>"6,15,24","day"=>"Friday","color"=>"Pink"],
7=>["number"=>"7,16,25","day"=>"Monday","color"=>"Grey"],
8=>["number"=>"8,17,26","day"=>"Saturday","color"=>"Black"],
9=>["number"=>"9,18,27","day"=>"Tuesday","color"=>"Orange"]

];

$luckyNumber = $luckyData[$lifePath]['number'];
$luckyDay = $luckyData[$lifePath]['day'];
$luckyColor = $luckyData[$lifePath]['color'];


/* Ruling Planet */

$planet=[

1=>"Sun",
2=>"Moon",
3=>"Jupiter",
4=>"Rahu",
5=>"Mercury",
6=>"Venus",
7=>"Ketu",
8=>"Saturn",
9=>"Mars"

];

$rulingPlanet = $planet[$lifePath];


/* Gemstone */

$gemstone=[

1=>"Ruby",
2=>"Pearl",
3=>"Yellow Sapphire",
4=>"Hessonite",
5=>"Emerald",
6=>"Diamond",
7=>"Cat's Eye",
8=>"Blue Sapphire",
9=>"Red Coral"

];

$luckyGem = $gemstone[$lifePath];

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Astrology Calculator | Astro Pradeep</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cinzel:wght@400;700;900&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="assets/css/style.css">
<style>

body{
font-family:'Poppins',sans-serif;
background:linear-gradient(135deg,#fff7e6,#fdecc8);
min-height:100vh;
}

/* Heading */

.cinzel{
font-family:'Cinzel',serif;
letter-spacing:1px;
color:#6b5205;
}

/* Calculator Card */

.calculator-box{
background:rgba(255,255,255,0.95);
padding:40px;
border-radius:15px;
box-shadow:0 15px 35px rgba(0,0,0,0.08);
border-top:6px solid #c9a227;
transition:all .3s ease;
}

.calculator-box:hover{
transform:translateY(-5px);
box-shadow:0 20px 45px rgba(0,0,0,0.12);
}

/* Result Box */

.result-box{
background:linear-gradient(135deg,#fff9e6,#ffe4a3);
border-left:6px solid #c9a227;
padding:28px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.07);
}

.result-box h5{
color:#6b5205;
font-weight:600;
}

.result-box p{
font-size:15px;
margin-bottom:12px;
display:flex;
align-items:center;
}

.result-box strong{
color:#8a6b0d;
margin-right:5px;
}

/* Button */

.btn-gold{
background:linear-gradient(135deg,#c9a227,#e3c55e);
border:none;
color:#fff;
font-weight:600;
padding:10px;
border-radius:8px;
transition:all .3s;
}

.btn-gold:hover{
background:linear-gradient(135deg,#b18f1f,#d4b548);
transform:scale(1.03);
}

/* Icons */

.icon{
color:#c9a227;
margin-right:10px;
font-size:16px;
}

/* Navbar */

.navbar{
box-shadow:0 3px 10px rgba(0,0,0,0.15);
}

/* Input */

.form-control{
border-radius:8px;
border:1px solid #ddd;
padding:10px;
}

.form-control:focus{
border-color:#c9a227;
box-shadow:0 0 6px rgba(201,162,39,0.4);
}

/* Footer */

footer{
font-size:14px;
letter-spacing:.5px;
}

/* Mobile */

@media(max-width:768px){

.calculator-box{
padding:25px;
}

.result-box{
padding:20px;
}

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

<section class="py-5">

<div class="container">

<div class="text-center mb-5">
<h2 class="cinzel">Vedic Numerology Calculator</h2>
<p class="text-muted">Discover Your Astrology Profile</p>
</div>

<div class="row justify-content-center">

<div class="col-md-6">

<div class="calculator-box">

<form method="POST">

<label class="form-label">Date of Birth</label>

<input type="date" name="dob" class="form-control mb-3" required>

<button type="submit" class="btn btn-gold w-100">
<i class="fa-solid fa-star"></i> Calculate
</button>

</form>

<?php if($age!=""){ ?>

<div class="result-box mt-4">

<h5 class="text-center mb-3">Your Astro Profile</h5>

<p><i class="fa-solid fa-user icon"></i><strong>Age:</strong> <?php echo $age; ?> Years</p>

<p><i class="fa-solid fa-calendar icon"></i><strong>Birth Number:</strong> <?php echo $birthNumber; ?></p>

<p><i class="fa-solid fa-star icon"></i><strong>Life Path Number:</strong> <?php echo $lifePath; ?></p>

<p><i class="fa-solid fa-moon icon"></i><strong>Zodiac Sign:</strong> <?php echo $zodiac; ?></p>

<p><i class="fa-solid fa-hashtag icon"></i><strong>Lucky Numbers:</strong> <?php echo $luckyNumber; ?></p>

<p><i class="fa-solid fa-sun icon"></i><strong>Lucky Day:</strong> <?php echo $luckyDay; ?></p>

<p><i class="fa-solid fa-palette icon"></i><strong>Lucky Color:</strong> <?php echo $luckyColor; ?></p>

<p><i class="fa-solid fa-globe icon"></i><strong>Ruling Planet:</strong> <?php echo $rulingPlanet; ?></p>

<p><i class="fa-solid fa-gem icon"></i><strong>Lucky Gemstone:</strong> <?php echo $luckyGem; ?></p>

</div>

<?php } ?>

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

</body>

</html>