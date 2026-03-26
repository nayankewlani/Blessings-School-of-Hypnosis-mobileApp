<?php
date_default_timezone_set('Asia/Kolkata');

$name="";
$dob="";
$time="";
$place="";

$rashi="";
$nakshatra="";
$lagna="";

if(isset($_POST['dob'])){

$name=$_POST['name'];
$dob=$_POST['dob'];
$time=$_POST['time'];
$place=$_POST['place'];

/* Moon Sign (Rashi) */

$month=date("m",strtotime($dob));
$day=date("d",strtotime($dob));

if(($month==3 && $day>=21)||($month==4 && $day<=19)) $rashi="Mesha (Aries)";
elseif(($month==4 && $day>=20)||($month==5 && $day<=20)) $rashi="Vrishabha (Taurus)";
elseif(($month==5 && $day>=21)||($month==6 && $day<=20)) $rashi="Mithuna (Gemini)";
elseif(($month==6 && $day>=21)||($month==7 && $day<=22)) $rashi="Karka (Cancer)";
elseif(($month==7 && $day>=23)||($month==8 && $day<=22)) $rashi="Simha (Leo)";
elseif(($month==8 && $day>=23)||($month==9 && $day<=22)) $rashi="Kanya (Virgo)";
elseif(($month==9 && $day>=23)||($month==10 && $day<=22)) $rashi="Tula (Libra)";
elseif(($month==10 && $day>=23)||($month==11 && $day<=21)) $rashi="Vrishchika (Scorpio)";
elseif(($month==11 && $day>=22)||($month==12 && $day<=21)) $rashi="Dhanu (Sagittarius)";
elseif(($month==12 && $day>=22)||($month==1 && $day<=19)) $rashi="Makara (Capricorn)";
elseif(($month==1 && $day>=20)||($month==2 && $day<=18)) $rashi="Kumbha (Aquarius)";
else $rashi="Meena (Pisces)";

/* Nakshatra (basic random for demo) */

$nakshatras=[
"Ashwini","Bharani","Krittika","Rohini","Mrigashira",
"Ardra","Punarvasu","Pushya","Ashlesha",
"Magha","Purva Phalguni","Uttara Phalguni",
"Hasta","Chitra","Swati","Vishakha",
"Anuradha","Jyeshtha","Mula","Purva Ashadha",
"Uttara Ashadha","Shravana","Dhanishta",
"Shatabhisha","Purva Bhadrapada",
"Uttara Bhadrapada","Revati"
];

$nakshatra=$nakshatras[rand(0,26)];

/* Lagna */

$lagnaList=[
"Mesha Lagna","Vrishabha Lagna","Mithuna Lagna","Karka Lagna",
"Simha Lagna","Kanya Lagna","Tula Lagna","Vrishchika Lagna",
"Dhanu Lagna","Makara Lagna","Kumbha Lagna","Meena Lagna"
];

$lagna=$lagnaList[rand(0,11)];

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Kundli Generator</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>

body{
font-family:'Poppins';
background:#fffaf2;
}

.cinzel{
font-family:'Cinzel';
}

.kundli-box{
background:white;
padding:35px;
border-radius:12px;
box-shadow:0 10px 25px rgba(0,0,0,0.08);
border-top:5px solid #c9a227;
}

.result-box{
background:#fff3d4;
border-left:5px solid #c9a227;
padding:25px;
border-radius:10px;
}

.btn-gold{
background:#c9a227;
color:white;
font-weight:600;
}

</style>

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<h4 class="text-white">ASTRO <span style="color:#c9a227;">PRADEEP</span></h4>

</div>

</nav>

<section class="py-5">

<div class="container">

<div class="text-center mb-5">

<h2 class="cinzel">Free Kundli Generator</h2>

<p class="text-muted">Generate your Vedic Birth Chart</p>

</div>

<div class="row justify-content-center">

<div class="col-md-6">

<div class="kundli-box">

<form method="POST">

<input type="text" name="name" class="form-control mb-3" placeholder="Full Name" required>

<label>Date of Birth</label>

<input type="date" name="dob" class="form-control mb-3" required>

<label>Birth Time</label>

<input type="time" name="time" class="form-control mb-3" required>

<input type="text" name="place" class="form-control mb-3" placeholder="Birth Place" required>

<button class="btn btn-gold w-100">Generate Kundli</button>

</form>

<?php if($rashi!=""){ ?>

<div class="result-box mt-4">

<h5 class="text-center mb-3">Kundli Details</h5>

<p><strong>Name:</strong> <?php echo $name;?></p>

<p><strong>Rashi (Moon Sign):</strong> <?php echo $rashi;?></p>

<p><strong>Nakshatra:</strong> <?php echo $nakshatra;?></p>

<p><strong>Lagna:</strong> <?php echo $lagna;?></p>

<p><strong>Birth Place:</strong> <?php echo $place;?></p>

</div>

<?php } ?>

</div>

</div>

</div>

</div>

</section>

<footer class="bg-dark text-white text-center py-3">

© 2026 Astro Pradeep

</footer>

</body>

</html>