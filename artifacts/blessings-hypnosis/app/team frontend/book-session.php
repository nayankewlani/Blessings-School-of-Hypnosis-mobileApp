<?php
include 'db.php';

// trainer id from URL
$trainer_id = isset($_GET['trainer_id']) ? $_GET['trainer_id'] : 1;

// Trainer
$trainer_query = mysqli_query($conn, "SELECT * FROM trainers WHERE id='$trainer_id'");
if(!$trainer_query){
    die("Trainer Query Error: " . mysqli_error($conn));
}
$trainer = mysqli_fetch_assoc($trainer_query);

// Services
$services = mysqli_query($conn, "SELECT * FROM services WHERE trainer_id='$trainer_id'");



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astro Pradeep Kumar | Vedic Excellence</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cinzel:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets\css\style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand" href="index.php">
<img src="website-logo/1.png" alt="Astro Pradeep Kumar" srcset="" width="150px">        </a>

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




<h2 class="text-center mt-4">Book Session with <?php echo $trainer['name']; ?></h2>

<div class="container">
<div class="card p-4 shadow mx-auto" style="max-width:600px;">

<!-- Trainer Info -->
<div class="text-center mb-4">
    <img src="assets/images/<?php echo $trainer['image']; ?>" width="150" class="mb-2">
    <h4><?php echo $trainer['name']; ?></h4>
    <p class="mb-1"><?php echo $trainer['experience']; ?> Experience</p>
    <small class="text-muted"><?php echo $trainer['specialization']; ?></small>
</div>

<form action="save-booking.php" method="POST">

<!-- Trainer ID -->
<input type="hidden" name="trainer_id" value="<?php echo $trainer_id; ?>">

<!-- Name -->
<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<!-- Mobile -->
<div class="mb-3">
<label class="form-label">Mobile Number</label>
<input type="text" name="mobile" class="form-control" required>
</div>

<!-- Email -->
<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control">
</div>

<!-- Dynamic Services -->
<div class="mb-3">
<label class="form-label">Select Service</label>
<select name="service_id" class="form-control" required>

<?php while($service = mysqli_fetch_assoc($services)) { ?>
<option value="<?php echo $service['id']; ?>">
<?php echo $service['service_name']; ?> 
(<?php echo $service['duration']; ?>) - ₹<?php echo $service['price']; ?>
</option>
<?php } ?>

</select>
</div>

<!-- Date -->
<div class="mb-3">
<label class="form-label">Select Date</label>
<input type="date" 
name="booking_date" 
id="booking_date" 
class="form-control" 
min="<?php echo date('Y-m-d'); ?>" 
value="<?php echo date('Y-m-d'); ?>" 
required>
</div>

<!-- Time Slots -->
<div class="mb-3">
<label class="form-label">Select Time</label>
<select name="time_slot" id="time_slot" class="form-control" required>
<option value="">Select Date First</option>
</select>
</div>

<!-- Button -->
<button class="btn btn-traditiona1 w-100 mt-2">Confirm Booking</button>

</form>

</div>
</div>

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
            <p class="mb-0 opacity-50">&copy; 2026 Astro Pradeep Kumar | Blessings School of Astro</p>
        </div>
    </div>
</footer>

<a href="https://wa.me/919096161750" class="whatsapp-float" target="_blank" style="position:fixed; bottom:20px; right:20px; background:#25d366; color:#FFF; border-radius:50px; text-align:center; padding: 10px 20px; font-weight:bold; text-decoration:none; z-index:100; box-shadow: 2px 2px 10px rgba(0,0,0,0.2); display: flex; align-items: center; gap: 8px;">
    <i class="fab fa-whatsapp fa-2x"></i> <span>Chat Now</span>
</a>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function(){

    var trainer_id = "<?php echo $trainer_id; ?>";

    function loadSlots(selectedDate){
        $.ajax({
            url: 'get-slots.php',
            type: 'POST',
            data: {
                date: selectedDate,
                trainer_id: trainer_id
            },
            success: function(response){
                try{
                    var slots = JSON.parse(response);
                    var options = '<option value="">Select Time</option>';

                    if(slots.length > 0){
                        slots.forEach(function(time){
                            options += '<option value="'+time+'">'+time+'</option>';
                        });
                    } else {
                        options = '<option>No slots available</option>';
                    }

                    $('#time_slot').html(options);
                }
                catch(e){
                    $('#time_slot').html('<option>Error loading slots</option>');
                }
            }
        });
    }

    // When date changes
    $('#booking_date').change(function(){
        var selectedDate = $(this).val();
        if(selectedDate != ''){
            loadSlots(selectedDate);
        }
    });

    // Auto load slots on page load (Today)
    var today = $('#booking_date').val();
    if(today != ''){
        loadSlots(today);
    }

});
</script>
</body>
</html>