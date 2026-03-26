<?php
date_default_timezone_set('Asia/Kolkata');

$name="";
$dob="";
$age="";
$birthNumber="";
$lifePath="";
$destiny="";
$zodiac="";
$chinese="";
$personalYear="";
$luckyNumber="";
$luckyColor="";
$luckyDay="";
$planet="";

if(isset($_POST['dob'])){

$name=$_POST['name'];
$dob=$_POST['dob'];

$birthDate=new DateTime($dob);
$today=new DateTime();
$age=$today->diff($birthDate)->y;

/* Birth Number */

$day=date("d",strtotime($dob));
$birthNumber=array_sum(str_split($day));
while($birthNumber>9){
$birthNumber=array_sum(str_split($birthNumber));
}

/* Life Path */

$digits=str_replace("-","",$dob);
$lifePath=array_sum(str_split($digits));
while($lifePath>9){
$lifePath=array_sum(str_split($lifePath));
}

/* Destiny Number (Name Numerology) */

$letters=strtoupper($name);
$total=0;

$map=[
'A'=>1,'B'=>2,'C'=>3,'D'=>4,'E'=>5,'F'=>6,'G'=>7,'H'=>8,'I'=>9,
'J'=>1,'K'=>2,'L'=>3,'M'=>4,'N'=>5,'O'=>6,'P'=>7,'Q'=>8,'R'=>9,
'S'=>1,'T'=>2,'U'=>3,'V'=>4,'W'=>5,'X'=>6,'Y'=>7,'Z'=>8
];

foreach(str_split($letters) as $char){
if(isset($map[$char])) $total+=$map[$char];
}

$destiny=$total;
while($destiny>9){
$destiny=array_sum(str_split($destiny));
}

/* Zodiac */

$m=date("m",strtotime($dob));
$d=date("d",strtotime($dob));

if(($m==3 && $d>=21)||($m==4 && $d<=19)) $zodiac="Aries";
elseif(($m==4 && $d>=20)||($m==5 && $d<=20)) $zodiac="Taurus";
elseif(($m==5 && $d>=21)||($m==6 && $d<=20)) $zodiac="Gemini";
elseif(($m==6 && $d>=21)||($m==7 && $d<=22)) $zodiac="Cancer";
elseif(($m==7 && $d>=23)||($m==8 && $d<=22)) $zodiac="Leo";
elseif(($m==8 && $d>=23)||($m==9 && $d<=22)) $zodiac="Virgo";
elseif(($m==9 && $d>=23)||($m==10 && $d<=22)) $zodiac="Libra";
elseif(($m==10 && $d>=23)||($m==11 && $d<=21)) $zodiac="Scorpio";
elseif(($m==11 && $d>=22)||($m==12 && $d<=21)) $zodiac="Sagittarius";
elseif(($m==12 && $d>=22)||($m==1 && $d<=19)) $zodiac="Capricorn";
elseif(($m==1 && $d>=20)||($m==2 && $d<=18)) $zodiac="Aquarius";
else $zodiac="Pisces";

/* Chinese Zodiac */

$year=date("Y",strtotime($dob));
$animals=["Monkey","Rooster","Dog","Pig","Rat","Ox","Tiger","Rabbit","Dragon","Snake","Horse","Goat"];
$chinese=$animals[$year%12];

/* Personal Year */

$currentYear=date("Y");
$sum=array_sum(str_split($day.$m.$currentYear));
while($sum>9){
$sum=array_sum(str_split($sum));
}
$personalYear=$sum;

/* Lucky Data */

$data=[
1=>["num"=>"1,10,19","color"=>"Red","day"=>"Sunday","planet"=>"Sun"],
2=>["num"=>"2,11,20","color"=>"White","day"=>"Monday","planet"=>"Moon"],
3=>["num"=>"3,12,21","color"=>"Yellow","day"=>"Thursday","planet"=>"Jupiter"],
4=>["num"=>"4,13,22","color"=>"Blue","day"=>"Saturday","planet"=>"Rahu"],
5=>["num"=>"5,14,23","color"=>"Green","day"=>"Wednesday","planet"=>"Mercury"],
6=>["num"=>"6,15,24","color"=>"Pink","day"=>"Friday","planet"=>"Venus"],
7=>["num"=>"7,16,25","color"=>"Grey","day"=>"Monday","planet"=>"Ketu"],
8=>["num"=>"8,17,26","color"=>"Black","day"=>"Saturday","planet"=>"Saturn"],
9=>["num"=>"9,18,27","color"=>"Orange","day"=>"Tuesday","planet"=>"Mars"]
];

$luckyNumber=$data[$lifePath]['num'];
$luckyColor=$data[$lifePath]['color'];
$luckyDay=$data[$lifePath]['day'];
$planet=$data[$lifePath]['planet'];

}
?>

<form method="POST">

<input type="text" name="name" placeholder="Your Name" required class="form-control mb-3">

<input type="date" name="dob" required class="form-control mb-3">

<button class="btn btn-dark w-100">Calculate Astrology</button>

</form>

<?php if($age!=""){ ?>

<h3>Astrology Report</h3>

<p><b>Age:</b> <?php echo $age;?></p>
<p><b>Birth Number:</b> <?php echo $birthNumber;?></p>
<p><b>Life Path:</b> <?php echo $lifePath;?></p>
<p><b>Destiny Number:</b> <?php echo $destiny;?></p>
<p><b>Zodiac:</b> <?php echo $zodiac;?></p>
<p><b>Chinese Zodiac:</b> <?php echo $chinese;?></p>
<p><b>Personal Year:</b> <?php echo $personalYear;?></p>
<p><b>Lucky Numbers:</b> <?php echo $luckyNumber;?></p>
<p><b>Lucky Day:</b> <?php echo $luckyDay;?></p>
<p><b>Lucky Color:</b> <?php echo $luckyColor;?></p>
<p><b>Ruling Planet:</b> <?php echo $planet;?></p>

<?php } ?>